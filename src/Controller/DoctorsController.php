<?php

namespace App\Controller;

use App\Repository\DoctorsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
// !We get all doctor data on get maybe based ond params ?
class DoctorsController extends AbstractController
{
    #[Route(path: '/api/doctors', name: 'doctors', methods: ['GET'])]
    public function getDoctors(DoctorsRepository $doctorsRepository): JsonResponse
    {
        $doctors = $doctorsRepository->findAll();

        // Serialize the doctors to an array
        $serializedDoctors = [];
        foreach ($doctors as $doctor) {
            $serializedDoctors[] = [
                'id' => $doctor->getId(),
                'name' => $doctor->getName(),
                'specializations' => $this->serializeSpecializations($doctor->getSpecializations()),
                'patients' => $this->serializePatients($doctor->getPatients()),
                'role' => $this->serializeRole($doctor->getRole()),
            ];
        }

        // Return a JSON response
        return $this->json($serializedDoctors);
    }

    private function serializeSpecializations($specializations)
    {
        $serializedSpecializations = [];
        foreach ($specializations as $specialization) {
            $serializedSpecializations[] = [
                'name' => $specialization->getSpecializationName(),
            ];
        }
        return $serializedSpecializations;
    }

    private function serializePatients($patients)
    {
        $serializedPatients = [];
        foreach ($patients as $patient) {
            $serializedPatients[] = [
                'name' => $patient->getFirstName() . ' ' . $patient->getLastName(),
            ];
        }
        return $serializedPatients;
    }

    private function serializeRole($role)
    {
        if (!$role) {
            return null;
        }

        return [
            'id' => $role->getId(),
            'name' => $role->getRoleName(),
        ];
    }
}