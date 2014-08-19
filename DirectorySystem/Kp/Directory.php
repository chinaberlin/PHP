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
<<<<<<< HEAD
use \FilesystemIterator;
=======
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b

class Directory
{

    public static function size($path)
    {

    }
<<<<<<< HEAD

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
=======
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
}