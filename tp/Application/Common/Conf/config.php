<?php
return array(
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'zf2cms', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => '', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => '', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集,

    'DEFAULT_THEME'    =>    'default' ,// 主题

    'TMPL_L_DELIM' => '{{',
    'TMPL_R_DELIM' => '}}',

    'LAYOUT_ON'=>true,
    'LAYOUT_NAME'=>'layout',

    'LANG_SWITCH_ON' => true,
    'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
    'LANG_LIST'        => 'en-us,zh-cn,zh-tw', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE'     => 'l', // 默认语言切换变量

    'URL_PARAMS_BIND'=>true,

    'URL_MODEL'=>1,


);