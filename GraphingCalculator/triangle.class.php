<?php
class Triangle extends Shape{
    private $side1=0;
    private $side2=0;
    private $side3=0;
    function __construct(){
        $this->shapeName="三角形";
        if($this->validate($_POST["side1"],"第一条边") &&
            $this->validate($_POST["side2"],"第二条边") &&
            $this->validate($_POST["side3"],"第三条边")){
            if($this->validatesum($_POST["side1"],$_POST["side2"],$_POST["side3"])){
                $this->side1=$_POST["side1"];
                $this->side2=$_POST["side2"];
                $this->side3=$_POST["side3"];
            }
        }
    }
    function area(){
        $s=($this->side1 + $this->side2 + $this->side3)/2;
        return sqrt($s * ($s - $this->side1) * ($s - $this->side2) * ($s - $this->side3));
    }
    function perimeter(){
        return $this->side1 + $this->side2 + $this->side3;
    }
}