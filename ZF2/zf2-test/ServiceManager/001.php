<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-6-4
 * Time: 上午11:01
 */
namespace KpServiceManagerDemo;

use Zend\ServiceManager\ServiceManager;

include '../init_autoloader.php';

class Student
{
    protected $name = 'kittencup';

    public function setName($name)
    {
        $this->name = $name;
    }
}

$student = new Student;

$serviceManager = new ServiceManager();
$serviceManager->setService('s1', $student);

$s1 = $serviceManager->get('s1');

$s1->setName('onlyit');

$s2 = $serviceManager->get('s1');

var_dump($s2);


