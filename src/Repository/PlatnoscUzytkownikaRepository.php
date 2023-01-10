<?php

namespace App\Repository;

use App\Entity\PlatnoscUzytkownika;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PlatnoscUzytkownika>
 *
 * @method PlatnoscUzytkownika|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlatnoscUzytkownika|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlatnoscUzytkownika[]    findAll()
 * @method PlatnoscUzytkownika[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlatnoscUzytkownikaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlatnoscUzytkownika::class);
    }

    public function save(PlatnoscUzytkownika $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(PlatnoscUzytkownika $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return PlatnoscUzytkownika[] Returns an array of PlatnoscUzytkownika objects
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

//    public function findOneBySomeField($value): ?PlatnoscUzytkownika
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
