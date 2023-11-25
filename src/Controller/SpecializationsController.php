<?php

namespace App\Controller;

use App\Repository\SpecializationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class SpecializationsController extends AbstractController
{
    #[Route(path: '/api/specializations', name: 'specializations', methods: ['GET'])]
    public function getSpecializations(SpecializationsRepository $specializationsRepository): JsonResponse
    {
        // Fetch all specializations from the database
        $specializations = $specializationsRepository->findAll();

        // Serialize the specializations to an array
        $specializationsArray = [];
        foreach ($specializations as $specialization) {
            $specializationsArray[] = [
                'id' => $specialization->getId(),
                'name' => $specialization->getSpecializationName(),
                'description' => $specialization->getDescription(),
            ];
        }

        // Return the serialized specializations as JSON response
        return new JsonResponse($specializationsArray);
    }
}