<?php

namespace KpBlog\Table;

use KpBlog\Entity\TagEntity;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Select;
use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Stdlib\Hydrator\ClassMethods;


class TagTable extends AbstractTableGateway implements AdapterAwareInterface
{
    /**
     * 数据表
     * @var string
     */
    protected $table = 'kp_blog_tag';

    /**
     * 设置数据库适配器
     * 对addtime进行了转换格式策略
     * @param Adapter $adapter
     */
    public function setDbAdapter(Adapter $adapter)
    {
        $this->adapter = $adapter;

        $hydrator = new ClassMethods();

        $this->resultSetPrototype = new HydratingResultSet($hydrator, new TagEntity());

        $this->initialize();
    }


    public function getTagByNameOrNames($nameOrNames)
    {

        if (!is_array($nameOrNames)) {
            $nameOrNames = [$nameOrNames];
        }

        return $this->select(function (Select $select) use ($nameOrNames) {
            $select->where(function (Where $where) use ($nameOrNames) {
                $where->in('name', $nameOrNames);
            });
        });
    }

    public function saveTag(TagEntity $tagEntity)
    {
        $id = (int)$tagEntity->getId();
        $saveData = $this->resultSetPrototype->getHydrator()->extract($tagEntity);
        unset($saveData['id']);
        if ($id) {

        } else {
            $this->insert($saveData);
            return $this->lastInsertValue;
        }

    }
}