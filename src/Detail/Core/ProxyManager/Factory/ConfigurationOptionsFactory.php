<?php

namespace Detail\Core\ProxyManager\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Detail\Core\ProxyManager\Options\ConfigurationOptions;

class ConfigurationOptionsFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     * @return ConfigurationOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $options = array();

        if (isset($config['lazy_services'])) {
            $options = $config['lazy_services'];
        }

        return new ConfigurationOptions($options);
    }
}
