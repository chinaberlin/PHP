<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-30
 * Time: 下午3:23
 */
namespace Kp\EventManager;

/**
 * Interface EventInterface
 * @package Kp\EventManager
 */
interface EventInterface
{
    /**
     * 设置事件名
     * @param $name
     * @return $this
     */
    public function setName($name);

    /**
     * 获取事件名
     * @return mixed
     */
    public function getName();

    /**
     * 设置目标上下文
     * @param $target
     * @return $this
     */
    public function setTarget($target);

    /**
     * 获取目标上下文
     * @return Object
     */
    public function getTarget();

    /**
     * 设置单个参数
     * @param $key
     * @param $value
     * @return $this
     */
    public function setParam($key,$value);

    /**
     * 获取单个参数
     * @param $key
     * @param null $defult
     * @return mixed
     */
    public function getParam($key, $defult = null);

    /**
     * 设置所有参数
     * @param $params
     * @return $this
     */
    public function setParams($params);

    /**
     * 获取所有参数
     * @return Array
     */
    public function getParams();

    /**
     * @param bool $flag
     * @return $this
     */
    public function stopPropagation($flag = true);

    /**
     * 判断是否阻止冒泡
     * @return Boolean
     */
    public function propagationIsStopped();


}

