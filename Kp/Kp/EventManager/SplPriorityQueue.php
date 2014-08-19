<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-30
 * Time: 下午2:39
 */
namespace Kp\EventManager;

class SplPriorityQueue extends \SplPriorityQueue
{
    protected $serial = PHP_INT_MAX;

    public function insert($value, $priority)
    {
        if (!is_array($priority)) {
            $priority = array(1, $this->serial--);
        }
        parent::insert($value, $priority);
    }
}