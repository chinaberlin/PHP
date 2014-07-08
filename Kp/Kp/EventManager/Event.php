<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-30
 * Time: 下午3:23
 */

namespace Kp\EventManager;

class Event implements EventInterface
{
    protected $name;
    protected $target;
    protected $params = [];
    protected $stopPropagation = false;

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setTarget($target)
    {
        $this->target = $target;
        return $this;
    }


    public function getTarget()
    {
        return $this->target;
    }

    public function setParam($key, $value)
    {
        $this->params[$key] = $value;
        return $this;
    }

    public function getParam($key, $defult = null)
    {
        if (array_key_exists($key, $this->params)) {
            return $this->params[$key];
        }
        return $defult;
    }


    public function setParams($params)
    {
        $this->params = $params;
        return $this;
    }

    public function getParams()
    {
        return $this->params;
    }


    public function stopPropagation($flag = true)
    {
        $this->stopPropagation = $flag;
        return $this;
    }

    public function propagationIsStopped()
    {
        return $this->stopPropagation;
    }
}