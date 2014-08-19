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

    /**
     * @param $id
     * @param $toId
     * 找到当前ID所有的父亲
    SELECT `p` FROM `kp-tree-closure-path` WHERE c = 9 and p != 9
    找到当前ID所有的儿子
    SELECT `c` FROM `kp-tree-closure-path` WHERE p = 9

    删除当前父亲和当前所有孩子的关联，保留当前节点和自身及当前节点和子元素的关联
    DELETE FROM `kp-tree-closure-path` WHERE `p` in(1) and `c` in(8,9,10,5)

    插入
    INSERT INTO  `kp-tree-closure-path` (p,c) SELECT p1.p,p2,c FROM `kp-tree-closure-path` as p1 CROSS JOIN `kp-tree-closure-path` as p2 where p1.c = 6 and p2.p = 9
     */
    public function moveNode($id, $toId)
    {

        $parentNodes = $this->query("SELECT `p` FROM `kp-tree-closure-path` WHERE c = {$id} and p != {$id}");
        $parentIds = [];
        foreach ($parentNodes as $node) {
            $parentIds[] = $node['p'];
        }
        $parentIds = implode(',', $parentIds);
        $childNodes = $this->query("SELECT `c` FROM `kp-tree-closure-path` WHERE p = {$id}");
        $childIds = [];
        foreach ($childNodes as $node) {
            $childIds[] = $node['c'];
        }
        $childIds = implode(',', $childIds);

        $this->query("DELETE FROM `kp-tree-closure-path` WHERE `p` in({$$parentIds}) and `c` in({$$childIds})");

        $this->query("INSERT INTO  `kp-tree-closure-path` (p,c) SELECT p1.p,p2,c FROM `kp-tree-closure-path` as p1 CROSS JOIN `kp-tree-closure-path` as p2 where p1.c = {$toId} and p2.p = {$id}");
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


        return $this->join('`kp-tree-closure-path` as path on path.p = `kp-tree-closure`.id')->where(['c' => $id])->order('depth asc')->select();


    }

    public function deleteNodeById($id)
    {
        $child = $this->table('kp-tree-closure-path')->field('c')->where(['p' => $id, 'c' => ['neq', $id]])->select();

        $ids = [];

        foreach ($child as $c) {
            $ids[] = $c['c'];
        }

        $this->where(['id' => ['in', implode(',', $ids)]])->save([
            'depth' => ['exp', '`depth` - 1']
        ]);

        $this->table('kp-tree-closure-path')->where(['p' => $id, 'c' => $id, '_logic' => 'OR'])->delete();
        $this->where(['id' => $id])->delete();
        echo $this->getLastSql();

    }

    public function deleteChildNodeById($id, $self = true)
    {
        $child = $this->table('kp-tree-closure-path')->field('c')->where(['p' => $id])->select();

        $ids = [];

        foreach ($child as $c) {
            $ids[] = $c['c'];
        }

        $ids = implode(',', $ids);

        $this->where(['id' => ['in', $ids]])->delete();

        $this->table('kp-tree-closure-path')->where(['p' => ['in', $ids], 'c' => ['in', $ids], '_logic' => 'OR'])->delete();

    }
}