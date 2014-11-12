<?php

namespace Detail\Core\Repository;

use Doctrine\ORM\EntityRepository;

class DoctrineORMBasedRepository extends EntityRepository implements
    RepositoryInterface
{
    public function add($entity)
    {
        $this->persist($entity);
    }

    public function update($entity)
    {
        $this->persist($entity);
    }

    public function remove($entity)
    {
        $entityManager = $this->getEntityManager();
        $entityManager->remove($entity);
        $entityManager->flush();
    }

    public function removeAll()
    {
        return $this->getEntityManager()
            ->createQuery(sprintf('DELETE FROM %s e', $this->getEntityName()))
            ->execute();
    }

    public function size()
    {
        return $this->getEntityManager()
            ->createQuery(sprintf('SELECT COUNT(e) FROM %s e', $this->getEntityName()))
            ->getSingleScalarResult();
    }

    public function beginTransaction()
    {
        $this->getEntityManager()->beginTransaction();
    }

    public function commitTransaction()
    {
        $this->getEntityManager()->commit();
    }

    public function rollbackTransaction()
    {
        $this->getEntityManager()->rollback();
    }

    protected function persist($entity)
    {
        $entityManager = $this->getEntityManager();
        $entityManager->persist($entity);
        $entityManager->flush();
    }
}
