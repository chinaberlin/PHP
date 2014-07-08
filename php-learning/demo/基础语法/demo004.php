<?php
 /**
  * Kittencup (http://www.kittencup.com/)
  *
  * @date 2014-3-1 ����11:38:19
  * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
  * @license   http://kittencup.com
  */
 
$c = test1();

function test1($a = 1,$b = 2){
    return $a + $b;
}


$a = 3;

function test2(){
    global $a;
    echo $a;  
      
}

test2();


$funName = 'test';

for($i = 1 ; $i <= 2 ; $i++){
    $funName = 'test'.$i;
    $funName();
}
