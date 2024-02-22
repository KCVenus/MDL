<?php

namespace App\Repository;

use App\Entity\InscriptionRestauration;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<InscriptionRestauration>
 *
 * @method InscriptionRestauration|null find($id, $lockMode = null, $lockVersion = null)
 * @method InscriptionRestauration|null findOneBy(array $criteria, array $orderBy = null)
 * @method InscriptionRestauration[]    findAll()
 * @method InscriptionRestauration[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InscriptionRestaurationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InscriptionRestauration::class);
    }

//    /**
//     * @return InscriptionRestauration[] Returns an array of InscriptionRestauration objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('i.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?InscriptionRestauration
//    {
//        return $this->createQueryBuilder('i')
//            ->andWhere('i.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
