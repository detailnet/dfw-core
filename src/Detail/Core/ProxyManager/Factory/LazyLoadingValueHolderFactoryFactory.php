<?php

namespace Detail\Core\ProxyManager\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use ProxyManager\Configuration;
use ProxyManager\Factory\LazyLoadingValueHolderFactory;
use ProxyManager\GeneratorStrategy\EvaluatingGeneratorStrategy;

use Detail\Core\ProxyManager\Options\ConfigurationOptions;

class LazyLoadingValueHolderFactoryFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return ConfigurationOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var \Detail\Core\ProxyManager\Options\ConfigurationOptions $options */
        $options = $serviceLocator->get('Detail\Core\ProxyManager\Options\ConfigurationOptions');

        $factoryConfig = new Configuration();

        if ($options->getProxiesNamespace()) {
            $factoryConfig->setProxiesNamespace($options->getProxiesNamespace());
        }

        if ($options->getProxiesTargetDir()) {
            $factoryConfig->setProxiesTargetDir($options->getProxiesTargetDir());
        }

        if (!$options->getWriteProxyFiles()) {
            $factoryConfig->setGeneratorStrategy(new EvaluatingGeneratorStrategy());
        }

        spl_autoload_register($factoryConfig->getProxyAutoloader());

        return new LazyLoadingValueHolderFactory($factoryConfig);
    }
}
