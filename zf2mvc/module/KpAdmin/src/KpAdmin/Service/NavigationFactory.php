<?php


namespace KpAdmin\Service;

use Zend\Navigation\Service\AbstractNavigationFactory;

class NavigationFactory extends AbstractNavigationFactory
{
    protected function getName()
    {
        return 'kp-admin';
    }
}
