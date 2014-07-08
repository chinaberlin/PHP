<?php
 /**
  * Kittencup (http://www.kittencup.com/)
  *
  * @date 2014-3-1 ����11:50:50
  * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
  * @license   http://kittencup.com
  */
 

$str = 'sdjioa12jio1ji2';

$count = 0;

// echo str_replace('s', '中', $str);

str_replace(['s','j'], ['中','国'], $str,$count);

echo $count;