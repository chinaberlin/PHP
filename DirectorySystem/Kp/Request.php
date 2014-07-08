<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-28
 * Time: 上午10:56
 */
namespace Kp;

class Request
{
    public static function isPost()
    {
        return !empty($_POST);
    }

    public static function getPost($key = null, $default = null)
    {
        if ($key === null) {
            return $_POST;
        }

        if (array_key_exists($key, $_POST)) {
            return $_POST[$key];
        }

        return $default;
    }

    public static function getQuery($key = null, $default = null)
    {
        if ($key === null) {
            return $_GET;
        }

        if (array_key_exists($key, $_GET)) {
            return $_GET[$key];
        }

        return $default;
    }

    public static function getServer($key = null, $default = null)
    {
        if ($key === null) {
            return $_SERVER;
        }

        if (array_key_exists($key, $_SERVER)) {
            return $_SERVER[$key];
        }

        return $default;
    }


}