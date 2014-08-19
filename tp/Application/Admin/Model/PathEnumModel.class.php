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

class PathEnumModel extends Model
{
    protected $tableName = 'kp-tree-path-enum';

    public function getChildNodeById($id, $depth = null)
    {
        $node = $this->where(['id' => $id])->find();

        $where = [
            'path' => ['like', $node['path'] . '%']
        ];

        if ($depth !== null) {
            $where['depth'] = array('elt', $node['depth'] + $depth);
        }

        return $this->where($where)->order('path asc')
            ->select();
    }

    public function moveNode($id, $toId)
    {
        $node = $this->where(['id' => $id])->find();
        $toNode = $this->where(['id' => $toId])->find();

        $replacePath = str_replace($node['id'] . '/', '', $node['path']);

        $this->where(['path' => ['like', $node['path'] . '%']])->save([
            'path' => ['exp', 'replace(`path`,"' . $replacePath . '","' . $toNode['path'] . '")'],
            'depth' => ['exp', '`depth` + ' . ($toNode['depth'] - $node['depth'] + 1)]
        ]);

        //
        echo $this->getLastSql();
        exit;

    }

    public function addNode($toId, $nodeInfo)
    {

        $lastId = $this->add($nodeInfo);

        $toNode = $this->where(['id' => $toId])->find();

        return $this->where(['id' => $lastId])->save(['path' => $toNode['path'] . $lastId . '/', 'depth' => $toNode['depth'] + 1]);

    }

    public function getParentNode($id)
    {

        $node = $this->where(['id' => $id])->find();

        $in = str_replace('/', ',', $node['path']);

        return $this->where(['id' => ['in', $in]])->order('path asc')->select();


    }

    public function deleteNodeById($id)
    {
        $node = $this->where(['id' => $id])->find();

        $this->where(['id' => $node['id']])->delete();

        $this->where([
            'path' => ['like', '%' . '/' . $node['id'] . '/' . '%']
        ])->save([
                'path' => ['exp', 'replace(`path`,"' . '/' . $node['id'] . '/' . '","/")'],
                'depth' => ['exp', '`depth` - 1']
            ]);

        echo $this->getLastSql();

    }

    public function deleteChildNodeById($id, $self = true)
    {
        $node = $this->where(['id' => $id])->find();

        $where = [
            'path' => ['like', $node['path'] . '% ']
        ];

        if (!$self) {
            $where['id'] = ['neq', $id];
        }
        return $this->where($where)->delete();
    }
}