<?php


namespace KpAdmin;

use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\DependencyIndicatorInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\Mvc\Controller\AbstractController;
use Zend\Mvc\MvcEvent;
use Zend\Paginator\Paginator;
use Zend\View\Helper\PaginationControl;

class Module implements ConfigProviderInterface,
    ServiceProviderInterface,
    AutoloaderProviderInterface,
    BootstrapListenerInterface,
    DependencyIndicatorInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

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
            'factories' => [
                'kp-admin-navigation' => 'KpAdmin\Service\NavigationFactory'
            ],
        ];
    }

    public function onBootstrap(EventInterface $e)
    {

        /* @var $eventManager \Zend\EventManager\EventManager */
        $eventManager = $e->getApplication()->getEventManager();

        $eventManager->getSharedManager()->attach('*', MvcEvent::EVENT_DISPATCH, function (EventInterface $e) {
            $controller = $e->getTarget();

            if ($controller instanceof AbstractController) {
                $controllerClass = get_class($controller);
                if (strpos($controllerClass, '\Controller\Admin\\') !== false) {
                    $controller->layout('kp-admin-layout');
                }
            }
        }, 2);

        $eventManager->attach(MvcEvent::EVENT_DISPATCH, function (EventInterface $e) {
            Paginator::setDefaultItemCountPerPage(5);
            PaginationControl::setDefaultViewPartial('kp-admin-paginator');
            PaginationControl::setDefaultScrollingStyle('sliding');
        }, 2);

    }

    public function getModuleDependencies()
    {
        return ['KpBase'];
    }
}