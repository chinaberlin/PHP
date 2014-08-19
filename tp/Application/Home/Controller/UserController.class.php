<?php
namespace Home\Controller;

use Think\Controller;

class UserController extends Controller
{
    public function login()
    {

        if (session('userInfo')) {
            exit('已经登录,跳转到首页');
        }

        if (IS_GET) {
            $returnUrl = $_SERVER['HTTP_REFERER'];
            session('returnUrl', $returnUrl);
        };

        if (IS_POST) {

            $model = D('Admin/User');

            $verifyCode = I('post._verify');

            $Verify = new \Think\Verify();

            if (!$Verify->check($verifyCode)) {
                return $this->error('验证码不正确', U('login'));
            }

            $password = I('post._password');
            $password = $model->setPassword($password);

            $username = I('post._username');
            if (empty($username)) {
                return $this->error('用户名不能为空', U('login'));
            }

            if (empty($password)) {
                return $this->error('密码不能为空', U('login'));
            }

            $user = $model->where(['username' => $username, 'password' => $password])->find();

            if (empty($user)) {
                return $this->error('用户名不存在或者密码不正确', U('login'));
            }


            if (I('post.rememberMe')) {
                cookie('uid', $user['id'], 3600);
                cookie('userInfo', md5($user['password'] . $user['email']), 3600);
            }

            session('userInfo', $user);

            $returnUrl = session('returnUrl');

            if ($returnUrl) {
                session('returnUrl', null);
                return redirect($returnUrl);
            } else {
                exit('已经登录,跳转到首页');
            }

        }
        $this->display();
    }

    public function verify()
    {
        $Verify = new \Think\Verify();
        $Verify->entry();

//        $txt = '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY';
//
//        $str = '';
//        for ($i = 0; $i < 4; $i++) {
//            $str .= $txt[rand(0, strlen($txt) - 1)];
//        }
//
//        $img = imagecreate(100,50);
//
//        imagecolorallocate($img, 0, 0, 0);
//
//        $color = imagecolorallocate($img, 255,255,255);
//
//        imagestring($img,5,30,5,$str,$color);
//
//        // 告诉浏览器 我当前文件使用的image/png类型
//        header("content-type: image/png");
//        imagepng($img);
//        imagedestroy($img);
    }
}