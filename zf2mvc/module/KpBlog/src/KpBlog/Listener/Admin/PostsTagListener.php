<?php

namespace KpBlog\Listener\Admin;

use KpBlog\Event\PostsEvent;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\ListenerAggregateInterface;
use KpBlog\Entity\PostsTagEntity;
use KpBlog\Entity\TagEntity;

class PostsTagListener implements ListenerAggregateInterface
{
    protected $listeners = [];

    public function attach(EventManagerInterface $events)
    {
        $events->getSharedManager()->attach('KpBlog', PostsEvent::ADMIN_POSTS_ADD_SHOW, [$this, 'addTagElement']);
        $events->getSharedManager()->attach('KpBlog', PostsEvent::ADMIN_POSTS_ADD_POST, [$this, 'addPostsTag']);
        $events->getSharedManager()->attach('KpBlog', PostsEvent::ADMIN_POSTS_DELTE_POST, [$this, 'deletePostsTag']);
    }

    public function detach(EventManagerInterface $events)
    {
        foreach ($this->listeners as $index => $listener) {
            if ($events->detach($listener)) {
                unset($this->listeners[$index]);
            }
        }
    }

    public function deletePostsTag(EventInterface $e)
    {
        $idOrIds = $e->getDeleteIdOrIds();
        $serviceLocator = $e->getServiceLocator();
        $postsTagTable = $serviceLocator->get('KpBlog\Table\PostsTag');
        $postsTagTable->deletePostsTagByPostId($idOrIds);
    }

    public function addTagElement(EventInterface $e)
    {

        $form = $e->getForm();

        $form->add([
            'name' => 'tag',
            'type' => 'Text',
            'options' => [
                'label' => 'tag',
            ],
        ]);

        $form->setPriority('submit', -1000);
    }

    public function addPostsTag(EventInterface $e)
    {
        $postsEntity = $e->getPostsEntity();
        $serviceLocator = $e->getServiceLocator();

        $request = $serviceLocator->get('Request');
        $tag = explode(',', $request->getPost('tag'));

        $tagTable = $serviceLocator->get('KpBlog\Table\Tag');
        $postsTagTable = $serviceLocator->get('KpBlog\Table\PostsTag');

        $tagResultSet = $tagTable->getTagByNameOrNames($tag);

        $hasTagId = [];
        $hasTag = [];

        foreach ($tagResultSet as $tagEntity) {
            $hasTagId[] = $tagEntity->getId();
            $hasTag[] = $tagEntity->getName();
        }

        $hasNotTag = array_diff($tag, $hasTag);

        $tagEntityPrototype = new TagEntity();
        foreach ($hasNotTag as $name) {
            $tagEntityClone = clone $tagEntityPrototype;
            $tagEntityClone->setName($name);
            $hasTagId[] = $tagTable->saveTag($tagEntityClone);
        }

        $postsTagEntityPrototype = new PostsTagEntity();
        $postsTagEntityPrototype->setPostsId($postsEntity->getId());
        foreach ($hasTagId as $tagId) {
            $postsTagEntityClone = clone $postsTagEntityPrototype;
            $postsTagEntityClone->setTagId($tagId);
            $postsTagTable->savePostsTag($postsTagEntityClone);
        }
    }

}

