<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-23
 * Time: 下午3:23
 */

class Person{

    public function __construct($a){

    }
}
class Student extends Person{

    public function __construct($a,$b){

        parent::__construct($a);
    }
}
