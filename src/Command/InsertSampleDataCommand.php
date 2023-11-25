<?php

namespace App\Command;

use App\Entity\Doctor;
use App\Entity\Roles;
use App\Entity\Specializations;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:insert-sample-data',
    description: 'Inserts sample data into Roles, Specializations, and Doctor tables',
)]
class InsertSampleDataCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();

        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this->setDescription('Inserts sample data into Roles, Specializations, and Doctor tables');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->insertSampleRoles();
        $this->insertSampleSpecializations();
        $this->insertSampleDoctor();

        $io = new SymfonyStyle($input, $output);
        $io->success('Sample data inserted successfully.');

        return Command::SUCCESS;
    }

    private function insertSampleRoles()
    {
        $roles = ['Doctor', 'Nurse', 'Administrator'];

        foreach ($roles as $roleName) {
            $role = new Roles();
            $role->setRoleName($roleName);

            $this->entityManager->persist($role);
        }

        $this->entityManager->flush();
    }

    private function insertSampleSpecializations()
    {
        $specializations = [
            ['name' => 'Cardiology', 'description' => 'Dealing with heart diseases'],
            ['name' => 'Orthopedics', 'description' => 'Dealing with musculoskeletal issues'],
            ['name' => 'Pediatrics', 'description' => 'Medical care for infants, children, and adolescents'],
        ];

        foreach ($specializations as $specData) {
            $specialization = new Specializations();
            $specialization->setSpecializationName($specData['name']);
            $specialization->setDescription($specData['description']);

            $this->entityManager->persist($specialization);
        }

        $this->entityManager->flush();
    }

    private function insertSampleDoctor()
    {
        $doctor = new Doctor();
        $doctor->setName('Dr. Sample Doctor');

        $role = $this->entityManager->getRepository(Roles::class)->find(1);
        $specialization = $this->entityManager->getRepository(Specializations::class)->find(1);

        $doctor->setRole($role);
        $doctor->setSpecializations($specialization);

        $this->entityManager->persist($doctor);
        $this->entityManager->flush();
    }
}