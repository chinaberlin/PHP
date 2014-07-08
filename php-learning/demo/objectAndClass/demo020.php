<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-23
 * Time: 下午3:16
 */
class Form
{

    public function render()
    {
        return '<form><input type="text"></form>';
    }

    public function __toString()
    {
        return $this->render();
    }
}

$f = new Form();

echo $f;