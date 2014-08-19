<?php
/**
 * Kittencup Module
 *
 * @date 14-7-14 下午3:00
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
get_header();
?>
<div class="container">

    <div class="col-sm-8">
        <?php while (have_posts()) : ?>
            <?php the_post(); ?>
            <?php get_template_part('content', get_post_format()); ?>
        <?php endwhile; ?>

        <div class="col-sm-12 text-center">
            <?php
            Bootstrap_Paginator::show();
            ?>
        </div>
    </div>

    <div class="col-sm-2">
        <?php get_template_part('sidebar');?>
    </div>

</div>
<?php
get_footer();

?>

