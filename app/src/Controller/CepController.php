<?php

namespace App\Controller;

use App\Service\ZipCode\Provider\DatabaseProvider;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CepController extends Controller
{
    /**
     * @Route(path="/cep/{zipCode}", name="app.zipcode")
     * @param string $zipCode
     * @return JsonResponse
     */
    public function searchZipCode(string $zipCode, DatabaseProvider $zipCodeProvider)
    {
        $model = $zipCodeProvider->search($zipCode);
        return new JsonResponse($model);
    }
}