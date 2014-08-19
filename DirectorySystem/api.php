<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-30
 * Time: 上午10:56
 */

namespace Kp;

include 'Kp/Autoloader.php';
use RecursiveDirectoryIterator;
use CallbackFilterIterator;

$path = Request::getQuery(Config::getConfig('urlPathKey'), Config::getConfig('path'));

$rootPath = Config::getConfig('path');

$iterator = new RecursiveDirectoryIterator($rootPath);

$filterIterator = new \RecursiveCallbackFilterIterator($iterator, function ($current) {

    return !in_array($current->getFileName(), ['$RECYCLE.BIN', '.', '..']);
});

$rIterator = new \RecursiveIteratorIterator($filterIterator, \RecursiveIteratorIterator::SELF_FIRST);


$returnData = [
    'root' => $rootPath,
    'child' => [

    ]
];


foreach ($rIterator as $item) {

    if ($item->isDir()) {
        $fullPath = $item->getPath() . DIRECTORY_SEPARATOR . iconv('gbk', 'utf-8', $item->getFileName());

        $returnData['child'][] = $fullPath;

    }
}

echo json_encode($returnData);