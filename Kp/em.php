<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-30
 * Time: 下午1:39
 */


include 'init_autoloader.php';

class Test
{

    public function run()
    {

        echo __CLASS__ . __FUNCTION__ . '<br>';
    }
}


$em = new \Kp\EventManager\EventManager();

$em->attach('run', array(new Test(), 'run'));

$em->attach('click', function (\Kp\EventManager\EventInterface $e) {
    $target = $e->getTarget();

    if ($target instanceof Test) {
        $target->run();
    }

});

$em->attach('click', function () {
    echo 'click_2', '<Br>';
});
$em->attach('click', function () {
    echo 'click_3', '<Br>';
});

$em->attach(['click', 'mouseover'], function () {
    echo 'click_moseover', '<Br>';
});

$em->trigger('click', new Test);

$em->trigger('*');
