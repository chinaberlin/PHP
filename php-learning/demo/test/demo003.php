<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-19
 * Time: 下午1:30
 */
class Student
{

    public $name;

    public $age;

    public function introduce()
    {
        return '我的名字叫:' . $this->name . '我年龄:' . $this->age . '岁';
    }


}

$s1 = new Student();
$s1->name = 'zhangsan';
$s1->age = 30;

echo $s1->introduce(),'<br>';


$s2 = new Student();
$s2->name = 'lisi';
$s2->age = 20;

echo $s2->introduce(),'<br>';


var_dump($s1);