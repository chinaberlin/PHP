<?php
/**
 * Kittencup Module
 *
 * @date 14-7-18 上午9:54
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

include 'class/Grid_Mobile_Menu.php';

include 'admin/functions.php';


$gridAdminOptions = get_option('grid_admin_options', array());


//**********************************
// 模板加载完初始化事情
//**********************************
function themeSetup()
{
    register_nav_menus([
        'top_menu' => 'Top menu',
        'footer_menu' => 'Footer menu'
    ]);

    add_theme_support('post-formats', ['video']);

    add_theme_support('widgets');

}

add_action('after_setup_theme', 'themeSetup');


//**********************************
// 添加前端head的script和style
//**********************************
function addWebHeader()
{
    wp_enqueue_style('bootstrap',get_template_directory_uri().'/css/bootstrap.css');
    wp_enqueue_style('font-awesome.min',get_template_directory_uri().'/css/font-awesome.min.css');
    wp_enqueue_style('flexslider',get_template_directory_uri().'/css/flexslider.css');
    wp_enqueue_style('prettyPhoto',get_template_directory_uri().'/css/prettyPhoto.css');
    wp_enqueue_style('mediaelementplayer',get_template_directory_uri().'/css/mediaelementplayer.min.css');
    wp_enqueue_style('superfish',get_template_directory_uri().'/css/superfish.css');
    wp_enqueue_style('bra_social_media',get_template_directory_uri().'/css/bra_social_media.css');
    wp_enqueue_style('component',get_template_directory_uri().'/css/component.css');
    wp_enqueue_style('theme-options',get_template_directory_uri().'/css/theme-options.css');
    wp_enqueue_style('icoMoon',get_template_directory_uri().'/css/icoMoon.css');
    wp_enqueue_style('iview',get_template_directory_uri().'/css/iview.css');
    wp_enqueue_style('revolution-slider',get_template_directory_uri().'/css/revolution-slider.css');
    wp_enqueue_style('fullwidth',get_template_directory_uri().'/css/fullwidth.css');
    wp_enqueue_style('style',get_template_directory_uri().'/style.css"');
    wp_enqueue_style('bootstrap-responsive',get_template_directory_uri().'/css/bootstrap-responsive.css');
    wp_enqueue_style('responsive',get_template_directory_uri().'/css/responsive.css');

    echo '<!--[if lt IE 9]>', "\n";
    echo '<script src="', get_template_directory_uri(), '/js/html5.js">', "\n";
    echo '<script src="', get_template_directory_uri(), '/js/css3-mediaqueries.js"></script>', "\n";
    echo '<link rel="stylesheet" href="', get_template_directory_uri(), '/css/ie.css" type="text/css" media="all" />', "\n";
    echo '<![endif]-->';

    echo '<link rel="stylesheet" href="', get_template_directory_uri(), '/css/skin/orange.css" type="text/css" id="templates" />';
}

add_action('wp_enqueue_scripts', 'addWebHeader');



//**********************************
// 添加前端footer的script
//**********************************
function addWebFooter(){
    wp_enqueue_script('jquery-1.8.3',get_template_directory_uri().'/js/jquery-1.8.3.min.js',array(),false,true);
    wp_enqueue_script('superfish',get_template_directory_uri().'/js/superfish.js',array(),false,true);
    wp_enqueue_script('retina',get_template_directory_uri().'/js/retina.js',array(),false,true);
    wp_enqueue_script('bootstrap',get_template_directory_uri().'/js/bootstrap.js',array(),false,true);
    wp_enqueue_script('jquery.form',get_template_directory_uri().'/js/jquery.form.js',array(),false,true);
    wp_enqueue_script('jquery.validate.min',get_template_directory_uri().'/js/jquery.validate.min.js',array(),false,true);
    wp_enqueue_script('jquery.nivo.slider',get_template_directory_uri().'/js/jquery.nivo.slider.js',array(),false,true);
    wp_enqueue_script('jquery.flexslider',get_template_directory_uri().'/js/jquery.flexslider.js',array(),false,true);
    wp_enqueue_script('jquery.carouFredSel-5.6.4',get_template_directory_uri().'/js/jquery.carouFredSel-5.6.4.js',array(),false,true);
    wp_enqueue_script('jquery.prettyPhoto',get_template_directory_uri().'/js/jquery.prettyPhoto.js',array(),false,true);
    wp_enqueue_script('jflickrfeed.min',get_template_directory_uri().'/js/jflickrfeed.min.js',array(),false,true);
    wp_enqueue_script('mediaelement-and-player.min',get_template_directory_uri().'/js/mediaelement-and-player.min.js',array(),false,true);
    wp_enqueue_script('modernizr.custom.63321',get_template_directory_uri().'/js/modernizr.custom.63321.js',array(),false,true);
    wp_enqueue_script('jquery.hoverdir',get_template_directory_uri().'/js/jquery.hoverdir.js',array(),false,true);
    wp_enqueue_script('jquery.dropdown',get_template_directory_uri().'/js/jquery.dropdown.js',array(),false,true);
    wp_enqueue_script('modernizr.custom',get_template_directory_uri().'/js/modernizr.custom.js',array(),false,true);
    wp_enqueue_script('jquery.dlmenu',get_template_directory_uri().'/js/jquery.dlmenu.js',array(),false,true);
    wp_enqueue_script('jquery.isotope.min',get_template_directory_uri().'/js/jquery.isotope.min.js',array(),false,true);
    wp_enqueue_script('jquery.eislideshow',get_template_directory_uri().'/js/jquery.eislideshow.js',array(),false,true);
    wp_enqueue_script('raphael-min',get_template_directory_uri().'/js/raphael-min.js',array(),false,true);
    wp_enqueue_script('iview',get_template_directory_uri().'/js/iview.js',array(),false,true);
    wp_enqueue_script('custom',get_template_directory_uri().'/js/custom.js',array(),false,true);
    wp_enqueue_script('jquery.easing.1.3',get_template_directory_uri().'/js/jquery.easing.1.3.js',array(),false,true);
    wp_enqueue_script('jquery.quicksand',get_template_directory_uri().'/js/jquery.quicksand.js',array(),false,true);
    wp_enqueue_script('main',get_template_directory_uri().'/js/main.js',array(),false,true);
    wp_enqueue_script('bra_social_media',get_template_directory_uri().'/js/bra_social_media.js',array(),false,true);
    wp_enqueue_script('jquery.themepunch.plugins.min',get_template_directory_uri().'/js/jquery.themepunch.plugins.min.js',array(),false,true);
    wp_enqueue_script('jquery.themepunch.revolution.min',get_template_directory_uri().'/js/jquery.themepunch.revolution.min.js',array(),false,true);
    wp_enqueue_script('styleswitch',get_template_directory_uri().'/js/styleswitch.js',array(),false,true);
}
add_action('wp_enqueue_scripts','addWebFooter');


//**********************************
// 添加导航的icon
//**********************************
function navAddIcon($atts, $item, $args)
{
    $args->link_before = '<i class="icon-' . strtolower($atts['title']) . '"></i>';
    return $atts;
}

add_filter('nav_menu_link_attributes', 'navAddIcon', 10, 3);

