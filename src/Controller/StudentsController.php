<?php

namespace App\Controller;

use App\Entity\Students;
use App\Entity\StudentsAddresses;
use DateTime;
use Doctrine\DBAL\Types\DateType;
use Doctrine\ORM\EntityManager;
use PhpParser\Node\Expr\Cast\String_;
use PhpParser\Node\Name;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class StudentsController extends AbstractController
{
    #[Route('/api/students', name: 'app_students',methods:['POST'])]
    public function index(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $requestData = json_decode($request->getContent(),true);

        $newStudentAddress = new StudentsAddresses();

        $newStudentAddress->setApartmentNumber($requestData['apartmentNumber']);
        $newStudentAddress->setBuildingNumber($requestData['buildingNumber']);
        $newStudentAddress->setCity($requestData['city']);
        $newStudentAddress->setPostalCode($requestData['postalCode']);
        $newStudentAddress->setStreet($requestData['street']);
        $newStudentAddress->setCountry($requestData['country']);

        $entityManager->persist($newStudentAddress);
        $entityManager->flush();

        $newStudent = new Students();

        $newStudent->setName($requestData['name']);
        $newStudent->setSurname($requestData['surname']);
        $newStudent->setPESEL($requestData['pesel']);
        $newStudent->setGender($requestData['gender']);
        $newStudent->setDateOfBirth(new DateTime($requestData['birthDate']));
   
        $newStudent->setAddress($newStudentAddress);

        $entityManager->persist($newStudent);
        $entityManager->flush();

        $responseData = [
            'success'=> true,
            'data'=>[
                'name'=>$newStudent->getName(),
                'surname'=>$newStudent->getSurname(),
                'pesel'=>$newStudent->getPESEL(),
                'gender'=>$newStudent->getGender(),
                'birthDate'=>$newStudent->getDateOfBirth(),
                'Address'=>$newStudent->getAddress()->getId(),
                'city'=>$newStudentAddress->getCity(),
            ],
        ];
        return $this->json($responseData);
    }
}
