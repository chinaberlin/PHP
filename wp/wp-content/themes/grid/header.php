<?php
/**
 * Kittencup Module
 *
 * @date 14-7-18 上午9:53
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
?>

<!doctype html>
<html <?php language_attributes();?>>

<head>
    <meta charset="<?php bloginfo('charset');?>" />

    <title></title>

    <?php wp_head();?>

</head>

<body class="<?php echo is_home()?'flx-home-page-4':'blog-style-1';?>">
    <?php get_template_part('top-nav');?>

