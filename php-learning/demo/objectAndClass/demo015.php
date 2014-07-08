<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-23
 * Time: 下午2:40
 */
class ClassRoom{
    public function addStudents($students){
        if($students instanceof Traversable){
            $students=iterator_to_array($students);
        }
    }
}