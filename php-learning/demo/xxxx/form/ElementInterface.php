<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-23
 * Time: 上午9:28
 */
interface ElementInterface
{
    public function setName($name);

    public function getName();

    public function setType($type);

    public function getType();

    public function setValue($value);

    public function getValue();

    /**
     * @param $options
     * @return mixed
     */
    public function setOptions($options);

    /**
     * @param $attributes
     * @return mixed
     */
    public function setAttributes($attributes);

    /**
     * @param $attr
     * @param $val
     * @return mixed
     */
    public function setAttribute($attr, $val);

    /**
     * @return mixed
     */
    public function getAttributes();

    /**
     * @param $attr
     * @return mixed
     */
    public function getAttribute($attr);


}