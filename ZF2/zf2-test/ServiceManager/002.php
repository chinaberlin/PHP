<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-6-4
 * Time: 上午11:22
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

$serviceManager = new ServiceManager();

// 保存一个能被直接实例化的类
$serviceManager->setInvokableClass('s1','KpServiceManagerDemo\Student');


$student = $serviceManager->get('s1');

$student2 = $serviceManager->get('s1');
var_dump($student);
var_dump($student2);


