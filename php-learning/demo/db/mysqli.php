<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-6-6
 * Time: 上午10:16
 */

$mysqli = new mysqli('127.0.0.1','root','','zf2mvc');

$result = $mysqli->query('select * from album where 1');

$resultSet = $result->fetch_array();

var_dump($resultSet);