<?php

/**
 * Kittencup Module
 *
 * @date 14-6-30 下午1:04
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */

namespace Admin\Model;

use Think\Model;

class ClosureModel extends Model
{
    protected $tableName = 'kp-tree-closure';

    public function getChildNodeById($id, $depth = null)
    {

        return $this->query("SELECT *,GROUP_CONCAT(t3.p order by t4.depth asc separator ' / ') as path FROM `kp-tree-closure` as t1
        join `kp-tree-closure-path` as t2 on t1.id = t2.c
        join `kp-tree-closure-path` as t3 on t3.c = t2.c
        join `kp-tree-closure` as t4 on t4.id = t3.p
        where t2.p = 1
        group by t1.id order by path");

    }

    public function moveNode($id, $toId)
    {


    }

    public function addNode($toId, $nodeInfo)
    {
        $toNode = $this->where(['id' => $toId])->find();

        $nodeInfo['depth'] = $toNode['depth'] + 1;

        $insertId = $this->add($nodeInfo);


        //$select = $this->table('kp-tree-closure-path')->field(['p',$insertId])->union("select {$insertId},{$insertId}",true)->select(false);


        $this->query("INSERT INTO `kp-tree-closure-path`(`p`, `c`) SELECT p,{$insertId} as c FROM `kp-tree-closure-path` WHERE c = {$toNode['id']} UNION ALL SELECT {$insertId},{$insertId}");

        echo $this->getLastSql();

    }

    public function getParentNode($id)
    {
        // SELECT * FROM `kp-tree-closure` as t1 join `kp-tree-closure-path` as t2 on t1.id = t2.c where t2.p = 1
        $node = $this->where(['id' => $id])->find();


    }

    public function deleteNodeById($id)
    {

    }

    public function deleteChildNodeById($id, $self = true)
    {
    }
}