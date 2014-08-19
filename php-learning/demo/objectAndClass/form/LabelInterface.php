<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-23
 * Time: 上午9:32
 */
interface LabelInterface
{
    public function setLabelAttributes($attributes);

    public function getLabelAttributes();

    public function getLabel();

    public function setLabel($label);
}