<?php

namespace KpBlog\Event;

use KpBlog\Entity\PostsEntity;
use Zend\EventManager\Event;
use Zend\Form\FormInterface;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;

class PostsEvent extends Event implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    const ADMIN_POSTS_ADD_SHOW = 'admin.add.show';
    const ADMIN_POSTS_ADD_PRE = 'admin.add.pre';
    const ADMIN_POSTS_ADD_POST = 'admin.add.post';

    const ADMIN_POSTS_EDIT_SHOW = 'admin.edit.show';
    const ADMIN_POSTS_EDIT_PRE = 'admin.edit.pre';
    const ADMIN_POSTS_EDIT_POST = 'admin.edit.post';

    const ADMIN_POSTS_DELTE_PRE = 'admin.delete.pre';
    const ADMIN_POSTS_DELTE_POST = 'admin.delete.post';

    public function setDeleteIdOrIds($idOrIds)
    {
        $this->setParam('idOrIds', $idOrIds);
        return $this;
    }

    public function getDeleteIdOrIds()
    {
        return $this->getParam('idOrIds');
    }

    public function setForm(FormInterface $form)
    {
        $this->setParam('form', $form);
        return $this;
    }

    public function getForm()
    {
        return $this->getParam('form');
    }

    public function setPostsEntity(PostsEntity $postsEntity)
    {
        $this->setParam('postsEntity', $postsEntity);
        return $this;
    }

    public function getPostsEntity()
    {
        return $this->getParam('postsEntity');
    }

}
