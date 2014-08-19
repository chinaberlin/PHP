<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-14
 * Time: 下午1:25
 */

$mysqlConfig = include '../config/mysql.config.php';

$conn = mysql_connect($mysqlConfig['host'], $mysqlConfig['username'], $mysqlConfig['password']);

mysql_select_db($mysqlConfig['dbname'], $conn);

mysql_query('SET NAMES UTF8');
