<?php
/**
 * Kittencup Module
 *
 * @date 14-7-9 下午3:42
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

$db = new SQLite3('demo003', SQLITE3_OPEN_READWRITE);

$db->query("insert into user values(null,'zhangsan')");