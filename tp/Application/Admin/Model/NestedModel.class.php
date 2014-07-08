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

class NestedModel extends Model
{
    protected $tableName = 'kp-tree-nested';

    public function getChildNodeById($id, $depth = null)
    {
        $node = $this->where(['id' => $id])->find();

        $where = [
            'l' => ['egt', $node['l']],
            'r' => ['elt', $node['r']],
        ];

        if ($depth) {
            $where['depth'] = ['elt', $node['depth'] + $depth];
        }

        return $this->where($where)->order('l asc')->select();
    }

    public function moveNode($id, $toId)
    {


        $formNode = $this->where(['id' => $id])->find();
        $toNode = $this->where(['id' => $toId])->find();

        $val = $formNode['r'] - $formNode['l'];

        $modifyDepth = $toNode['depth'] - $formNode['depth'] + 1;


        // 查询出所有的孩子
        $childNodes = $this->getChildNodeById($id);

        $ids = [];
        foreach ($childNodes as $childNode) {
            $ids[] = $childNode['id'];
        }

        if ($toNode['r'] > $formNode['r']) {

            $this->where([
                'l' => ['gt', $formNode['r']]
            ])->save([
                    'l' => ['exp', '`l` - ' . $val . '-1']
                ]);

            $this->where([
                'r' => [['gt', $formNode['r']], ['lt', $toNode['r']]]
            ])->save([
                    'r' => ['exp', '`r` - ' . $val . '-1']
                ]);

            $modifyValue = $toNode['r'] - $formNode['r'] - 1;

            $this->where(['id' => ['in', $ids]])->save([
                'r' => ['exp', '`r` + ' . $modifyValue],
                'l' => ['exp', '`l` + ' . $modifyValue],
                'depth' => ['exp', '`depth` + ' . $modifyDepth]
            ]);

        } else {

            $this->where([
                'l' => [['gt', $toNode['r']], ['lt', $formNode['l']]]
            ])->save([
                    'l' => ['exp', '`l` + ' . $val . '+1']
                ]);

            $this->where([
                'r' => [['egt', $toNode['r']], ['lt', $formNode['r']]]
            ])->save([
                    'r' => ['exp', '`r` + ' . $val . '+1']
                ]);

            $modifyValue = $formNode['r'] - $toNode['r'];

            $this->where(['id' => ['in', $ids]])->save([
                'r' => ['exp', '`r` - ' . $modifyValue],
                'l' => ['exp', '`l` - ' . $modifyValue],
                'depth' => ['exp', '`depth` + ' . $modifyDepth]
            ]);


        }

    }

    public function addNode($toId, $nodeInfo)
    {

        $toNode = $this->where(['id' => $toId])->find();

        $this->where(['l' => ['gt', $toNode['r
        ']]])->save(['l' => ['exp', '`l` + 2']]);

        $this->where(['r' => ['egt', $toNode['r']]])->save(['r' => ['exp', '`r` + 2']]);

        $nodeInfo['l'] = $toNode['r'];
        $nodeInfo['r'] = $toNode['r'] + 1;
        $nodeInfo['depth'] = $toNode['depth'] + 1;

        $this->add($nodeInfo);
    }

    public function getParentNode($id)
    {
        $node = $this->where(['id' => $id])->find();

        return $this->where([
            'l' => ['elt', $node['l']],
            'r' => ['egt', $node['r']]
        ])->order('l asc')->select();

    }

    public function deleteNodeById($id)
    {
        $node = $this->where(['id' => $id])->find();

        $this->where(['id' => $id])->delete();

        $this->where(['l' => ['gt', $node['l']], 'r' => ['lt', $node['r']]])->save([
            'depth' => ['exp', ['`depth` - 1']]
        ]);
    }

    public function deleteChildNodeById($id, $self = true)
    {
        $node = $this->where(['id' => $id])->find();

        $gt = 'gt';
        $lt = 'lt';

        if ($self) {
            $gt = 'egt';
            $lt = 'elt';
        }

        $this->where(['l' => [$gt, $node['l']], 'r' => [$lt, $node['r']]])->delete();
    }
}