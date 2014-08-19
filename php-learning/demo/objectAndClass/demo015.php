<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-23
<<<<<<< HEAD
 * Time: 下午2:17
 */

class Classroom{

    public function addStudents($students){

        if($students instanceof Traversable){
            $students = iterator_to_array($students);
        }



=======
 * Time: 下午2:40
 */
class ClassRoom{
    public function addStudents($students){
        if($students instanceof Traversable){
            $students=iterator_to_array($students);
        }
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
    }
}