<?php
/**
  * Kittencup (http://www.kittencup.com/)
  *
  * @date 2014-3-1 ����1:12:05
  * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
  * @license   http://kittencup.com
  */
$arr = array();

// js {}
// js []

$arr = array(
    'name' => '张三'
);

$arr['name'];

$arr['age'] = 20;

foreach ($arr as $key => $item) {
    echo $key, $item;
}

$array = array(
    'children' => array(
        'name' => 'xx',
        'children' => array(
            'name' => 'a'
        )
    )
);


