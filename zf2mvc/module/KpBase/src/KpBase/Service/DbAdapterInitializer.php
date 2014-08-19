<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-6-9
 * Time: 下午2:23
 */

namespace KpBase\Service;

use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DbAdapterInitializer implements InitializerInterface
{

    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof AdapterAwareInterface) {
            $instance->setDbAdapter($serviceLocator->get('dbAdapter'));
        }
    }
}