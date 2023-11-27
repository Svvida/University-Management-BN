<?php

namespace App\Repository;

use App\Entity\Doctors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Doctors>
 *
 * @method Doctors|null find($id, $lockMode = null, $lockVersion = null)
 * @method Doctors|null findOneBy(array $criteria, array $orderBy = null)
 * @method Doctors[]    findAll()
 * @method Doctors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DoctorsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Doctors::class);
    }

    public function findAllWithSpecializations()
    {
        return $this->createQueryBuilder('d')
            ->leftJoin('d.specializations', 's')
            ->addSelect('s')
            ->getQuery()
            ->getResult();
    }

    public function findAllWithPatients()
    {
        return $this->createQueryBuilder('d')
            ->leftJoin('d.patients', 'p')
            ->addSelect('p')
            ->getQuery()
            ->getResult();
    }

    public function findAllWithRole()
    {
        return $this->createQueryBuilder('d')
            ->leftJoin('d.role', 'r')
            ->addSelect('r')
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Doctors[] Returns an array of Doctors objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Doctors
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
