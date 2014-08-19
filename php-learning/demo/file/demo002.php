<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-26
 * Time: 下午1:12
 */


$path = __DIR__ . DIRECTORY_SEPARATOR . 'test.php';

$fp = fopen($path,'r');
$data = [];
while(!feof($fp)){

    $data[] = fgets($fp);

}

var_dump($data);


fclose($fp);