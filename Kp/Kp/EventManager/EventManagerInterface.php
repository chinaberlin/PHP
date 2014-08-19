<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-30
 * Time: 下午1:21
 */
namespace Kp\EventManager;

/**
 * Interface EventManagerInterface
 * @package Kp\EventManager
 */
interface EventManagerInterface
{

    /**
     * 附加事件
     * @param Array|String|\Traversable $event
     * @param \Closure $callback
     * @param int $priority
     * @return mixed
     */
    public function attach($event, $callback, $priority = 1);

    /**
     * 触发事件
     * @param Array|String|\Traversable $event
     * @param Object $target
     * @param Array $args
     * @param null|\Closure $callback
     * @return ResponseCollection
     */
    public function trigger($event, $target = null , $args = null, $callback = null);

    /**
     * 根据事件名，移除某个事件监听
     * @param Array|String|\Traversable $event
     * @param \Closure $listener
     * @return mixed
     */
    public function detach($event, $listener);

    /**
     * 获取所有事件名
     * @return Array
     */
    public function getEvents();

    /**
     * 根据事件名获取所有附加的回调
     * @param String $event
     * @return \SplPriorityQueue
     */
    public function getListeners($event);

    /**
     * 根据事件名，移除所有的监听事件
     * @param String $event
     * @return mixed
     */
    public function clearListeners($event);

    /**
     * 设置event类
     * @param String $class
     * @return mixed
     */
    public function setEventClass($class);
}
