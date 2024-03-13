<?php

namespace App\Repository;

use App\Entity\ProposerCategorieChambre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProposerCategorieChambre>
 *
 * @method ProposerCategorieChambre|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProposerCategorieChambre|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProposerCategorieChambre[]    findAll()
 * @method ProposerCategorieChambre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProposerCategorieChambreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProposerCategorieChambre::class);
    }

//    /**
//     * @return ProposerCategorieChambre[] Returns an array of ProposerCategorieChambre objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProposerCategorieChambre
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
