<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-21
 * Time: 上午9:07
 */
class Person
{

    protected $name;

    protected $role;

    public function say()
    {
        echo $this->role, $this->name;
    }

    public function getName(){
        echo __CLASS__.'::getName';
    }
}

class Teacher extends Person
{

    public function __construct($name)
    {
        $this->name = $name;
        $this->role = 'teacher';

    }

    // 重写, php 不支持重载
    public function say(){
        echo __CLASS__ . '::say';

    }

    public function getName(){
        echo __CLASS__.'::getName';

        parent::getName();
    }
}

$t1 = new Teacher('zhangsan');
echo $t1->getName();
?>
