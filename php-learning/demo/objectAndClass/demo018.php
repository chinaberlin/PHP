<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-23
 * Time: 下午2:58
 */

class Student{

    protected $name = 34;

    public function __set($property,$value){

    }

    public function __get($property){
        return $this->$property;
    }
}


$s1 = new Student();

echo $s1->name = 300;

