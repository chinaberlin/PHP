<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-19
 * Time: 下午2:14
 */
class Student
{

    public $name;
    public $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}


$s1 = new Student('zhangsan', 30);

var_dump($s1);


$s2 = new Student('lisi', 40);

var_dump($s2);