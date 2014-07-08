<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-28
 * Time: 上午9:45
 */

$path = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'objectAndClass';

//$iterator = new DirectoryIterator($path);

$iterator = new RecursiveDirectoryIterator($path);

$ii = new RecursiveIteratorIterator($iterator,RecursiveIteratorIterator::SELF_FIRST);

foreach($ii as $item){
    echo $item->getFileName(),'<Br>';
}