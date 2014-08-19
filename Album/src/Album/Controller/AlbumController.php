<?php
/**
 * Created by PhpStorm.
 * User: onlyit
 * Date: 14-6-4
 * Time: 下午2:16
 */

namespace Album\Controller;

use Album\Form\AlbumForm;

use Zend\Mvc\Controller\AbstractActionController;

class AlbumController extends AbstractActionController
{
    public function indexAction()
    {
        $albumTable = $this->getServiceLocator()->get('AlbumTable');

        $albumResultset = $albumTable->getAll();


        return [
            'albumResultset' => $albumResultset
        ];

    }

    public function deleteAction()
    {

        $id = $this->params('id');

        if ($id === null) {
            return $this->redirect()->toRoute('album');
        }

        $albumTable = $this->getServiceLocator()->get('AlbumTable');

        $albumTable->deleteById($id);

        return $this->redirect()->toRoute('album');

    }



    // $albumModel = new Album();
    // $albumModel->exchangeArray($postParameters);
    // $albumTable = $this->getServiceLocator()->get('AlbumTable');
    // $albumTable->saveAlbum($albumModel);
    // $this->redirect()->toRoute('album');
    public function addAction()
    {
        $albumForm = new AlbumForm();

        /* @var \Zend\Http\PhpEnvironment\Request $request */
        $request = $this->getRequest();

        # 判断下是否是POST
        if ($request->isPost()) {

            $postParameters = $request->getPost();

            $albumForm->setData($postParameters);

            if ($albumForm->isValid()) {
                $albumTable = $this->getServiceLocator()->get('AlbumTable');
                $albumTable->saveAlbum($albumForm->getData());
                $this->redirect()->toRoute('album');
            }
        }

        return [
            'albumForm' => $albumForm
        ];
    }

    public function editAction()
    {

        $albumForm = new AlbumForm();

        $id = $this->params('id');

        if ($id === null) {
            $this->redirect()->toRoute('album');
        }

        $albumTable = $this->getServiceLocator()->get('AlbumTable');
        $album = $albumTable->getOneById($id);

        $albumForm->bind($album);

        $request = $this->getRequest();

        if ($request->isPost()) {

            $postParameters = $request->getPost();

            $albumForm->setData($postParameters);

            if ($albumForm->isValid()) {

                $albumTable->saveAlbum($albumForm->getData());

                $this->redirect()->toRoute('album');
            }
        }


        return [
            'albumForm' => $albumForm
        ];


    }
}