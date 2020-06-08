<?php

namespace App\Repository;

use App\Entity\Salari;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Salari|null find($id, $lockMode = null, $lockVersion = null)
 * @method Salari|null findOneBy(array $criteria, array $orderBy = null)
 * @method Salari[]    findAll()
 * @method Salari[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalariRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Salari::class);
    }

    // /**
    //  * @return Salari[] Returns an array of Salari objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Salari
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
