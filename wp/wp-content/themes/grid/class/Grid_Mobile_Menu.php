<?php

/**
 * Kittencup Module
 *
 * @date 14-7-16 上午10:41
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
class Grid_Mobile_Menu extends Walker_Nav_Menu
{
    public function __construct(){
        remove_filter('nav_menu_link_attributes', 'navAddIcon');
    }
    /**
     * 设置 ul的class为dropdown-menu
     * @param string $output
     * @param int $depth
     * @param array $args
     */
    function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"dl-submenu\">\n";
    }

}