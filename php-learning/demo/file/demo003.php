<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-26
 * Time: 下午1:12
 */


$path = 'http://www.kittencup.com';

$content = file_get_contents($path);

file_put_contents('aaaa.html',$content);
