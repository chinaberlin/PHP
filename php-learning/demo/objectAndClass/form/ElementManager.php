<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-23
 * Time: 上午9:41
 */
<<<<<<< HEAD
=======

/**
 * 通过短的文字，例如text，找到相对应的对象，例如Text.php
 * Class ElementManager
 */
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
class ElementManager
{

    protected $elementClass = [
        'text' => 'Element/Text',
        'password' => 'Element/Password',
        'email'=>'Element/Email'
    ];

<<<<<<< HEAD

=======
>>>>>>> 553b918ce08d125f4aba6e50ae3722c81771358b
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