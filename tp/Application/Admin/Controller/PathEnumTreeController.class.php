<?php
namespace Admin\Controller;

class PathEnumTreeController extends AdminController
{
    public function index()
    {

        $model = D('PathEnum');

        $model->deleteNodeById(21);


        $treeData = $model->getParentNode(7);

        $this->assign('treeData', $treeData);
        $this->display();

    }

    public function edit($id)
    {

        $model = D('PathEnum');
        $treeData = $model->getChildNodeById(1);

        $node = $model->where(['id' => $id])->find();

        if (IS_POST) {

            $toId = I('post.toId');
            $id = I('post.id');


            $model->moveNode($id, $toId);

            return $this->success('add success', U('index'));
        }

        $paths = explode('/', rtrim($node['path'], '/'));

        $pathsCount = count($paths);
        if ($pathsCount < 2) {
            $parentId = null;
        } else {
            $parentId = $paths[$pathsCount - 2];
        }

        $this->assign('treeData', $treeData);
        $this->assign('nodeInfo', $node);
        $this->assign('parentId', $parentId);
        $this->display();


    }

    public function add()
    {

        $model = D('PathEnum');
        $treeData = $model->getChildNodeById(1);

        if (IS_POST) {

            $toId = I('post.toId');
            $name = I('post.name');

            if ($toId) {
                $model->addNode($toId, ['name' => $name]);
                return $this->success('add success', U('index'));
            } else {
                return $this->error('add error', U('index'));
            }


        }

        $this->assign('treeData', $treeData);
        $this->display();

    }

}

