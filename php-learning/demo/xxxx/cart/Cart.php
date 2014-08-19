<?php

/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-21
 * Time: 上午9:20
 */
class Cart
{
    /**
     * @var array
     */
    private $cartItems = [];


    /**
     * 添加一个CartItems
     * @param CartItem $cartItem
     */
    public function addCartItem(CartItem $cartItem)
    {
        $productId = $cartItem->getProduct()->getId();
        $hasCartItem = $this->getCartItem($productId);

        if ($hasCartItem === -1) {
            $this->cartItems[] = $cartItem;
        } else {
            $hasCartItem->setCount($hasCartItem->getCount() + $cartItem->getCount());
        }


        return $this;
    }

    /**
     * 添加一组CartItems
     * @param array $cartItems
     * @return $this
     */
    public function addCartItems(array $cartItems)
    {
        foreach ($cartItems as $cartItem) {
            $this->addCartItem($cartItem);
        }
        return $this;
    }


    /**
     * 调试
     */
    public function show()
    {
        foreach ($this->cartItems as $cartItem) {
            echo '<pre>';
            var_dump($cartItem->getCount());
            var_dump($cartItem->getProduct());
            echo '</pre>';
        }
    }

    /**
     * 清空购物车
     * @return $this
     */
    public function clearCartItem()
    {
        $this->cartItems = [];
        return $this;
    }

    /**
     * 根据CartItems移除多个CartItem
     * @param $this
     */
    public function removeCartItemByCartItems(array $cartItems)
    {
        foreach ($cartItems as $cartItem) {
            $productId = $cartItem->getProduct()->getId();

            $this->removeCartItemByProductId($productId);
        }

        return $this;
    }

    /**
     * 根据CartItem移除某个CartItem
     * @param $this
     */
    public function removeCartItemByCartItem(CartItem $cartItem)
    {
        $productId = $cartItem->getProduct()->getId();

        $this->removeCartItemByProductId($productId);
        return $this;
    }

    /**
     * 根据产品id移除某个cartItem
     * @param $id
     * @return $this
     */
    public function removeCartItemByProductId($productId)
    {
        $n = 0;
        foreach ($this->cartItems as $cartItem) {
            if ($cartItem->getProduct()->getId() === $productId) {
                unset($this->cartItems[$n]);
                break;
            }
            $n++;
        }

        return $this;
    }

    /**
     * 计算购物车总价
     */
    public function getTotalPrice()
    {

        $totalPrice = 0;

        foreach ($this->cartItems as $cartItems) {
            $totalPrice += $cartItems->getTotalPrice();
        }

        return $totalPrice;

    }

    /**
     * 计算购物车总购买数量
     */
    public function getTotalCount()
    {
        $totalCount = 0;

        foreach ($this->cartItems as $cartItems) {
            $totalCount += $cartItems->getCount();
        }

        return $totalCount;
    }

    /**
     * 根据id减少某个产品的数量
     * @param $id
     * @param $num
     */
    public function reduceProduct($productId, $num)
    {
        $cartItem = $this->getCartItem($productId);

        if ($cartItem !== -1) {

            $count = $cartItem->getCount() - $num;

            if ($count <= 0) {
                $this->removeCartItemByProductId($productId);
            } else {
                $cartItem->setCount($count);
            }
        }

        return $this;
    }

    /**
     * 根据id增加某个产品的数量
     * @param $productId
     * @param $num
     */
    public function addProduct($productId, $num)
    {
        $cartItem = $this->getCartItem($productId);

        if ($cartItem !== -1) {

            $count = $cartItem->getCount() + $num;

            $cartItem->setCount($count);

        }
        return $this;
    }

    /**
     * 根据产品id获取cartItem
     * @param Int $productId
     * @return Int | \CartItem
     */
    public function getCartItem($productId)
    {
        foreach ($this->cartItems as $cartItem) {
            if ($cartItem->getProduct()->getId() === $productId) {
                return $cartItem;
            }
        }
        return -1;
    }

} 