<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-14
 * Time: 上午10:10
 */


$string = '中国足球';


$txt = '121212 ';


echo strpos($string, $txt) === false;


$string = 'adkako-1212-zc121-zq23';

$arr = explode('-', $string);

print_r($arr);

$string = '-sdkakdkaodoa-';

echo rtrim($string, '-');


$path = 'css/';

trim($path, '/') . '/';


$string = '<span %s>%s</span>';


//echo sprintf($string,'class="a"','中国');


$arr = str_replace(['足球','A'],['篮球','B'],['中国A足球','非洲A足球','日本A足球']);
print_r($arr);

$string = 'hello_world';

$string = str_replace(' ','',lcfirst(ucwords(str_replace('_',' ',$string))));
echo $string;