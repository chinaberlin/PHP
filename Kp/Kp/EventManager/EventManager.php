<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-5-30
 * Time: 下午1:35
 */

namespace Kp\EventManager;

use Kp\EventManager\Exception\InvalidArgumentException;
use Kp\EventManager\Exception\RuntimeException;
use Traversable;

class EventManager implements EventManagerInterface
{
    protected $events = [];
    protected $eventClass = 'Kp\EventManager\Event';

    public function attach($event, $callback, $priority = 1)
    {
        if ($event instanceof Traversable) {
            $event = iterator_to_array($event);
        }

        if (is_array($event)) {
            foreach ($event as $name) {
                $this->attach($name, $callback, $priority);
            }
            return;
        }

        if (!is_callable($callback)) {
            throw new InvalidArgumentException('$callback 必须是一个能被调用的函数');
        }

        if (!array_key_exists($event, $this->events)) {
            $this->events[$event] = new SplPriorityQueue();
        }

        $this->events[$event]->insert($callback, $priority);

        return $this;
    }

    public function trigger($event, $target = null, $args = null, $callback = null)
    {
        if ($event === '*') {
            $event = $this->getEvents();
        }

        if (is_array($event)) {
            foreach ($event as $name) {
                $this->trigger($name, $target, $args, $callback);
            }
            return;
        }

        /**
         * @var SplPriorityQueue $listeners
         */
        $listeners = clone $this->getListeners($event);

        $e = new $this->eventClass;

        if (!$e instanceof EventInterface) {
            throw new RuntimeException('$e 必须实现EventInterface接口');
        }

        $e->setName($event)->setTarget($target)->setParams($args);

        foreach ($listeners as $listener) {

            call_user_func($listener, $e);
        }
    }

    public function detach($event, $listener)
    {
    }

    public function getEvents()
    {
        return array_keys($this->events);
    }

    public function getListeners($event)
    {
        if (!array_key_exists($event, $this->events)) {
            $this->events[$event] = new SplPriorityQueue();
        }
        return $this->events[$event];
    }

    public function clearListeners($event)
    {
    }


    public function setEventClass($class)
    {
        $this->eventClass = $class;
        return;
    }
}