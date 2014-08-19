<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-23
 * Time: 下午2:58
 */
class Student
{

    public $name = 34;

}

class ProxyStudent extends Student
{

    protected $student;

    public function __construct(Student $student)
    {
        unset($this->name);

        $this->student = $student;
    }


    public function __get($key)
    {
        echo '用户想要获取到'.$key .'这个值';

        return $this->student->$key;
    }

    public function __isset($property){
        echo $property;exit;
    }
}

$ps = new ProxyStudent(new Student);

isset($ps->name);