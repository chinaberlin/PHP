<?php
/**
 * Kittencup Module
 *
 * @date 14-7-14 下午3:27
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */


//**********************************
// 添加一些前端需要用的第3方的Link
//**********************************
function addWebHeadLink()
{
    $cssList = [
        '/bootstrap3/css/bootstrap.min.css'
    ];

    $linkTemplate = '<link rel="stylesheet" href="%s"/>';

    foreach ($cssList as $path) {
        echo sprintf($linkTemplate, VENDOR_PATH . $path);
    }

    // 添加根目录下的style.css
    echo sprintf($linkTemplate, get_template_directory_uri() . '/style.css');
}

add_action('wp_head', 'addWebHeadLink');

//**********************************
// 添加一些列的前端需要用的第3方的Script
//**********************************
function addWebHeadScript()
{
    $scriptList = [
        '/jquery/jquery/jquery.min.js',
        '/bootstrap3/js/bootstrap.min.js'
    ];

    $scriptTemplate = '<script type="text/javascript" src="%s"></script>';

    foreach ($scriptList as $path) {
        echo sprintf($scriptTemplate, VENDOR_PATH . $path);
    }
}

add_action('wp_head', 'addWebHeadScript');

//**********************************
// 添加一些列的前端需要用的Script
//**********************************
function addWebScript()
{
    $scriptList = [
        'index.js'
    ];

    $scriptTemplate = '<script type="text/javascript" src="%s"></script>';

    foreach ($scriptList as $path) {
        echo sprintf($scriptTemplate, PUBLIC_WEB_PATH . '/js/' . $path);
    }
}

add_action('wp_footer', 'addWebScript');


//**********************************
// 模板加载完初始化事情
//**********************************
function themeSetup()
{
    register_nav_menus([
        'top_menu' => 'Top menu',
        'footer_menu' => 'Footer menu'
    ]);

    add_theme_support('post-formats',['video']);

    add_theme_support('widgets');

}

add_action('after_setup_theme', 'themeSetup');

