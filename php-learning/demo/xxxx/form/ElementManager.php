<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-23
 * Time: 上午9:41
 */
class ElementManager
{

    protected $elementClass = [
        'text' => 'Element/Text',
        'password' => 'Element/Password',
        'email'=>'Element/Email'
    ];


    public function get($name , $autoload = false)
    {
        $className = ucfirst($name);
        if (!class_exists($className,$autoload)) {
            if (array_key_exists($name, $this->elementClass)) {
                $path = $this->elementClass[$name] . '.php';
                if (file_exists($path)) {
                    include $path;
                } else {
                    exit($path . '不存在');
                }
            } else {
                exit(__CLASS__ . '里不存在' . $name);
            }
        }

        return new $className;
    }
}