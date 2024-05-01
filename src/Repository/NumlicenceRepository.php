<?php

namespace App\Repository;

use App\Entity\Numlicence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Numlicence>
 *
 * @method Numlicence|null find($id, $lockMode = null, $lockVersion = null)
 * @method Numlicence|null findOneBy(array $criteria, array $orderBy = null)
 * @method Numlicence[]    findAll()
 * @method Numlicence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NumlicenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Numlicence::class);
    }

//    /**
//     * @return Numlicence[] Returns an array of Numlicence objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Numlicence
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
