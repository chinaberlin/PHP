<?php
/**
  * Kittencup (http://www.kittencup.com/)
  *
  * @date 2014-3-1 ����1:01:19
  * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
  * @license   http://kittencup.com
  */
$c = 100;

$fun = function  ($a, $b) use ( $c)
{
    echo $a, $b, $c;
};

$fun(1, 2);

$arr1 = [1,2,3,4,5,6,7,8,9];

$arr2 = array_map(function($item) {
     return $item + 100;
}, $arr1);

print_r($arr2);