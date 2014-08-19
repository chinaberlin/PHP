<?php
/**
 * Kittencup Module
 *
 * @date 14-7-18 下午1:16
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

wp_enqueue_media();

global $gridAdminOptions;

if (!isset($gridAdminOptions['global'])) {
    $gridAdminOptions['global'] = array();
}


if ($_POST) {

    foreach ($_POST as $key => $post) {
        if (!empty($post)) {
            $gridAdminOptions['global'][$key] = $post;
        }
    }

    update_option('grid_admin_options', $gridAdminOptions);


}

?>


<div class="wrap">
    <h2>全局选项</h2>

    <form method="post" action="">
        <table class="form-table">
            <tbody>
            <tr>
                <th scope="row"><label for="blogname">站点LOGO</label></th>
                <td>
                    <p><img width="100px"
                            src="<?php echo isset($gridAdminOptions['global']['logo']) ? $gridAdminOptions['global']['logo'] : '' ?>"
                            class="logo-preview"/></p>
                    <input type="hidden" class="logo-hidden" name="logo"/>
                    <input type="button" class="button grid-upload" value="上传">
                </td>
            </tr>
            <tr>
                <th scope="row"><label for="blogname">首页欢迎</label></th>
                <td>
                    <textarea name="welcome" cols="30" rows="10"><?php echo isset($gridAdminOptions['global']['welcome']) ? $gridAdminOptions['global']['welcome'] : ''; ?></textarea>
                </td>
            </tr>
            </tbody>
        </table>

        <p class="submit"><input type="submit" id="submit" class="button button-primary" value="保存更改"></p>
    </form>
</div>

<script>

    (function ($) {


        $('.grid-upload').on('click', function () {
            var media = wp.media({
                title: '请选择logo'
            }).open().on('select', function () {

                var selectionMedia = media.state().get('selection').first();

                $('.logo-preview').attr('src', selectionMedia.attributes.url);
                $('.logo-hidden').val(selectionMedia.attributes.url);

            });
        });
    })(jQuery)
</script>