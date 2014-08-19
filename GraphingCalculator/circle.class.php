<?php
class Circle extends Shape{
    private $radus=0;
    function __construct(){
        $this->shapeName="圆形";
        if($this->validate($_POST["radius"],"半径")){
            $this->radus=$_POST["radius"];
        }
    }
    function area(){
        return pi()*$this->radus * $this->radus;
    }
    function perimeter(){
        return 2 * pi() * $this->radus;
    }
}