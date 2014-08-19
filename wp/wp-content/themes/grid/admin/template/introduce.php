<?php
/**
 * Kittencup Module
 *
 * @date 14-7-18 下午1:16
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */


global $gridAdminOptions;

if (!isset($gridAdminOptions['introduce'])) {
    $gridAdminOptions['introduce'] = array();
}


if ($_POST) {
    $gridAdminOptions['introduce'] = array();

    if (isset($_POST['id'])) {
        foreach ($_POST['id'] as $id) {
            $data = array();
            $data['icon'] = $_POST['icon'][$id];
            $data['title'] = $_POST['title'][$id];
            $data['content'] = $_POST['content'][$id];
            $gridAdminOptions['introduce'][] = $data;
        }
    }

    update_option('grid_admin_options', $gridAdminOptions);

}

if (count($gridAdminOptions['introduce']) < 1) {
    $gridAdminOptions['introduce'][] = array(
        'icon' => '',
        'title' => '',
        'content' => ''
    );
}

?>


<div class="wrap">
    <h2>首页介绍</h2>

    <form method="post" action="">
        <?php foreach ($gridAdminOptions['introduce'] as $key => $item): ?>
            <table class="form-table">
                <tbody>
                <input type="hidden" name="id[]" value="<?php echo $key; ?>"/>
                <tr>
                    <th scope="row"><label for="blogname">ICON</label></th>
                    <td>
                        <input type="text" name="icon[<?php echo $key; ?>]" value="<?php echo $item['icon']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="blogname">title</label></th>
                    <td>
                        <input type="text" name="title[<?php echo $key; ?>]" value="<?php echo $item['title']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="blogname">content</label></th>
                    <td>
                        <textarea name="content[<?php echo $key; ?>]" cols="30"
                                  rows="10"><?php echo $item['content']; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="blogname">移除</label></th>
                    <td>
                        <p><input type="button" class="button button-secondary remove" value="移除">
                            <input type="button" class="button button-secondary copy" value="复制"></p>
                    </td>
                </tr>
                </tbody>
            </table>
        <?php endforeach; ?>
        <p class="submit"><input type="submit" id="submit" name="submit" class="button button-primary" value="保存更改"></p>
    </form>
</div>


<script>
    (function ($) {

        $('body').on('click', '.copy', function () {

            var lastId = $('form table:last').find('input[type=hidden]').val();
            ++lastId;
            console.log(lastId);
            var cloneTable = $(this).parents('table').clone();

            cloneTable.find('input[type=hidden]').val(lastId);
            cloneTable.find('input[name^=icon]').attr('name', 'icon[' + lastId + ']')
            cloneTable.find('input[name^=title]').attr('name', 'title[' + lastId + ']')
            cloneTable.find('textarea[name^=content]').attr('name', 'content[' + lastId + ']')
            cloneTable.insertBefore('.submit');
        });

        $('body').on('click', '.remove', function () {

            $(this).parents('table').remove();
        });

    })(jQuery);
</script>
