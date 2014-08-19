<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-30
 * Time: 上午9:37
 */
namespace Kp;

include 'Kp/Autoloader.php';


$action = Request::getQuery('action');

if ($action === 'delete') {

    $name = explode('||', Request::getQuery('name'));

    $page = Request::getQuery(Config::getConfig('urlPageKey'), 1);
    $path = Request::getQuery(Config::getConfig('urlPathKey'), Config::getConfig('path'));

    foreach ($name as $p) {
        if (is_dir($p)) {
            Directory::recursiveRmDir($p);
        } else {
            unlink($p);

        }
    }

    header('Location:' . Url::create(['page' => $page, 'path' => $path], 'index.php'));
}



