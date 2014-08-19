<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-23
 * Time: 下午2:21
 */
class Student
{
    public $name;
}

class Classroom
{

    protected $name;

    protected $student = [];

    public function addStudent(Student $student)
    {
        $this->students[] = $student;
    }

    public function __call($method, $args)
    {
        switch ($method) {
            case 'addStudents':
                foreach ($args as $item) {
                    if (!$item instanceof Student) {
                        $this->__call($method, $item);
                    } else {
                        $this->addStudent($item);
                    }
                }
                break;
            case 'addStudentByName':
                $s = new Student();
                $s->name = $args[0];
                $this->addStudent($s);
                break;
        }
    }

    public static function __callStatic($method,$args){

    }
}

$s1 = new Student();
$s1->name = 'zhangsan';
$s2 = new Student();
$s2->name = 'lisi';


$c1 = new Classroom();
$c1->addStudents($s1, $s2, $s1, $s2);

$c1->addStudentByName('wangwu');
