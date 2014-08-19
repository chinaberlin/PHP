<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-28
 * Time: 上午10:31
 */
namespace Kp;

class Head
{
    protected static $scriptTemplate = '<script type="text/javascript" src="%s.js"></script>';
        protected static $styleTemplate = '<link rel="stylesheet" href="%s.css"/>';

    public static function script($path)
    {
        if (!is_array($path)) {
            $path = [$path];
        }

        $returnHtml = '';
        foreach ($path as $p) {
            $returnHtml .= sprintf(static::$scriptTemplate, $p);
        }
        return $returnHtml;
    }

    public static function style($path)
    {
        if (!is_array($path)) {
            $path = [$path];
        }

        $returnHtml = '';
        foreach ($path as $p) {
            $returnHtml .= sprintf(static::$styleTemplate, $p);
        }
        return $returnHtml;
    }

}