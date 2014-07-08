<?php
class Student{
    public $name;
    public function __construct($name){
        $this->name=$name;
    }
}
class ClassRoom{
    protected $name;
    protected $students=[];
    public function addStudent(Student $student){
        $this->students[]=$student;
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
                $s = new Student($args[0]);
                $this->addStudent($s);
                break;
        }
    }
}
$s1=new Student('zhangsan');
$s2=new Student('lisi');

$c1=new ClassRoom();

$c1->addStudentByName('wangwu');
$c1->addStudents($s1,$s2);
var_dump($c1);