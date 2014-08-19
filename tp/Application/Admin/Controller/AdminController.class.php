<?php
/**
 * Kittencup Module
 *
 * @date 14-7-2 下午3:05
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
namespace Admin\Controller;

use Think\Controller;

class AdminController extends Controller
{
    public function _initialize()
    {
        $user = session('userInfo');

        if (!$user) {

            $uid = cookie('uid');
            $userInfo = cookie('userInfo');

            if ($uid && $userInfo) {

                $model = D('Admin/User');
                $user = $model->where(['id' => $uid])->find();

                if ($user && md5($user['password'] . $user['email']) === $userInfo) {
                    session('userInfo', $user);
                }else{
                    return $this->error('请先登录', U('Home/User/login'));
                }

            }else{
                return $this->error('请先登录', U('Home/User/login'));
            }


        }
    }
}