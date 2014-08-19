<?php
/**
 * Kittencup Module
 *
 * @date 14-7-21 上午10:50
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

namespace KpORM\Db;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\Feature\EventFeature;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManager;
use Zend\Server\Reflection\ReflectionClass;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use stdClass;

class KpORMTableGeteway extends AbstractTableGateway implements AdapterAwareInterface, ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    protected $entity;

    public function setEntity($entity)
    {
        $this->entity = $entity;
        return $this;
    }

    public function init()
    {
        $eventManager = new EventManager();
        $eventManager->attach(['postSelect'], function (EventInterface $event) {
            /** @var $event  \Zend\Db\TableGateway\Feature\EventFeature\TableGatewayEvent */
            $resultSet = $event->getParam('result_set');
            /** @var $resultSet \Zend\Db\ResultSet\HydratingResultSet */
            $entity = $this->entity;
            $reflClass = new \ReflectionClass($entity);
            foreach ($reflClass->getProperties() as $reflectionProperty) {
                $name = $reflectionProperty->name;
                if (method_exists($this, $name)) {

                    $relationData = call_user_func([$this, $name]);

                    $funName = 'get'.str_replace(' ', '', ucwords(str_replace('_', ' ', $name)));
                    $relationLocalKeyCollection = [];
                    foreach ($resultSet->buffer() as $entity) {
                        $relationLocalKeyCollection[] = $entity->$funName();
                    }
                    $relationLocalKeyCollection = array_unique($relationLocalKeyCollection);
                    $foreignKey = $relationData->foreignKey;
                    $table = $relationData->table;
                    $relation = $table->select(function(Select $select) use ($foreignKey,$relationLocalKeyCollection){
                        $select->where(function(Where $where) use ($foreignKey,$relationLocalKeyCollection){
                            $where->in($foreignKey,$relationLocalKeyCollection);
                        });
                    });

                    var_dump(iterator_to_array($relation));exit;
                }
            }
        });

        $this->featureSet->addFeature(new EventFeature($eventManager));
    }

    public function setDbAdapter(Adapter $adapter)
    {

    }

    public function hasOne($serviceName, $foreignKey = 'id')
    {
        $table = $this->serviceLocator->get($serviceName);
        $relationData = new stdClass();
        $relationData->table = $table;
        $relationData->foreignKey = $foreignKey;
        return $relationData;
    }
}