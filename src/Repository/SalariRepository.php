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

    public function getAll()
    {
        $entityManager = $this->getEntityManager(); 
        $querry = $entityManager->createQuery(
                'SELECT s 
                    FROM app\Entity\Salari s
                    ORDER BY s.dateEmbauche DESC'
                );
        return $querry->execute();
    }

  
}
