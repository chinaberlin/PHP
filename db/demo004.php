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


//$pdoStatement = $pdo->query('SELECT * FROM  `kp-cms-user`');

//var_dump($pdoStatement->rowCount());

$pdoStatement = $pdo->prepare("INSERT INTO `zf2cms`.`kp-cms-user` (`id`, `username` VALUES (NULL, ? )");
$pdoStatement->execute(['zhangsan']);
$pdoStatement->execute(['zhangsan']);
$pdoStatement->execute(['zhangsan']);
$pdoStatement->execute(['zhangsan']);
$pdoStatement->execute(['zhangsan']);
$pdoStatement->execute(['zhangsan']);

$pdoStatement = $pdo->prepare("INSERT INTO `zf2cms`.`kp-cms-user` (`id`, `username` VALUES (NULL, :username )");
$pdoStatement->bindParam(':username', 'xjcjisjdijiasd', PDO::PARAM_STR);
$pdoStatement->execute();