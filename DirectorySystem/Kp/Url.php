<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-28
 * Time: 下午1:36
 */
namespace Kp;

class Url
{

    public static function create($query, $fileName = null)
    {

        $allQuery = Request::getQuery();

        $newQuery = array_merge($allQuery, $query);

        $queryString = http_build_query($newQuery);

        $scriptName = Request::getServer('SCRIPT_NAME');

        if ($fileName !== null) {
            $scriptName = ltrim($scriptName, '/');
            $scriptArr = explode('/', $scriptName);
            array_pop($scriptArr);
            $scriptArr[] = $fileName;
            $scriptName = '/' . implode('/', $scriptArr);
            $queryString = '';
        }
        return Request::getServer('REQUEST_SCHEME') . '://' . Request::getServer('HTTP_HOST') . $scriptName . '?' . $queryString;
    }
}