<?php

namespace App\Service\ZipCode\Provider;

use App\Entity\ZipCode;
use App\Repository\ZipCodeRepository;

class DatabaseProvider implements ZipCodeProviderInterface
{
    /**
     * @var ZipCodeRepository
     */
    private $repository;
    /**
     * @var ZipCodeProviderInterface
     */
    private $zipCodeProvider;

    public function __construct(ZipCodeRepository $repository, ViaCepProvider $zipCodeProvider)
    {
        $this->repository = $repository;
        $this->zipCodeProvider = $zipCodeProvider;
    }

    public function search(string $zipcode)
    {
        $result = $this->repository->findOneBy(['cep' => $zipcode]);

        if ($result instanceof ZipCode) {
            return $result;
        }

        return $this->next($zipcode);
    }

    private function next($zipcode)
    {
        $result = $this->zipCodeProvider->search($zipcode);

        if ($result instanceof ZipCode) {
            $this->repository->save($result);
        }

        return $result;
    }
}