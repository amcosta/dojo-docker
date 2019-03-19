<?php

namespace App\Repository;

class AbstractRepository
{
    private $connection;

    public function getConnection()
    {
        if ($this->connection instanceof \PDO) {
            $this->createConnection();
        }

        return $this->connection;
    }

    private function createConnection()
    {
        try {
            $this->connection = new \PDO("mysql:host=db;dbname=viacep", "root", "");
        } catch (\Exception $e) {
            trigger_error($e->getMessage(), E_USER_ERROR);
        }
    }
}