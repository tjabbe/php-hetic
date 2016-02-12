<?php

namespace StudentBundle\Repository;

use Doctrine\ORM\EntityRepository;


class StudentRepository extends EntityRepository
{
    /* Get dateNaissance DESC
     *
     * @return Array
     */
    function getDateNaissanceDESC(){
        $qb = $this->getEntityManager()->createQueryBuilder();

        $qb->select(array('s'))->from('StudentBundle:Student', 's')->orderBy('s.dateNaissance', 'ASC');

        return $qb->getQuery()->execute();
    }
}