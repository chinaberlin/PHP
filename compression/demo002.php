<?php
/**
 * Kittencup Module
 *
 * @date 14-7-9 下午2:33
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

$zip = new ZipArchive();

$zip->open('demo002.zip', ZIPARCHIVE::CREATE);

$zip->addEmptyDir('xxxxx');
//$zip->addFile('./demo1/bootstrap3/dist/css/bootstrap.css','xxxxx/bootstrap.css');
$zip->close();