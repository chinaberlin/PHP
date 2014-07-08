<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-28
 * Time: 下午1:19
 */
namespace Kp;

class Paginator
{
    protected static $ulTempalte = '<ul class="pagination">%s%s%s</ul>';
    protected static $liTempalte = '<li class="%s"><a href="%s">%s</a></li>';
    protected static $activeClass = 'active';
    protected static $disabledClass = 'disabled';

    public static function show($dataCount)
    {
        $urlPageKey = Config::getConfig('urlPageKey');
        $totalPage = (int)ceil($dataCount / Config::getConfig('pageShow'));
        $page = (int)Request::getQuery($urlPageKey, 1);

        $firstHtml = sprintf(static::$liTempalte, $page === 1 ? static::$disabledClass : '', Url::create([$urlPageKey => 1]), '&laquo;');

        $avg = Config::getConfig('pageRangeShow') / 2;

        $min = $page - $avg;
        $max = $page + $avg;

        if ($min < 1) {
            $max = $max + $avg - $page + 1;
            $min = 1;
        }

        if ($max > $totalPage) {

            $min = $min - ($max - $totalPage);

            if ($min < 1) {
                $min = 1;
            }
            $max = $totalPage;
        }

        $rangeHtml = '';
        for ($i = $min; $i <= $max; $i++) {

            $rangeHtml .= sprintf(static::$liTempalte, $page === $i ? static::$activeClass : '', Url::create([$urlPageKey => $i]), $i);
        }

        $lastHtml = sprintf(static::$liTempalte, $page === $totalPage ? static::$disabledClass : '', Url::create([$urlPageKey => $totalPage]), '&raquo;');

        return sprintf(static::$ulTempalte, $firstHtml, $rangeHtml, $lastHtml);
    }

}

?>
