<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-21
 * Time: 下午1:36
 */
class Db
{

    protected static $instance = null;

    public static function getInstance()
    {
        if(self::$instance === null){
            self::$instance = new Db;
        }
        return self::$instance;
    }
}

