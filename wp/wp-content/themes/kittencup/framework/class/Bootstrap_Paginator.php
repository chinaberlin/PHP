<?php

/**
 * Kittencup Module
 *
 * @date 14-7-16 下午2:39
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
class Bootstrap_Paginator
{

    protected static $liTemplate = '<li %s><a href=" % s">%s</a></li>';
    protected static $urTemplate = '<ul class="pagination">%s</ul>';

    public static function show()
    {
        global $wp_query, $paged;

        $max = $wp_query->max_num_pages;

        $liHtml = '';

        if ($paged < 1) {
            $paged = 1;
        }

        for ($i = 1; $i <= $max; $i++) {
            $class = '';
            if ($i === $paged) {
                $class = 'class="active"';
            }
            $liHtml .= sprintf(static::$liTemplate, $class, get_pagenum_link($i), $i);
        }

        echo sprintf(static::$urTemplate, $liHtml);

    }
}

