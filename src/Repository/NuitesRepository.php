<?php

namespace App\Repository;

use App\Entity\Nuites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Nuites>
 *
 * @method Nuites|null find($id, $lockMode = null, $lockVersion = null)
 * @method Nuites|null findOneBy(array $criteria, array $orderBy = null)
 * @method Nuites[]    findAll()
 * @method Nuites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NuitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Nuites::class);
    }

//    /**
//     * @return Nuites[] Returns an array of Nuites objects
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

//    public function findOneBySomeField($value): ?Nuites
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
