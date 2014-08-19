<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-23
 * Time: 下午1:18
 */
class Student
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Classroom implements Iterator
{
    protected $students = [];

    protected $position = 0;

    public function addStudent(Student $student)
    {
        $this->students[] = $student;
    }

    public function current()
    {
        echo __FUNCTION__, PHP_EOL;
        return $this->students[$this->position];
    }

    public function next()
    {
        echo __FUNCTION__, PHP_EOL;
        $this->position++;
    }

    public function key()
    {
        echo __FUNCTION__, PHP_EOL;
        return $this->position;
    }

    public function valid()
    {
        echo __FUNCTION__, PHP_EOL;
        return isset($this->students[$this->position]);
    }


    public function rewind()
    {
        echo __FUNCTION__, PHP_EOL;
        $this->position = 0;
    }
}

class Classroom2 implements IteratorAggregate
{

    public function getIterator()
    {

        $s1 = new Student('zhangsan');
        $s2 = new Student('lisi');

        $c1 = new Classroom();
        $c1->addStudent($s1);
        $c1->addStudent($s2);

        return $c1;
    }
}

$c2 = new Classroom2();

foreach ($c2 as $student) {
    echo $student->name, PHP_EOL;
}






