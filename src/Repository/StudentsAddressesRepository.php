<?php

namespace App\Repository;

use App\Entity\StudentsAddresses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StudentsAddresses>
 *
 * @method StudentsAddresses|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentsAddresses|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentsAddresses[]    findAll()
 * @method StudentsAddresses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentsAddressesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentsAddresses::class);
    }

//    /**
//     * @return StudentsAddresses[] Returns an array of StudentsAddresses objects
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

//    public function findOneBySomeField($value): ?StudentsAddresses
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
