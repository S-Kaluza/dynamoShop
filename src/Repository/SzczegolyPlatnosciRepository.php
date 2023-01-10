<?php

namespace App\Repository;

use App\Entity\SzczegolyPlatnosci;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SzczegolyPlatnosci>
 *
 * @method SzczegolyPlatnosci|null find($id, $lockMode = null, $lockVersion = null)
 * @method SzczegolyPlatnosci|null findOneBy(array $criteria, array $orderBy = null)
 * @method SzczegolyPlatnosci[]    findAll()
 * @method SzczegolyPlatnosci[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SzczegolyPlatnosciRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SzczegolyPlatnosci::class);
    }

    public function save(SzczegolyPlatnosci $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SzczegolyPlatnosci $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SzczegolyPlatnosci[] Returns an array of SzczegolyPlatnosci objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SzczegolyPlatnosci
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
