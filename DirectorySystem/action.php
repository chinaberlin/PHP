<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-30
 * Time: 上午9:37
 */
namespace Kp;

include 'Kp/Autoloader.php';

$path = explode('||', Request::getQuery('path'));

foreach ($path as $p) {
    unlink($p);
}

header('Location:' . Url::create([], 'index.php'));