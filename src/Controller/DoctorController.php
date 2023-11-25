<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class DoctorController extends AbstractController
{
    #[Route(path: '/api/doctors', name: 'doctors', methods: ['GET'])]
    public function featuresAction(): JsonResponse
    {
        return new JsonResponse("Doctors");
    }
}
