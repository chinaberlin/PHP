<?php

/**
 * Kittencup Module
 *
 * @date 14-7-16 上午10:41
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
class Bootstrap_Nav_Menu extends Walker_Nav_Menu
{

    public function __construct()
    {
        $this->setNavMenuLinkAttributes();
        $this->setNavMenuActive();
    }

    public function setNavMenuActive(){
        add_filter('nav_menu_css_class',function($classes){

            if(in_array('current-menu-item',$classes) || in_array('current-menu-ancestor',$classes)){
                $classes[] = 'active';
            }

            return $classes;
        });
    }

    /**
     * 设定 hook nav_menu_link_attributes 如果有子元素则对a的属性添加class,data-toggle
     */
    public function setNavMenuLinkAttributes()
    {
        add_filter('nav_menu_link_attributes', function ($atts, $item, $args) {


            if (in_array('menu-item-has-children', $item->classes)) {
                $atts['class'] = 'dropdown-toggle';
                $atts['data-toggle'] = 'dropdown';

                $args->link_after = '<span class="caret"></span>';

            } else {
                $args->link_after = '';
            }

            return $atts;
        }, 10, 3);
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
        $output .= "\n$indent<ul class=\"dropdown-menu\">\n";
    }

}