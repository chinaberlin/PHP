<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-21
 * Time: 上午9:28
 */

include 'Cart.php';
include 'CartItem.php';
include 'Product.php';

$p1 = new Product();

$p1->setId(1000)->setName('iphone')->setPrice(5000);

$p2 = new Product();

$p2->setId(1001)->setName('ipad')->setPrice(3000);

$c1 = new CartItem();

$c1->setCount(10)->setProduct($p1);

$c2 = new CartItem();

$c2->setCount(20)->setProduct($p2);

$cart = new Cart;

$cart->addCartItems([$c1, $c2]);

//$cart->removeCartItemByCartItems([$c1]);

echo $cart->getTotalPrice(), '<br>';
echo $cart->getTotalCount(), '<br>';

$cart->reduceProduct(1000, 50);
$cart->addProduct(1001, 50);

$cart->show();
