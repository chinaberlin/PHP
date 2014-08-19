<?php
/**
 * Kittencup Module
 *
 * @date 14-7-18 上午10:13
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
?>
<header id="flx-header" class="flx-divider">

    <div class="wrapper">

        <div class="row-fluid">

            <div class="span12 clearfix">

                <div id="logo-image">

                    <a <?php
                        global $gridAdminOptions;
                       if(!empty($gridAdminOptions['global']['logo'])){
                            echo 'style="background-image:url('.$gridAdminOptions['global']['logo'].')"';
                        }
                       ?> href="index.html"></a>

                </div><!--end:logo-image-->

                <nav id="main-nav">
                        <?php
                            wp_nav_menu([
                                'theme_location'=>'top_menu',
                                'container'=>false,
                                'menu_id'=>'main-menu'
                            ]);
                        ?>

                    <div id="dl-menu" class="dl-menuwrapper">
                        <button>Open Menu</button>
                        <?php
                        wp_nav_menu([
                            'theme_location'=>'top_menu',
                            'container'=>false,
                            'menu_class'=>'dl-menu',
                            'walker'=>new Grid_Mobile_Menu
                        ]);
                        ?>
                    </div>
                </nav><!--end:main-nav-->

                <!-- /dl-menuwrapper -->

            </div><!--end:span12-->

        </div><!--end:row-fluid-->

    </div><!--end:wrapper-->

</header><!--end:flx-header-->