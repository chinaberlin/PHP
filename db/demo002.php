<?php
/**
 * Kittencup Module
 *
 * @date 14-7-9 下午3:14
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
$db = new mysqli('localhost', 'root', '', 'zf2cms');

$db->autocommit(false);

try {

    if (!$db->query('update xxxxxxxxxxx')) {
        throw new Exception('update error');
    }

    if (!$db->query('update xxxxxxxxxxx')) {
        throw new Exception('update error');
    }

    if (!$db->query('update xxxxxxxxxxx')) {
        throw new Exception('update error');
    }

    if (!$db->query('update xxxxxxxxxxx')) {
        throw new Exception('update error');
    }

    $db->commit();

} catch (Exception $e) {

    $db->rollback();

}