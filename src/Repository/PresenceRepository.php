<?php

namespace App\Repository;

use App\Entity\Presence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Presence|null find($id, $lockMode = null, $lockVersion = null)
 * @method Presence|null findOneBy(array $criteria, array $orderBy = null)
 * @method Presence[]    findAll()
 * @method Presence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PresenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Presence::class);
    }

    // /**
    //  * @return Presence[] Returns an array of Presence objects
    //  */
    
    public function findByMois()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.mois != :val')
            ->setParameter('val', '')
            ->groupBy('p.mois')
            ->getQuery()
            ->getResult()
        ;
    }
    
    public function findByDate()
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.date != :val')
            ->setParameter('val', '')
            ->groupBy('p.date')
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Presence
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
