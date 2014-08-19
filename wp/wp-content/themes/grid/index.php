<?php
/**
 * Kittencup Module
 *
 * @date 14-7-18 上午9:54
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

global $gridAdminOptions;

get_header();
?>
    <div id="main-content">

        <?php get_template_part('slider','index');?>


        <?php
        if(isset($gridAdminOptions['global']['welcome'])):
            ?>
            <div class="flx-divider">
                <div class="wrapper flx-line">
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="flx-intro">
                                <p>Welcome to Felixplus Grid. The awesome portfolio Template. Base on Bootstrap twitter framework & retina Supported</p>
                            </div>
                        </div>
                    </div><!--end:row-fluid-->
                </div><!--end:wrapper-->
            </div><!--end:flx-divider-->
        <?php endif;?>

        <?php if(!empty($gridAdminOptions['introduce'])):?>
        <div class="flx-divider">

            <div class="wrapper flx-line">

                <div class="row-fluid">

                    <div class="span12">

                        <ul class="flx-service-4 clearfix">
                            <?php foreach($gridAdminOptions['introduce'] as $introduce):?>
                            <li class="clearfix">
                                <span ><i class="<?php echo $introduce['icon'];?>"></i></span>
                                <div class="entry-content">
                                    <h5 class="entry-title"><a href="#" ><?php echo $introduce['title'];?></a></h5>
                                    <p><?php echo $introduce['content'];?></p>
                                </div>
                            </li>
                            <?php endforeach;?>
                        </ul>

                    </div><!--end:span12-->

                </div><!--end:row-fluid-->

            </div><!--end:wrapper-->

        </div><!--end:flx-divider-->
        <?php endif;?>

    </div>



<?php
get_footer();