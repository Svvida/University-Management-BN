<?php

namespace App\Controller;

use App\Entity\Patients;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PatientsController extends AbstractController
{
    #[Route('api/patients', name: 'app_patients', methods:["POST"])]
    public function index(Request $request): JsonResponse
    {
        // $data = json_decode($request->getContent(), true);

        // $Patients = new Patients();
        // $Patients->setFirstName($data['firstName']);
        // $Patients->setLastName($data['lastName']);
        // ... set other properties

        dd( $request->request->all());


        return new JsonResponse(['message' => 'Entity created successfully'], JsonResponse::HTTP_CREATED);
    }
}
