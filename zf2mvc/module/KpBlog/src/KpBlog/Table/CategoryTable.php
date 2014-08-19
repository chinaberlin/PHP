<?php

namespace KpBlog\Table;

use KpBlog\Entity\CategoryEntity;

use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\TableGateway\AbstractTableGateway;

use Zend\Stdlib\Hydrator\ClassMethods;

class CategoryTable extends AbstractTableGateway implements AdapterAwareInterface
{
    protected $table = 'kp_blog_category';

    public function setDbAdapter(Adapter $adapter)
    {
        $this->adapter = $adapter;

        $this->resultSetPrototype = new HydratingResultSet(new ClassMethods(), new CategoryEntity());

        $this->initialize();
    }


    public function getCategoryChildById($id = null)
    {
        return $this->select(function (Select $select) use ($id) {
            if ($id === null) {
                $select->order(['path' => 'asc']);
            }
        });

    }

    public function getCategorySelectOptions()
    {
        $categoryResultset = $this->getCategoryChildById();

        $options = [];

        foreach ($categoryResultset as $categoryEntity) {
            $options[$categoryEntity->getId()] = str_repeat('　',$categoryEntity->getDepth() - 1) . $categoryEntity->getName();
        }
        return $options;
    }
}