<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-28
 * Time: 下午1:05
 */

namespace Kp;

use \RecursiveDirectoryIterator;
use \RecursiveIteratorIterator;
use \FilesystemIterator;

class Directory
{

    public static function size($path)
    {

    }

    public static function recursiveRmDir($dir)
    {
        $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
        foreach ($iterator as $filename => $fileInfo) {
            if ($fileInfo->isDir()) {
                rmdir($filename);
            } else {

                unlink($filename);
            }
        }

        rmdir($dir);
    }
}