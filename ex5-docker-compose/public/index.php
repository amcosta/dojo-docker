<?php

require __DIR__ . "/../vendor/autoload.php";

use App\ViaCep\Client;

$cep = $_GET['cep'];

$client = new Client();
$data = $client->search($cep);

var_dump($data);

die;
phpinfo();