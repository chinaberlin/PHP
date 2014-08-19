<?php
class Form{
    private $action;
    private $shape;
    function __construct($action=""){
        $this->action=$action;
        $this->shape=isset($_GET["action"])?$_GET["action"]:"rect";
    }
    function __toString(){
        $form='<form action="'.$this->action.'?action='.$this->shape.'" method="post">';
        $shape="get".ucfirst($this->shape);
        $form .=$this->$shape();
        $form .='<input type="submit" name="sub" value="计算"><br>';
        $form .='</$form>';
        return $form;

    }
    private function getRect(){
        $input='<b>请输入|矩形|的宽度和高度</b><p><br>';
        $input .='宽度:<input type="text" name="width" value="'.$_POST["width"].'"><br>';
        $input .='高度:<input type="text" name="height" value="'.$_POST["height"].'"><p><br>';
        return $input;
    }
    private function getTriangle(){
        $input='<b>请输入|三角形|的三条边</b><p><br>';
        $input .='第一条边:<input type="text" name="side1" value="'.$_POST["side1"].'"><br>';
        $input .='第二条边:<input type="text" name="side2" value="'.$_POST["side2"].'"><br>';
        $input .='第三条边:<input type="text" name="side3" value="'.$_POST["side3"].'"><p><br>';
        return $input;
    }
    private function getCircle(){
        $input='<b>请输入|远行|的半径</b><p><br>';
        $input .='半径:<input type="text" name="radius" value="'.$_POST["radius"].'"><p><br>';
        return $input;
    }
}