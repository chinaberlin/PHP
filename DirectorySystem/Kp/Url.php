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

<<<<<<< HEAD
        if($fileName !== null){
            $allQuery = [];
        }

=======
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
        $newQuery = array_merge($allQuery, $query);

        $queryString = http_build_query($newQuery);

        $scriptName = Request::getServer('SCRIPT_NAME');

        if ($fileName !== null) {
            $scriptName = ltrim($scriptName, '/');
            $scriptArr = explode('/', $scriptName);
            array_pop($scriptArr);
            $scriptArr[] = $fileName;
            $scriptName = '/' . implode('/', $scriptArr);
<<<<<<< HEAD

=======
            $queryString = '';
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
        }
        return Request::getServer('REQUEST_SCHEME') . '://' . Request::getServer('HTTP_HOST') . $scriptName . '?' . $queryString;
    }
}