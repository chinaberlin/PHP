<?php
/**
 * Kittencup Module
 *
 * @date 14-7-16 下午2:10
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

?>

<div class="col-sm-12">
    <div class="col-sm-12">
        <h2><?php the_title();?></h2>
    </div>
    <div class="col-sm-12">
        <?php the_content(); ?>
    </div>
    <div class="col-sm-12">
        <?php echo get_the_author_link();?>
        <?php the_time('Y-m-d H:i:s');?>
        <?php the_category('-','multiple');?>
    </div>
</div>