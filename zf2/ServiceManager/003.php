<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-6-4
 * Time: 上午11:22
 */

namespace KpServiceManagerDemo;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\ServiceManager\ServiceManager;

include '../init_autoloader.php';

class Student
{
    protected $name = 'kittencup';

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }
}

$serviceManager = new ServiceManager();

$serviceManager->setFactory('s1', function () {
    $student = new Student('onlyit');
    return $student;
});

$s1 = $serviceManager->get('s1');

class StduentFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        var_dump($serviceLocator->get('s2Factory') === $this);

        $student = new Student('hello');
        return $student;
    }
}

$serviceManager->setInvokableClass('s2Factory','KpServiceManagerDemo\StduentFactory');

$serviceManager->setFactory('s2',$serviceManager->get('s2Factory'));

$s2 = $serviceManager->get('s2');

var_dump($s2);

