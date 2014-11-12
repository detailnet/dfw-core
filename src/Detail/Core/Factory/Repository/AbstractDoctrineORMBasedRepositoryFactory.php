<?php

namespace Detail\Core\Factory\Repository;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\FactoryInterface;

use Doctrine\ORM\Repository\DefaultRepositoryFactory;

abstract class AbstractDoctrineORMBasedRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $entityName = $this->getEntityName();

        /** @var \Doctrine\ORM\EntityManager $entityManager */
        $entityManager = $serviceLocator->get('Doctrine\ORM\EntityManager');

        // We can leverage Doctrine's own repository factory
        $repositoryFactory = new DefaultRepositoryFactory();
        $repository = $repositoryFactory->getRepository($entityManager, $entityName);

        return $repository;
    }

    /**
     * Get fully qualified class name of the entity the repository is bound to.
     *
     * @return string
     */
    abstract protected function getEntityName();
}
