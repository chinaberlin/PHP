<?php
/**
 * Kittencup Module
 *
 * @date 14-7-11 上午10:59
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

/**
 * 加载sdk包以及错误代码包
 */
require_once './sdk.class.php';

$oss_sdk_service = new ALIOSS();

$oss_sdk_service->set_debug_mode(FALSE);

upload_by_dir($oss_sdk_service);

//function get_service($obj){
//    $response = $obj->list_bucket();
//    echo $response->body;
//}

//通过multipart上传整个目录
function upload_by_dir($obj){
    $bucket = 'onlyitedu';
    $dir = "C:\\xampp\\htdocs\\oss\\util";
    $recursive = false;

    $response = $obj->create_mtu_object_by_dir($bucket,$dir,$recursive);
    var_dump($response->body);
}