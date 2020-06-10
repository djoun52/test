<?php

namespace App\Repository;

use App\Entity\Salarie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Salari|enull find($id, $lockMode = null, $lockVersion = null)
 * @method Salari|enull findOneBy(array $criteria, array $orderBy = null)
 * @method Salarie[]    findAll()
 * @method Salarie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SalarieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Salarie::class);
    }
 /**
     * Afficher la liste des salariés
     */
    public function getAll() {
        $entityManager = $this->getEntityManager();
        // requête DQL : liste des salariés triés par date d'embauche décroissante
        $query = $entityManager->createQuery(
            "SELECT s
                FROM App\Entity\Salarie s
                ORDER BY s.dateEmbauche DESC"
        );
        return $query->execute();
    }
}
