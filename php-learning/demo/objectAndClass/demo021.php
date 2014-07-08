<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-23
 * Time: 下午3:23
 */

class Person{

    protected static $name = 'ren';

    public static function getName(){
        return static::$name;
    }
}

class Student extends Person{

    protected static $name = 'xuesheng';
}


echo Student::getName();