<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-28
 * Time: 下午1:14
 */

namespace Kp;

class File
{
    public static function formatSize($size)
    {
        if ($size === 0) {
            return '';
        }

        return number_format(ceil($size / 1024)) . 'KB';
    }
}