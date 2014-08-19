<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-23
 * Time: 上午9:14
 */
class Text extends Element
{
    protected $type = 'text';
    protected $tempalte = '<input type="%s" %s />';

    public function render()
    {
        return sprintf($this->tempalte, $this->getType(), $this->exchangeAttributes());
    }
}