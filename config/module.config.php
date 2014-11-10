<?php

return array(
    'service_manager' => array(
        'abstract_factories' => array(
        ),
        'aliases' => array(
        ),
        'invokables' => array(
        ),
        'factories' => array(
            'Detail\Core\ProxyManager\Options\ConfigurationOptions' => 'Detail\Core\ProxyManager\Factory\ConfigurationOptionsFactory',
            'ProxyManager\Factory\LazyLoadingValueHolderFactory'    => 'Detail\Core\ProxyManager\Factory\LazyLoadingValueHolderFactoryFactory'
        ),
        'initializers' => array(
        ),
        'shared' => array(
        ),
    ),
);
