<?php

namespace KpBlog\Table;

use KpBlog\Entity\PostsTagEntity;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Adapter\AdapterAwareInterface;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Db\Sql\Delete;
use Zend\Db\Sql\Where;
use Zend\Db\TableGateway\AbstractTableGateway;
use Zend\Stdlib\Hydrator\ClassMethods;


class PostsTagTable extends AbstractTableGateway implements AdapterAwareInterface
{
    /**
     * 数据表
     * @var string
     */
    protected $table = 'kp_blog_posts_tag';

    /**
     * 设置数据库适配器
     * @param Adapter $adapter
     */
    public function setDbAdapter(Adapter $adapter)
    {
        $this->adapter = $adapter;

        $hydrator = new ClassMethods();

        $this->resultSetPrototype = new HydratingResultSet($hydrator, new PostsTagEntity());

        $this->initialize();
    }

    public function deletePostsTagByPostId($idOrIds)
    {
        return $this->delete(function (Delete $delete) use ($idOrIds) {
            $delete->where(function (Where $where) use ($idOrIds) {
                $where->in('posts_id', $idOrIds);
            });
        });
    }

    public function savePostsTag(PostsTagEntity $postsTagEntity)
    {
        $saveData = $this->resultSetPrototype->getHydrator()->extract($postsTagEntity);
        return $this->insert($saveData);
    }
}