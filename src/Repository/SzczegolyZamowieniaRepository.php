<?php

namespace App\Repository;

use App\Entity\SzczegolyZamowienia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SzczegolyZamowienia>
 *
 * @method SzczegolyZamowienia|null find($id, $lockMode = null, $lockVersion = null)
 * @method SzczegolyZamowienia|null findOneBy(array $criteria, array $orderBy = null)
 * @method SzczegolyZamowienia[]    findAll()
 * @method SzczegolyZamowienia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SzczegolyZamowieniaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SzczegolyZamowienia::class);
    }

    public function save(SzczegolyZamowienia $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(SzczegolyZamowienia $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return SzczegolyZamowienia[] Returns an array of SzczegolyZamowienia objects
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

//    public function findOneBySomeField($value): ?SzczegolyZamowienia
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
