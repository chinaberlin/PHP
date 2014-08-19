<?php
/**
 * Kittencup Module
 *
 * @date 14-7-14 下午3:26
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

include 'framework/options.php';
include 'framework/web/hooks.php';
include 'framework/class/Bootstrap_Nav_Menu.php';
include 'framework/class/Bootstrap_Paginator.php';
include 'framework/widget/Bootstrap_Search.php';

$args = array(
    'name' => '首页右侧小工具',
    'id' => 'index-right-sidebar',
);

register_sidebar($args);

register_widget('Bootstrap_Search');