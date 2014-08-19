<?php
/**
 * Kittencup Module
 *
 * @date 14-7-9 下午2:29
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */


$zip = new ZipArchive();

if (!$zip->open('./bootstrap3.zip')) {
    exit('open error');
}

$zip->extractTo('demo1');
$zip->close();