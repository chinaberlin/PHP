<?php
<<<<<<< HEAD

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

=======
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
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
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
<<<<<<< HEAD
                $s = new Student();
                $s->name = $args[0];
=======
                $s = new Student($args[0]);
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
                $this->addStudent($s);
                break;
        }
    }
<<<<<<< HEAD

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
=======
}
$s1=new Student('zhangsan');
$s2=new Student('lisi');

$c1=new ClassRoom();

$c1->addStudentByName('wangwu');
$c1->addStudents($s1,$s2);
var_dump($c1);
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
