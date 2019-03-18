<?php

$db_name = 'dojo';
$db_user = 'root';
$db_pass = 'dojo';
$db_host = 'db';

try {
    $pdo = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_pass);
} catch (Exception $e) {
    trigger_error($e->getMessage(), E_USER_ERROR);
}

echo "Conexão realizada com sucesso!";