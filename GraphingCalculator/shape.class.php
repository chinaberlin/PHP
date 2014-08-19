<?php
abstract class Shape{
    public $shapeName;
    abstract function area();
    abstract function perimeter();
    protected function validate($value,$message='输入的值'){
        if($value==""||!is_numeric($value)||$value<0){
            $this->$message=$this->shapeName.$message;
            echo '<font color="red">'.$message.'必须为非负值的数字，并且不能为空'.'</font><br>';
            return false;
        }else{
            return true;
        }
    }
    function validateSum($s1,$s2,$s3){
        if(($s1+$s2>$s3) && ($s1+$s3)>$s2 && ($s2+$s3)>$s1){
            return true;
        }else{
            echo '<font color="red">三角形的两边之和必须要大于第三边</font><br>';
            return false;
        }
    }
}