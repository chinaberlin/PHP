<?php
/**
 * Kittencup Module
 *
 * @date 14-7-14 下午3:05
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

?>
<!doctype html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">

    <title><?php wp_title('|',true,'right');?></title>

    <?php wp_head();?>

</head>
<body <?php body_class();?>>


    <header class="kp-web-header">

        <div class="container">
            <nav class="navbar navbar-default" role="navigation">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><?php echo get_bloginfo('name');?></a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <?php
                            wp_nav_menu([
                                'theme_location'=>'top_menu',
                                'container'=>false,
                                'menu_class'=>'nav navbar-nav',
                                'walker'=>new Bootstrap_Nav_Menu()
                            ]);
                        ?>
                    </div>
                </div>
            </nav>
        </div>

    </header>


