<?php

namespace App\Service\ZipCode\Provider;

use App\Entity\ZipCode;
use Predis\Client;

class CacheProvider implements ZipCodeProviderInterface
{
    /**
     * @var Client
     */
    private $cache;
    /**
     * @var DatabaseProvider
     */
    private $zipcodeProvider;

    public function __construct(Client $cache, DatabaseProvider $zipcodeProvider)
    {
        $this->cache = $cache;
        $this->zipcodeProvider = $zipcodeProvider;
    }

    public function search(string $zipcode)
    {
        if ($this->cache->exists($zipcode)) {
            $data = $this->cache->get($zipcode);
            return json_decode($data, true);
        }

        return $this->next($zipcode);
    }

    private function next(string $zipcode)
    {
        $model = $this->zipcodeProvider->search($zipcode);
        if ($model instanceof ZipCode) {
            $this->cache->set($zipcode, json_encode($model), 'EX', 60);
        }

        return $model;
    }
}