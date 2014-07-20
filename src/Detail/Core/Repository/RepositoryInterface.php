<?php

namespace Detail\Core\Repository;

interface RepositoryInterface
{
    public function findAll();

    public function find($id);

    /**
     * Find entities by a set of criteria.
     *
     * @param array      $criteria
     * @param array|null $orderBy
     * @param int|null   $limit
     * @param int|null   $offset
     *
     * @return array The objects.
     */
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null);

    /**
     * Find a single entity by a set of criteria.
     *
     * @param array $criteria
     * @param array|null $orderBy
     *
     * @return object|null The entity instance or NULL if the entity can not be found.
     */
    public function findOneBy(array $criteria, array $orderBy = null);

    public function add($entity);

    public function update($entity);

    public function remove($entity);

    public function removeAll();

    public function size();

    public function beginTransaction();

    public function commitTransaction();

    public function rollbackTransaction();
}
