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

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
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


    public function introduce()
    {
        return '我的名字叫:' . $this->name . '我年龄:' . $this->age . '岁';
    }

}

$s1 = new Student();

$s1->setName('zhangsan');
$s1->setAge(30);






