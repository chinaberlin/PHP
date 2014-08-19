<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-28
 * Time: 上午9:40
 */
class Classroom implements Countable
{
    protected $students = [1,2,3,4,5,6];

    public function count()
    {
        return count($this->students);
    }
}

$c1 = new Classroom();

echo count($c1);



