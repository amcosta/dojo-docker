<?php

namespace App\Repository;

class CepRepository extends AbstractRepository
{
    public function searchCep(string $cep)
    {
        $stmt = $this->getConnection()->prepare("SELECT * FROM viacep WHERE cep = ?");
        $stmt->execute([$cep]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function save(array $data)
    {
        $sql = "INSERT INTO viacep (cep, logradouro, complemento, bairro, uf) VALUES (?, ?, ?, ?, ?);";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([$data['cep'], $data['logradouro'], $data['complemento'], $data['bairro'], $data['uf']]);
        $data['id'] = $this->getConnection()->lastInsertId();
        return $data;
    }
}