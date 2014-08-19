<?php
/**
 * Kittencup Module
 *
 * @date 14-7-9 下午3:07
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

$db = new mysqli('localhost', 'root', '', 'zf2cms');
$result = $db->query("select * from `kp-cms-user` where 1");

$data = $result->fetch_all(MYSQL_ASSOC);
var_dump($data);
