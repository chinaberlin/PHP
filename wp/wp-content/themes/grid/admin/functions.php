<?php

function grid_add_admin_menu()
{

    add_menu_page('Grid配置管理', 'Grid样式配置', 'edit_themes', 'grid_menu', '','',99);

    add_submenu_page('grid_menu','全局','配置','edit_themes','grid_menu_sub_global',function(){
        include 'template/global.php';
    });

    add_submenu_page('grid_menu','介绍','介绍','edit_themes','grid_menu_sub_introduce',function(){
        include 'template/introduce.php';
    });

    remove_submenu_page('grid_menu','grid_menu');

}

add_action('admin_menu', 'grid_add_admin_menu');

?>