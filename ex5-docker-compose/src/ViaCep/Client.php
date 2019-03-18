<?php

namespace App\ViaCep;

use GuzzleHttp\Client as GuzzleClient;

class Client
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

    public function search(string $cep, string $format = 'json')
    {
        $response = $this->client->request('GET', "{$cep}/{$format}/");

        if ($response->getStatusCode() !== 200) {
            trigger_error('Cep não encontrado', E_USER_WARNING);
        }

        return json_decode($response->getBody()->getContents(), true);
    }
}