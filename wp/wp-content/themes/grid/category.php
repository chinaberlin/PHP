<?php
/**
 * Kittencup Module
 *
 * @date 14-7-21 上午9:28
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
?>
<?php
get_header();
?>

<div id="main-content">

    <section class="flx-intro flx-divider">

        <div class="wrapper flx-line">

            <div class="row-fluid">

                <div class="span12 clearfix">

                    <p class="flx-blog-thumb"></p>

                    <div class="flx-intro-content">

                        <h2>Blog</h2>
                        <p>Asunt in anim uis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in anim id est laborum. Allamco laboris nisi ut aliquip ex ea commodo consequat. Aser velit esse cillum dolore eu fugiat nulla pariatur.</p>

                    </div><!--end:flx-intro-content-->

                </div><!--end:span12-->

            </div><!--end:row-fluid-->

        </div><!--end:wrapper-->

    </section><!--end:flx-intro-->

    <div class="breadcrumb flx-divider">

        <div class="wrapper flx-line">

            <div class="row-fluid">

                <div class="span12 clearfix">
                    <?php

                    $catName= single_cat_title('', false);

                    $category = rtrim(get_category_parents( get_cat_ID($catName)),'/');
                    $categories = explode('/',$category);
                    ?>
                    <a href="<?php echo get_home_url();?>">首页</a>
                    <span>&nbsp;&nbsp;/&nbsp;&nbsp;</span>
                    <?php
                    foreach($categories as $category):
                    ?>
                        <?php
                            if($catName !== $category):
                        ?>
                        <a href="<?php echo get_category_link(get_cat_ID($category))?>"><?php echo $category;?></a>
                        <span>&nbsp;&nbsp;/&nbsp;&nbsp;</span>
                         <?php
                                else:
                         ?>
                                <span><?php echo $category;?></span>
                                <?php
                                    endif;
                                ?>
                    <?php
                        endforeach;
                    ?>
                </div><!--end:span12-->

            </div><!--end:row-fluid-->

        </div><!--end:wrapper-->

    </div><!--end:breadcrumb-->

    <div class="flx-divider">

        <div class="wrapper flx-line">

            <div class="row-fluid">

                <div class="span12">

                    <div id="main-col">


                    <?php while(have_posts()):?>
                        <?php the_post();?>
                        <?php
                            var_dump(get_post_format());
                        ?>
                        <?php get_template_part('content', get_post_format()); ?>
                        <?php endwhile;?>
                        <div class="pagination clearfix">
                            <ul class="page-numbers clearfix">
                                <li><a class="prev page-numbers" href="#">Previous</a></li>
                                <li><a class="page-numbers" href="#">1</a></li>
                                <li><span class="page-numbers current">2</span></li>
                                <li><span class="page-numbers dots">…</span></li>
                                <li><a class="page-numbers" href="#">8</a></li>
                                <li><a class="page-numbers" href="#">9</a></li>
                                <li><a href="#" class="next page-numbers">Next</a></li>
                            </ul><!--end:page-numbers-->
                        </div><!--end:pagination-->

                    </div><!--end:main-col-->

                </div><!--end:span12-->

            </div><!--end:row-fluid-->

        </div><!--end:wrapper-->

    </div><!--end:flx-divider-->




</div>

<?php
get_footer();
?>
