<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-26
 * Time: 上午10:38
 */

namespace {

    function __autoload($className)
    {

        $className = ltrim($className, '\\');

        $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $className);


        include 'vendor' . DIRECTORY_SEPARATOR . $classPath . '.php';

    }

}


namespace Demo {

    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\JsonResponseHandler);
    $whoops->register();


    new a;
}




