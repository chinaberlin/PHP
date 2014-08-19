<?php

namespace KpBootstrap3;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

class Module implements AutoloaderProviderInterface, ViewHelperProviderInterface
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

    public function getViewHelperConfig()
    {
        return [
            'invokables' => [
                'KpBootstrap3Form' => 'KpBootstrap3\Form\View\Helper\Bootstrap3Form',
                'KpBootstrap3FormRow' => 'KpBootstrap3\Form\View\Helper\Bootstrap3FormRow'
            ]
        ];
    }
}