<?php
/**
 * Kittencup Module
 *
 * @date 14-7-2 下午3:05
 * @copyright Copyright (c) 2014-2015 Kittencup. (http://www.kittencup.com)
 * @license   http://kittencup.com
 */
namespace Job\Controller;

use Think\Controller;

class ZpController extends Controller
{

    public function change()
    {

        $model = M('job-yx');
        $data = $model->select();


        foreach ($data as $item) {
            list($l, $h) = explode('-', $item['name']);

            $item['l'] = $l;
            $item['h'] = $h;

            $model->save($item);
        }
    }


    public function index()
    {


        $where = [];

        $filter = I('get.');

        $model = M('job-yx');

        if (isset($filter['yx'])) {

            $yx = str_replace(['以下', '以上', 'k'], ['', '', ''], $filter['yx']);

            list($l, $h) = explode('-', $yx);

            $yxWhere = [];

            if ($l == 2) {
                $yxWhere['h'] = ['lt', $l];
            } else if ($l == 50) {
                $yxWhere['l'] = ['gt', $l];
            } else {
                $yxWhere['l'] = ['egt', $l];
                $yxWhere['h'] = ['elt', $h];
            }

            $yxData = $model->where($yxWhere)->select();

            echo $model->getLastSql(),'<br>';
            $yxIds = [];
            foreach ($yxData as $data) {
                $yxIds[] = $data['id'];
            }

            $where['yx_id'] = ['in', implode(',', $yxIds)];

        }


        $yxSelect = [
            '2k以下',
            '2k-5k',
            '5k-10k',
            '10k-15k',
            '15k-25k',
            '25k-50k',
            '50k以上'
        ];

        $model = M('job-jy');


        if (isset($filter['jy'])) {
            $where['jy_id'] = $model->getFieldByName($filter['jy'], 'id');
        }

        $jySelect = $model->select();

        $model = M('job-dd');

        if (isset($filter['dd'])) {
            $where['dd_id'] = $model->getFieldByName($filter['dd'], 'id');
        }

        $ddSelect = $model->select();

        $model = M('job-xl');

        if (isset($filter['xl'])) {
            $where['xl_id'] = $model->getFieldByName($filter['xl'], 'id');
        }

        $xlSelect = $model->select();

        $model = M('job-xz');

        if (isset($filter['xz'])) {
            $where['xz_id'] = $model->getFieldByName($filter['xz'], 'id');
        }

        $xzSelect = $model->select();

        $model = M('job-gs');

        $gsSelect = $model->select();


        $model = D('Zp');
        $data = $model->relation(true)->where($where)->select();


        $this->assign('data', $data);
        $this->assign('ddSelect', $ddSelect);
        $this->assign('jySelect', $jySelect);
        $this->assign('yxSelect', $yxSelect);
        $this->assign('xlSelect', $xlSelect);
        $this->assign('xzSelect', $xzSelect);
        $this->assign('gsSelect', $gsSelect);
        $this->display();
    }

    public function clearTable()
    {

        foreach (['dd', 'gs', 'jy', 'xl', 'xz', 'yx', 'zp'] as $name) {
            $model = M('job-' . $name);
            $model->query('TRUNCATE TABLE ' . '`job-' . $name . '`');
            echo $model->getLastSql(), '<br>';
        }
    }

    public function lgAdd()
    {
        set_time_limit(0);

        $content = json_decode(file_get_contents(__DIR__ . '/job.txt'));

        foreach ($content as $item) {

            $data = [];

            foreach (['dd', 'gs', 'jy', 'xl', 'xz', 'yx'] as $name) {

                $model = M('job-' . $name);

                $itemName = trim(str_replace('拉勾未认证企业', '', $item->$name));


                $dbData = $model->where(['name' => $itemName])->find();

                if (!$dbData) {
                    $data[$name . '_id'] = $model->add(['name' => $itemName]);
                } else {
                    $data[$name . '_id'] = $dbData['id'];
                }

            }

            $data['title'] = $item->title;
            $data['content'] = trim($item->content);

            $zpModel = M('job-zp');
            if (!$zpModel->where($data)->count()) {
                $zpModel->add($data);
            }

        }

    }
}