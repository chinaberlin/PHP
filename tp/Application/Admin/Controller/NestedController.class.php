<?php
namespace Admin\Controller;

class NestedController extends AdminController
{
    public function index()
    {

        $model = D('Nested');
        //$treeData = $model->addNode(2, ['name' => 'tp']);

        $model->moveNode(2, 4);

        var_dump($model->getChildNodeById(1));

    }


}

