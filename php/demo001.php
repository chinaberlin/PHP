<?php

/*
 *
 */

//

#

$a = 10;

$demo = "{$a}上海";

$demo = [];

/**
 * 数字索引
 */
$demo = ['上海', '北京', '杭州'];
echo $demo[2];
/**
 * 关键字索引
 */
$demo = ['age' => 30, 'name' => '张三', 'city' => '上海'];
echo $demo['age'];


foreach ($demo as $key => $val) {
    echo $key, $val;
}


define('CSS_PATH', '../demo/css');


$css_path = '../demo/css';

function get($fileName = 'b.css')
{
    global $css_path;

    return '<link href="' . $css_path . '/' . $fileName . '" />';
}

echo get();



