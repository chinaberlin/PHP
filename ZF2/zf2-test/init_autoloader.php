<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-6-4
 * Time: 上午10:22
 */

include 'vendor/zf2/library/Zend/Loader/AutoloaderFactory.php';

\Zend\Loader\AutoloaderFactory::factory([
    'Zend\Loader\StandardAutoloader'=>[
        'autoregister_zf'=>true
    ]
]);
