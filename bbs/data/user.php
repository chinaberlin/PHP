<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-16
 * Time: 上午10:32
 */

$conn = mysql_connect('localhost', 'root', '');

mysql_select_db('bbs', $conn);

mysql_query('SET NAMES UTF8');

for($z = 0 ; $z < 1000 ; $z++){
$str = 'abcdefghijkmnopqrstuvwxyz123456789';

$username = '';

for ($i = 0, $l = rand(4, 10); $i < $l; $i++) {
    $username .= $str[rand(0, strlen($str) - 1)];
}

$password = md5($username);
$email = substr($password,0, rand(4, 10)) . '@qq.com';
$regdate = time();
$regip = '127.0.0.1';
$lastlogindate = time();
$lastloginip = $regip;
$type = 1;
$status = 1;
$sql = "INSERT INTO `bbs`.`user` VALUES (null,'{$username}' " .
    ", '{$password}', '{$email}', {$regdate}, '{$regip}', '{$lastloginip}', {$lastlogindate}, $type, $status);";

mysql_query($sql);

}