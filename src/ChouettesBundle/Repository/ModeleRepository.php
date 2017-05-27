<?php

namespace ChouettesBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ModeleRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ModeleRepository extends EntityRepository
{
    public function getDoudouByCateg($categ){
        $qb = $this->createQueryBuilder('d');
        $qb->select('d.contenu', 'd.id', 'd.titre')
            ->join('d.categorie', 'c')
            ->where('c.nom = :categ')
            ->join('d.image', 'i')
            ->addSelect('i.alt as imageAlt', 'i.url as imageUrl')
            ->orderBy('d.id', 'DESC')
            ->setParameter('categ', $categ);
        return $qb->getQuery()->getResult();
    }
}
