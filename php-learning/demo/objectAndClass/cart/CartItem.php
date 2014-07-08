<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-21
 * Time: 上午9:21
 */
class CartItem
{

    /**
     * 产品
     * @var Product $product ;
     */
    private $product;

    /**
     * 购买数量
     * @var Int $count ;
     */
    private $count;

    /**
     * 计算购物项的总价
     * @return Int
     */
    public function getTotalPrice(){
        return $this->product->getPrice() * $this->count;
    }
    /**
     * @param Int $count
     * @return \CartItem
     */
    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }

    /**
     * @return Int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param \Product $product
     * @return \CartItem
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;
        return $this;
    }

    /**
     * @return \Product
     */
    public function getProduct()
    {
        return $this->product;
    }


}