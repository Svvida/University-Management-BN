<?php

namespace App\Repository;

use App\Entity\Receptionists;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Receptionists>
 *
 * @method Receptionists|null find($id, $lockMode = null, $lockVersion = null)
 * @method Receptionists|null findOneBy(array $criteria, array $orderBy = null)
 * @method Receptionists[]    findAll()
 * @method Receptionists[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReceptionistsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Receptionists::class);
    }

//    /**
//     * @return Receptionists[] Returns an array of Receptionists objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Receptionists
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
