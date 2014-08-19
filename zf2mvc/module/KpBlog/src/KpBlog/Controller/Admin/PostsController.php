<?php

namespace KpBlog\Controller\Admin;

use KpBlog\Event\PostsEvent;
use KpBlog\Model\PostsModel;
use Zend\Filter\Callback;
use Zend\Mvc\Controller\AbstractActionController;

class PostsController extends AbstractActionController
{
    public function deleteAction()
    {
        $id = $this->params('id');

        if (!$id) {
            $id = $this->params()->fromQuery('id');
            if ($id) {
                $id = explode(',', $id);
            }
        }

        if ($id) {
            $postsTable = $this->getServiceLocator()->get('KpBlog\Table\Posts');
            $postsEvent = $this->getServiceLocator()->get('KpBlog\Event\Posts');
            $postsEvent->setDeleteIdOrIds($id);
            $this->getEventManager()->trigger(PostsEvent::ADMIN_POSTS_DELTE_PRE, $postsEvent);
            $postsTable->deletePostsByIdOrIds($id);
            $this->getEventManager()->trigger(PostsEvent::ADMIN_POSTS_DELTE_POST, $postsEvent);
        }

        return $this->redirect()->toRoute('kp-blog-admin', ['controller' => 'posts', 'action' => 'index']);
    }

    public function editAction()
    {
        $id = $this->params('id');

        $postsTable = $this->getServiceLocator()->get('KpBlog\Table\Posts');
        $postsEntity = $postsTable->getPostsById($id);
        $form = $this->getServiceLocator()->get('formElementManager')->get('KpBlog\Form\PostsEdit');

        $form->bind($postsEntity);
        $request = $this->getRequest();

        if ($request->isPost()) {

            $postParameters = $request->getPost();
            $form->setData($postParameters);

            if ($form->isValid()) {

                $postsEntity = $form->getData();

                $postsTable->savePosts($postsEntity);

                return $this->redirect()->toRoute('kp-blog-admin', ['controller' => 'posts', 'action' => 'index']);
            }
        }

        return [
            'form' => $form
        ];
    }

    public function addAction()
    {
        $postsEvent = $this->getServiceLocator()->get('KpBlog\Event\Posts');

        $form = $this->getServiceLocator()->get('formElementManager')->get('KpBlog\Form\PostsAdd');
        $request = $this->getRequest();
        $postsTable = $this->getServiceLocator()->get('KpBlog\Table\Posts');

        if ($request->isPost()) {

            $postParameters = $request->getPost();

            $form->setData($postParameters);

            if ($form->isValid()) {

                $postsEntity = $form->getData();
                $postsEvent->setPostsEntity($postsEntity);
                $this->getEventManager()->trigger(PostsEvent::ADMIN_POSTS_ADD_PRE, $postsEvent);
                $postsEntity->setId($postsTable->savePosts($postsEntity));
                $this->getEventManager()->trigger(PostsEvent::ADMIN_POSTS_ADD_POST, $postsEvent);

                return $this->redirect()->toRoute('kp-blog-admin', ['controller' => 'posts', 'action' => 'index']);
            }
        }

        $postsEvent->setForm($form);

        $this->getEventManager()->trigger(PostsEvent::ADMIN_POSTS_ADD_SHOW, $postsEvent);

        return [
            'form' => $form
        ];
    }


    public function indexAction()
    {
        $postsTable = $this->getServiceLocator()->get('KpBlog\Table\Posts');

        foreach($postsTable->fetchAll() as $entity){
            var_dump($entity);
        }


    exit;
//        $page = $this->params()->fromQuery('page', 1);
//
//        /* @var $postsPaginator \Zend\Paginator\Paginator */
//        $postsPaginator = $postsTable->fetchPaginator();
//        $postsPaginator->setCurrentPageNumber($page);
//
//        $postsPaginator->setFilter(new Callback(function ($hydratingResultSet) {
//            foreach ($hydratingResultSet->buffer() as $postsEntity) {
//                $postsEntity->setStatus(PostsModel::getStatus($postsEntity->getStatus()));
//                $postsEntity->setType(PostsModel::getType($postsEntity->getType()));
//            }
//            return $hydratingResultSet;
//        }));


        return [
            'postsPaginator' => $postsPaginator
        ];
    }
}