<?php
namespace Admin\Controller;

class ClosureController extends AdminController
{
    public function index()
    {

        $model = D('Closure');


        //$treeData = $model->addNode(9,['id'=>5,'name'=>'extjs']);

        var_dump( $model->moveNode(9,6));

    }



}

