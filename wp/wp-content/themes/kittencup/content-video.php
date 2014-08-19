<?php
/**
 * Kittencup Module
 *
 * @date 14-7-16 下午2:11
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

?>

<div class="col-sm-12">
    <div class="col-sm-12">
        <h2><?php the_title();?></h2>
    </div>
    <div class="col-sm-12">
        <embed src="http://player.youku.com/player.php/Type/Folder/Fid/22539048/Ob/1/sid/<?php echo strip_tags(get_the_content()); ?>/v.swf" quality="high" width="480" height="400" align="middle" allowScriptAccess="always" allowFullScreen="true" mode="transparent" type="application/x-shockwave-flash"></embed>
    </div>
    <div class="col-sm-12">
        <?php echo get_the_author_link();?>
        <?php the_time('Y-m-d H:i:s');?>
        <?php the_category('-','multiple');?>
    </div>
</div>