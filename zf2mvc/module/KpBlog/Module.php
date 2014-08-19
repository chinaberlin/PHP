<?php


namespace KpBlog;

use KpBlog\Listener\Admin\PostsTagListener;
use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\DependencyIndicatorInterface;
use Zend\ModuleManager\Feature\FormElementProviderInterface;
use Zend\ModuleManager\Feature\InputFilterProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;

class Module implements ConfigProviderInterface,
    AutoloaderProviderInterface,
    ControllerProviderInterface,
    ServiceProviderInterface,
    DependencyIndicatorInterface,
    FormElementProviderInterface,
    InputFilterProviderInterface,
    BootstrapListenerInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getControllerConfig()
    {
        return [
            'invokables' => [
                'KpBlog\Controller\Admin\Posts' => 'KpBlog\Controller\Admin\PostsController',
                'KpBlog\Controller\Admin\Tag' => 'KpBlog\Controller\Admin\TagController',
                'KpBlog\Controller\Admin\Category' => 'KpBlog\Controller\Admin\CategoryController'
            ]
        ];
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

    public function getFormElementConfig()
    {
        return [
            'invokables' => [
                'KpBlog\Form\PostsAdd' => 'KpBlog\Form\PostsAddForm',
                'KpBlog\Form\PostsEdit' => 'KpBlog\Form\PostsEditForm'
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'invokables' => [
                'KpBlog\Table\Posts' => 'KpBlog\Table\PostsTable',
                'KpBlog\Table\Category' => 'KpBlog\Table\CategoryTable',
                'KpBlog\Table\Tag' => 'KpBlog\Table\TagTable',
                'KpBlog\Table\PostsTag' => 'KpBlog\Table\PostsTagTable',

                'KpBlog\Event\Posts' => 'KpBlog\Event\PostsEvent'
            ],
        ];
    }

    public function getInputFilterConfig()
    {
        return [
            'invokables' => [
                'KpBlog/InputFilter/PostsBase' => 'KpBlog\InputFilter\PostsBaseInputFilter',
                'KpBlog/InputFilter/PostsAdd' => 'KpBlog\InputFilter\PostsAddInputFilter'
            ]
        ];
    }

    public function getModuleDependencies()
    {
        return [
            'KpAdmin'
        ];
    }

    public function onBootstrap(EventInterface $e)
    {
        /* @var $eventManager \Zend\EventManager\EventManager */
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach(new PostsTagListener());

    }
}