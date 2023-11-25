<?php

namespace App\Repository;

use App\Entity\Specializations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Specializations>
 *
 * @method Specializations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Specializations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Specializations[]    findAll()
 * @method Specializations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecializationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Specializations::class);
    }

//    /**
//     * @return Specializations[] Returns an array of Specializations objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Specializations
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
