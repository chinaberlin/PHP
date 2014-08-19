<?php
/**
 * Kittencup Module
 *
 * @date 14-7-14 下午3:27
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

//**********************************
// 添加一些列的前端需要用的Link
//**********************************
function addWebLink()
{
    $cssList = [
        '/vendor/Bootstrap3/css/bootstrap.min.css'
    ];

    $templateUri = get_template_directory_uri();
    $linkTemplate = '<link rel="stylesheet" href="%s"/>';

    foreach ($cssList as $path) {
        echo sprintf($linkTemplate, $templateUri . $path);
    }

}

add_action('wp_head', 'addWebLink');