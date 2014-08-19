<?php

namespace Album;

use Album\Model\Album;
use Album\Model\AlbumTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Module implements ConfigProviderInterface,
    AutoloaderProviderInterface,
    ControllerProviderInterface,
    ServiceProviderInterface
{

    /**
     * 注册当前模块的配置
     * @return array|mixed|\Traversable
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    /**
     * 注册当前模块的自动加载规则
     * @return array
     */
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

    /**
     * 给ServiceManager 注册服务
     * @return array|\Zend\ServiceManager\Config
     */
    public function getServiceConfig()
    {
        return [
            'factories' => [
                'AlbumTable' => function (ServiceLocatorInterface $serviceLocator) {

                        $adapter = $serviceLocator->get('dbAdapter');

                        return new AlbumTable('album', $adapter, null, new ResultSet(ResultSet::TYPE_ARRAYOBJECT, new Album()));
                    }
            ]
        ];
    }

    /**
     * 给ControllerManager 注册服务
     * @return array|\Zend\ServiceManager\Config
     */
    public function getControllerConfig()
    {
        return [
            'invokables' => [
                'AlbumController' => 'Album\Controller\AlbumController'
            ]
        ];
    }
}
