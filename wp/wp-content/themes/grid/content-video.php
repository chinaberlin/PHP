<?php
/**
 * Kittencup Module
 *
 * @date 14-7-21 上午10:31
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

?>
<article class="post-item video-post">
    <div class="flx-entry-thumb">
        <embed src="http://player.youku.com/player.php/Type/Folder/Fid/22539048/Ob/1/sid/<?php echo strip_tags(get_the_content()); ?>/v.swf" quality="high" width="100%" height="500px" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>
    </div>
    <!--end:flx-entry-thumb-->
    <div class="entry-content clearfix">
        <header>
            <h2 class="entry-title"><a href=">"><?php the_title();?>/a></h2>
            <span class="entry-author"><i class="icon-user"></i><?php the_author();?></span>
            <span class="entry-date"><i class="icon-time"></i><?php the_date();?></span>
            <span class="entry-categories"><i class="icon-suitcase"></i><?php strip_tags(the_category());?></span>
            <span class="entry-comment"><i class="icon-comments-alt"></i><a href="#">15 comments</a></span>
        </header>

        <div class="outside-info">
            <p class="outside-date">22<span>Mar</span></p>

            <p class="outside-icon"><i class="icon-film"></i></p>
        </div>
        <!--end:outside-info-->
    </div>
    <!--end:entry-content-->
</article><!--end:flx-entry-item-->
