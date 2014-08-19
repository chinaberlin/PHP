<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-19
 * Time: 下午2:51
 */
class Student
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

}

class Classroom
{
    public $name;
    public $students = [];
    public $maxStudent = 3;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function addStudent(Student $student)
    {
        if (count($this->students) < $this->maxStudent) {

            if(!in_array($student->getName(),explode(',',$this->getStudentsName()))){
                $this->students[] = $student;
            }

        }
    }

    public function addStudentOrStudentName($studentOrName)
    {
        if ($studentOrName instanceof Student) {
            $this->addStudent($studentOrName);
        } else if (is_string($studentOrName)) {
            $this->addStudent(new Student($studentOrName));
        } else if (is_array($studentOrName)) {
            foreach ($studentOrName as $name) {
                $this->addStudent(new Student($name));
            }
        }
    }

    public function getStudentsName()
    {
        $names = [];
        foreach ($this->students as $student) {
            /**
             * @var $student Student
             */
            $names[] = $student->getName();
        }
        return implode(',', $names);
    }

    /**
     * @param int $maxStudent
     */
    public function setMaxStudent($maxStudent)
    {
        $this->maxStudent = $maxStudent;
    }

    /**
     * @return int
     */
    public function getMaxStudent()
    {
        return $this->maxStudent;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param array $students
     */
    public function setStudents($students)
    {
        $this->students = $students;
    }

    /**
     * @return array
     */
    public function getStudents()
    {
        return $this->students;
    }


}


$s1 = new Student('zhangsan');
$s2 = new Student('lisi');

$c1 = new Classroom('php');
$c1->addStudent($s1);
$c1->addStudent($s2);
$c1->addStudentOrStudentName(new Student('sdaoi1i2zzzz'));
$c1->addStudentOrStudentName('王五');
$c1->addStudentOrStudentName(['jsdijaid','sdad12','php']);
$c1->addStudent(new Student('php'));

echo $c1->getStudentsName();


