<?php

namespace App\Repository;

use App\Entity\ModelHairstyle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ModelHairstyle|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModelHairstyle|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModelHairstyle[]    findAll()
 * @method ModelHairstyle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModelHairstyleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModelHairstyle::class);
    }

    // /**
    //  * @return ModelHairstyle[] Returns an array of ModelHairstyle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ModelHairstyle
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
