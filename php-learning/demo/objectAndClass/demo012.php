<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-21
 * Time: 下午2:19
 */
class WordPress
{

    protected $plugins = [];

    protected $defaultPlugins = [
        'checkUsername', 'exchangePassword'
    ];

    public function __construct()
    {
        $this->initPlugin($this->defaultPlugins);
    }

    public function initPlugin(array $plugins)
    {
        foreach ($plugins as $plugin) {

            $pluginObject = new $plugin;

            if ($pluginObject instanceof Plugin) {
                $this->plugins[] = $pluginObject;
            }

        }
    }

    public function runPlugin($username, $password)
    {
        foreach ($this->plugins as $plugin) {
            $returnData = $plugin->run($username, $password);
            if (!empty($returnData) && $returnData['status'] === false) {
                return $returnData;
            }
        }
        return true;
    }

    public function login($username, $password)
    {
        $returnData = $this->runPlugin($username, $password);
        if ($returnData !== true || $returnData['status'] === false) {
            echo $returnData['message'];
            die;
        }


        // 具体登陆代码。。在这里不写了
        echo 'start login';

    }


}

abstract class Plugin
{

    abstract public function run($username, $password);
}

class checkUsername extends Plugin
{

    protected $banUsername = ['习近平', '草你妈'];

    public function run($username, $password)
    {

        $return = [
            'status' => true,
            'message' => ''
        ];

        if (in_array($username, $this->banUsername)) {
            $return['status'] = false;
            $return['message'] = '用户名有非法字符';
        }

        return $return;

    }
}

class exchangePassword extends Plugin
{

    public function run($username, $password)
    {
        md5($password);
    }

}

class checkUsernameLength extends Plugin
{

    public function run($username, $password)
    {
        echo 'checkUsernameLength';
    }
}

// 抽象类
// 子类可以继承抽象类里的具体方法
// 抽象类可以强制要求子类 必须实现我抽象类里面的抽象方法
$wordpress = new WordPress();

$wordpress->initPlugin(['checkUsernameLength']);


$wordpress->login('1212', '567');
