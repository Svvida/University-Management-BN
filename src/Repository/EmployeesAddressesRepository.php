<?php

namespace App\Repository;

use App\Entity\EmployeesAddresses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EmployeesAddresses>
 *
 * @method EmployeesAddresses|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmployeesAddresses|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmployeesAddresses[]    findAll()
 * @method EmployeesAddresses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeesAddressesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmployeesAddresses::class);
    }

//    /**
//     * @return EmployeesAddresses[] Returns an array of EmployeesAddresses objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EmployeesAddresses
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
