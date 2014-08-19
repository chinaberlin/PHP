<?php
/**
 * Kittencup Module
 *
 * @date 14-6-30 下午1:04
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

namespace Admin\Model;

<<<<<<< HEAD
use Think\Model\RelationModel;

class UserModel extends RelationModel
{
    protected $tableName = 'kp-cms-user';

    protected $_link = [
        'loginInfo' => [
            'mapping_type'  => self::HAS_MANY,
            'class_name' => 'kp-cms-user-login-info',
            'foreign_key' => 'uid',
        ],
        'loginMeta'=>[
            'mapping_type' => self::HAS_ONE,
            'class_name' => 'kp-cms-user-meta',
            'foreign_key' => 'user_id',
        ]
    ];


=======
use Think\Model;

class UserModel extends Model
{
    protected $tableName = 'kp-cms-user';

>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
    protected $_map = [
        '_username' => 'username',
        '_password' => 'password',
        '_email' => 'email'
    ];

    protected $_validate = [
        array('username', 'require', '用户名必须填写'),
        array('username', '', '用户名已经存在', UserModel::EXISTS_VALIDATE, 'unique'),

        array('username', '5,10', '用户名长度必须是5-10位', UserModel::EXISTS_VALIDATE, 'length'),

        array('password', 'require', '密码必须输入', UserModel::EXISTS_VALIDATE, 'regex', UserModel::MODEL_INSERT),
        array('password', '_password_confirm', '确认密码不正确', UserModel::EXISTS_VALIDATE, 'confirm'),

        array('email', 'email', '邮箱格式不正确'),
        array('email', '', '邮箱已经存在', UserModel::EXISTS_VALIDATE, 'unique'),
    ];

    protected $_auto = [

        array('reg_date', 'setRegDate', UserModel::MODEL_INSERT, 'callback'),
        array('reg_ip', 'setRegIp', UserModel::MODEL_INSERT, 'callback'),

        array('password', 'setPassword', UserModel::MODEL_BOTH, 'callback'),
        array('password', '', UserModel::MODEL_UPDATE, 'ignore'),
    ];

    public function setPassword($password)
    {
        $password = trim($password);
        if ($password === '') {
            return $password;
        }
        return md5($password);
    }

    protected function setRegDate()
    {
        return date('Y-m-d H:i:s');
    }

    protected function setRegIp()
    {
        return get_client_ip();
    }
}