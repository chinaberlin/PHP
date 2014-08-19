<?php
namespace Admin\Controller;

class UserController extends AdminController
{
    public function index()
    {


        $model = D('User');

        $data = $model->relation(true)->select();
        echo $model->getLastSql();
        var_dump($data);exit;

        /* @var $model \Think\Model */
        $model = M('kp-cms-user');
        $users = $model->order('id desc')->page(I('get.p', 0) . ',1')->select();

        $count = $model->count();

        $page = new \Think\Page($count, 1);
        $page->setConfig('theme', "<ul class='pagination'></li><li>%FIRST%</li><li>%UP_PAGE%</li><li>%LINK_PAGE%</li><li>%DOWN_PAGE%</li><li>%END%</li><li><a> %HEADER%  %NOW_PAGE%/%TOTAL_PAGE% 页</a></ul>");

        $this->assign('page', $page->show());
        $this->assign('users', $users);
        $this->display();
    }

    public function add()
    {
        if (IS_POST) {
            /* @var $model \Think\Model */
            $model = D('User');
            if ($model->create()) {
                if ($model->add()) {
                    return $this->success(L('add_success'), U('index'));
                } else {
                    return $this->error(L('add_error'), U('index'));
                }
            } else {
                return $this->error(L($model->getError()), U('add'));
            }
        }

        $this->display();
    }

    public function edit($id)
    {

        /* @var $model \Think\Model */
        $model = D('User');

        if (IS_POST) {
            $model = D('User');

            if ($model->create()) {
                if ($model->save()) {
                    return $this->success(L('save_success'), U('index'));
                } else {
                    return $this->error(L('save_error'), U('index'));
                }
            } else {
                return $this->error(L($model->getError()), U('edit', ['id' => $id]));
            }

        }

        $user = $model->where(['id' => $id])->find();

        if (!$user) {
            return $this->error(L('user_not_found'), U('index'));
        }

        $this->assign('user', $user);
        $this->display();

    }

    public function delete($id)
    {
        $model = D('User');

        if (IS_POST) {
            $isDelete = (int)I('post.isDelete');

            if ($isDelete === -1) {
                return $this->error(L('return_index'), U('index'));
            }

            if ($model->where(['id' => $id])->delete()) {
                return $this->success(L('delete_success'), U('index'));
            } else {
                return $this->error(L('delete_error'), U('index'));
            }
        }

        $user = $model->where(['id' => $id])->find();
        if (!$user) {
            return $this->error(L('user_not_found'), U('index'));
        }
        $this->assign('user', $user);
        $this->display();
    }
}