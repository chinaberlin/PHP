<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-19
 * Time: 下午2:14
 */
class Student
{

    public $name;
    public $age;

    public function __construct($options)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        } else {
            if (func_num_args() === 2) {
                list($this->name, $this->age) = func_get_args();
            }
        }
    }

    public function setOptions($options)
    {

        $vars = get_object_vars($this);

        foreach ($options as $key => $val) {
            if (array_key_exists($key, $vars)) {
                $this->$key = $val;
            }
        }
    }
}

$s1 = new Student('zhansan', 40);

var_dump($s1);

$s2 = new Student([
    'name' => 'lisi',
    'age' => 20,
]);

var_dump($s2);