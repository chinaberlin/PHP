<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-21
 * Time: 下午3:12
 */
interface getName
{
    public function getName();
}

interface setName
{
    public function setName();
}

abstract class Person implements getName, setName
{
<<<<<<< HEAD
    abstract public function xxx();
=======
    abstract public function xxx();+-
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b

    public function say()
    {

    }
}

class Teacher extends Person
{
    public function xxx()
    {

    }

    public function setName()
    {

    }

    public function getName()
    {

    }

}