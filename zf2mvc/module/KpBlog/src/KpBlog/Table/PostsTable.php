<?php

namespace KpBlog\Table;

use KpBlog\Entity\PostsEntity;
use KpORM\Db\KpORMTableGeteway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Delete;
use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Db\TableGateway\Feature\EventFeature;
use Zend\Db\TableGateway\Feature\FeatureSet;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManager;
use Zend\Filter\DateTimeFormatter;
use Zend\Paginator\Adapter\DbSelect;
use Zend\Paginator\Paginator;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Stdlib\Hydrator\Strategy\ClosureStrategy;

/**
 * Class PostsTable
 * @package KpBlog\Table
 */
class PostsTable extends KpORMTableGeteway
{
    /**
     * 数据表
     * @var string
     */
    protected $table = 'kp_blog_posts';

    protected $entity = 'KpBlog\Entity\PostsEntity';

    protected $mapping = [
        'category' => [
            'has_one',
            ''
        ]
    ];


    /**
     * 设置数据库适配器
     * 对addtime进行了转换格式策略
     * @param Adapter $adapter
     */
    public function setDbAdapter(Adapter $adapter)
    {
        $this->adapter = $adapter;

        $hydrator = new ClassMethods();

        $hydrator->addStrategy('addtime', new ClosureStrategy(null, function ($val) {
            $datetimeFormatter = new DateTimeFormatter(['format' => 'Y-m-d H:i:s']);
            return $datetimeFormatter->filter((int)$val);
        }));

        $this->resultSetPrototype = new HydratingResultSet($hydrator, new PostsEntity());

        $this->initialize();
        $this->init();
    }

    public function fetchAll()
    {
        return $this->select();
    }

    public function category_id()
    {
        return $this->hasOne('KpBlog\Table\Category','id','category_id');
    }




















//    /**
//     * 根据id删除posts
//     * @param int|array $idOrIds
//     * @return int
//     */
//    public function deletePostsByIdOrIds($idOrIds)
//    {
//        if (!is_array($idOrIds)) {
//            $idOrIds = [$idOrIds];
//        }
//
//        return $this->delete(function (Delete $delete) use ($idOrIds) {
//            $delete->where(function (Where $where) use ($idOrIds) {
//                $where->in('id', $idOrIds);
//            });
//        });
//    }
//
//
//    /**
//     * 保存posts
//     * @param PostsEntity $postsEntity
//     * @return int
//     */
//    public function savePosts(PostsEntity $postsEntity)
//    {
//
//        $id = (int)$postsEntity->getId();
//
//        $saveData = $this->resultSetPrototype->getHydrator()->extract($postsEntity);
//
//        unset($saveData['id']);
//
//        if ($id) {
//            return $this->update($saveData, ['id' => $id]);
//        } else {
//            $this->insert($saveData);
//            return $this->lastInsertValue;
//        }
//
//    }
//
//    /**
//     * 根据id获取posts
//     * @param $id
//     * @return array|\ArrayObject|null
//     */
//    public function getPostsById($id)
//    {
//        return $this->select(['id' => $id])->current();
//    }
//
//    /**
//     * 获取分页数据
//     * @return Paginator
//     */
//    public function fetchPaginator()
//    {
//        $select = $this->sql->select();
//
//        $dbAdapter = new DbSelect($select, $this->adapter, $this->resultSetPrototype);
//
//        return new Paginator($dbAdapter);
//    }
}