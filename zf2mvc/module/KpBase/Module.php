<?php

namespace KpBase;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

class Module implements AutoloaderProviderInterface,
    ServiceProviderInterface, ViewHelperProviderInterface
{

    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ]
            ]
        ];
    }

    public function getServiceConfig()
    {
        return [
            'initializers' => [
                'KpBase\Service\DbAdapterInitializer'
            ]
        ];
    }

    public function getViewHelperConfig()
    {
        return [
            'invokables' => [
                'kpCdn' => 'KpBase\View\CdnHelper'
            ]
        ];
    }
}