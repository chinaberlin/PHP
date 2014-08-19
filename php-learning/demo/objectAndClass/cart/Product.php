<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-21
 * Time: 上午9:20
 */
class Product
{
    /**
     * 编号
     * @var Int $id
     */
    private $id;

    /**
     * 名字
     * @var String $name
     */
    private $name;

    /**
     * 价钱
     * @var Int $price
     */
    private $price;

    /**
     * @param Int $id
     * @return \Product
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Int $price
     * @return \Product
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return Int
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param String $name
     * @return \Product
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return String
     */
    public function getName()
    {
        return $this->name;
    }


}