<?php

include '../config/website.config.php';
include '../global/db.php';

/**
 * i18n
 * @param $word
 * @return mixed
 */
function __($word)
{
    $langPath = '../lang/' . LANG . '.php';

    if (file_exists($langPath)) {
        $lang = include $langPath;

        $wordKey = strtolower($word);

        if (array_key_exists($wordKey, $lang)) {
            return $lang[$wordKey];
        }
    }

    return $word;
}

function getUserType($type = null, $default = null)
{
    $data = [
        '1' => 'normal',
        '2' => 'administrator'
    ];

    if ($type === null) {
        return $data;
    }

    if (array_key_exists($type, $data)) {
        return $data[$type];
    }

    return $default;
}

function getUserStatus($type = null, $default = null)
{
    $data = [
        '1' => 'normal',
        '-1' => 'disabled login'
    ];


    if ($type === null) {
        return $data;
    }


    if (array_key_exists($type, $data)) {
        return $data[$type];
    }
    return $default;
}

function debug($content)
{
    echo '<pre>';
    print_r($content);
    echo '</pre>';
}

function fetchAll($sql)
{

    $result = mysql_query($sql);

    $data = [];

    while ($row = mysql_fetch_assoc($result)) {

        $data[] = $row;

    }

    return $data;

}

function fetchCount($sql)
{
    $result = mysql_query($sql);

    return mysql_num_rows($result);
}

function showPage($userCount, $pageShowCount, $page)
{

// 获取uri地址
    $uri = $_SERVER['REQUEST_URI'];

    // 解析uri地址
    $uriList = parse_url($uri);

    if (isset($uriList['query'])) {
        $uriQuery = $uriList['query'];
        parse_str($uriQuery, $params);
        unset($params['page']);
        $query = http_build_query($params);
    } else {
        $query = '';
    }

    $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $uriList['path'] . '?' . $query;

    // 总共分几页
    $totalPage = ceil($userCount / $pageShowCount);

    $html = '<ul class="pagination">';

    $html .= '<li><a href="' . $url . '&page=1">&laquo;</a></li>';

    $pageCount = 4;

    $start = $page - $pageCount;
    $end = $page + $pageCount;

    if ($start < 1) {
        $start = 1;
        $end += $pageCount - $page + $start;
    }

    if ($end > $totalPage) {
        $end = $totalPage;

        $start -= $pageCount - ($totalPage - $page);

        if ($start < 1) {
            $start = 1;
        }
    }

    for ($i = $start; $i <= $end; $i++) {
        $html .= '<li ' . ($page == $i ? 'class="active"' : '') . '><a href="' . $url . '&page=' . $i . '">' . $i . '</a></li>';
    }


    $html .= '<li><a href="' . $url . '&page=' . $totalPage . '">&raquo;</a></li>';

    $html .= '</ul>';


    return $html;
}

function hrSort($type, $name)
{

    $html = '<th';


    $uri = $_SERVER['REQUEST_URI'];

    // 解析uri地址
    $uriList = parse_url($uri);

    if (isset($uriList['query'])) {
        $uriQuery = $uriList['query'];
        parse_str($uriQuery, $params);
        unset($params['page']);
        if (isset($params['order'])) {
            if ($params['order'] === 'desc') {
                $order = 'asc';
            } else {
                $order = 'desc';
            }
            unset($params['order']);
        } else {
            $order = 'asc';
        }

        unset($params['orderType']);
        $query = http_build_query($params);
    } else {
        $query = '';
        $order = 'asc';
    }

    if ($order === 'desc') {
        $html .= ' class="dropup">';
    } else {
        $html .= '>';
    }


    $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $uriList['path'] . '?' . $query;;

    $html .= '<a href="' . ($url . '&orderType=' . $type . '&order=' . $order) . '">' . __($name) . '</a>';

    if (isset($_GET['type'])) {
        if ($_GET['type'] !== $type) {
            $class = 'hidden';
        } else {
            $class = '';
        }
    } else {
        if ($type !== 'id') {
            $class = 'hidden';
        } else {
            $class = '';
        }
    }
    $html .= '<span class="caret ' . $class . '"></span>';
    $html .= '</th>';
    return $html;
}