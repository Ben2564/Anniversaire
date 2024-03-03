<?php

namespace App\Repository;

use App\Entity\Anniversaire;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Anniversaire>
 *
 * @method Anniversaire|null find($id, $lockMode = null, $lockVersion = null)
 * @method Anniversaire|null findOneBy(array $criteria, array $orderBy = null)
 * @method Anniversaire[]    findAll()
 * @method Anniversaire[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnniversaireRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Anniversaire::class);
    }

    public function add(Anniversaire $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Anniversaire $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findAnniv40Jours()
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.dateAnniv BETWEEN CURRENT_DATE() AND DATE_ADD(CURRENT_DATE(), 40, \'DAY\')')
            ->orderBy('a.dateAnniv', 'ASC')
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Anniversaire[] Returns an array of Anniversaire objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Anniversaire
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
