<?php

namespace Detail\Core\Repository;

use Doctrine\ORM\Repository\DefaultRepositoryFactory;
use Doctrine\ORM\EntityManagerInterface;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

class DoctrineORMBasedRepositoryFactory extends DefaultRepositoryFactory implements
    ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    /**
     * Create a new repository instance for an entity class.
     *
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager The EntityManager instance.
     * @param string                               $entityName    The name of the entity.
     *
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    protected function createRepository(EntityManagerInterface $entityManager, $entityName)
    {
        /** @var \Doctrine\ORM\Mapping\ClassMetadata $metadata */
        $metadata = $entityManager->getClassMetadata($entityName);
        $repositoryClassName = $metadata->customRepositoryClassName;
        $serviceLocator = $this->getServiceLocator();

        // Fetch custom repository from ServiceManager if it exists.
        // This way we support the creation of repositories with additional depencencies.
        if ($repositoryClassName !== null && $serviceLocator->has($repositoryClassName)) {
            return $serviceLocator->get($repositoryClassName);
        }

        return parent::createRepository($entityManager, $entityName);
    }
}
