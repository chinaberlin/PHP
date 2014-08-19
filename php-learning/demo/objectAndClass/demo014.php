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

<<<<<<< HEAD
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
=======
    public function current()//Iterator::current — 返回当前元素
    {
        echo __FUNCTION__,PHP_EOL;
        return $this->students[$this->position];
    }

    public function next() //Iterator::next — 向前移动到下一个元素
    {
        echo __FUNCTION__,PHP_EOL;
        $this->position++;
    }

    public function key() //Iterator::key — 返回当前元素的键
    {
        echo __FUNCTION__,PHP_EOL;
        return $this->position;
    }

    public function valid() //Iterator::valid — 检查当前位置是否有效
    {
        echo __FUNCTION__,PHP_EOL;
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
        return isset($this->students[$this->position]);
    }


<<<<<<< HEAD
    public function rewind()
    {
        echo __FUNCTION__, PHP_EOL;
=======
    public function rewind() //Iterator::rewind — 返回到迭代器的第一个元素
    {
        echo __FUNCTION__,PHP_EOL;
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
        $this->position = 0;
    }
}

<<<<<<< HEAD
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






=======
$s1 = new Student('zhangsan');
$s2 = new Student('lisi');

$c1 = new Classroom();
$c1->addStudent($s1);
$c1->addStudent($s2);

foreach ($c1 as $student) {
    echo $student->name, PHP_EOL;
}

//$o1 = new stdClass();
//$o1->name = 'zhagnsan';
//$o1->age = 20;
//
//foreach($o1 as $p){
//    echo $p,PHP_EOL;
//}
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
