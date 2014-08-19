<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-21
 * Time: 下午3:33
 */

function __autoload($className)
{

    include $className . '.php';
}

$form = new Form;

$form->setAttributes([

   'method'=>'post',
    'action'=>'xxxx.php'
]);

$form->addElement([
    'type' => 'text',
    'name' => 'username',
    'options' => [
        'label' => '用户名',
        'labelAttributes' => [
            'class' => 'xxx'
        ]
    ],
    'attributes' => [
        'class' => 'abc',
    ]
]);


$form->addElement([
    'type' => 'email',
    'name' => 'email',
    'attributes' => [
        'class' => 'abc',
    ]
]);

$form->bind([
    'username' => 'zhangsan',
    'email' => 'xxxx@qq.com'
]);


echo $form->openForm();

echo $form->render();

echo $form->closeForm();