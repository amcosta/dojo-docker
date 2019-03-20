<?php

namespace App\Service\ZipCode\Provider;

interface ZipCodeProviderInterface
{
    public function search(string $zipcode);
}