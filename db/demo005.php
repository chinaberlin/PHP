<?php
/**
 * Kittencup Module
 *
 * @date 14-7-11 上午9:09
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */


try {
    $pdo = new PDO('mysql:host=localhost;dbname=zf2cms', 'root', '', [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
    ]);
} catch (PDOException $e) {
    echo $e->getMessage();
}


try {

    $pdo->beginTransaction();

    $sql = '';
    $PDOStatement = $pdo->query($sql);

    $PDOStatement->execute();


    $pdo->commit();
} catch (PDOException $e) {

    $pdo->rollBack();
}