<?php

namespace App\Service\ZipCode\Provider;

use App\Entity\ZipCode;
use GuzzleHttp\Client as GuzzleClient;

class ViaCepProvider implements ZipCodeProviderInterface
{
    private $url = 'https://viacep.com.br/ws/';

    /**
     * @var GuzzleClient
     */
    private $client;

    public function __construct()
    {
        $this->client = new GuzzleClient([
            'base_uri' => $this->url,
            'timeout'  => 2.0,
        ]);
    }

    public function search(string $zipcode)
    {
        $response = $this->client->request('GET', "{$zipcode}/json/");

        if ($response->getStatusCode() !== 200) {
            trigger_error('Cep não encontrado', E_USER_WARNING);
        }

        return $this->build(json_decode($response->getBody()->getContents(), true));
    }

    private function build(array $data)
    {
        $model = new ZipCode();
        $model->setBairro($data['bairro']);
        $model->setCep($data['cep']);
        $model->setLocalidade($data['localidade']);
        $model->setLogradouro($data['logradouro']);
        $model->setUf($data['uf']);

        return $model;
    }
}