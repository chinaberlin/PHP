<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-28
 * Time: 上午10:51
 */
namespace Kp;

class Config
{
    protected static $config = [
<<<<<<< HEAD
        'path' => 'C:/xampp/htdocs',
=======
        'path' => 'D:/',
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
        'urlPathKey'=>'path',
        'pageShow'=>10,
        'urlPageKey'=>'page',
        'pageRangeShow'=>6
    ];

    public static function getConfig($key, $default = null)
    {
        if (array_key_exists($key, static::$config)) {
            return static::$config[$key];
        }
        return $default;
    }

    public static function setConfig($key, $val)
    {
        static::$config[$key] = $val;
    }
}

