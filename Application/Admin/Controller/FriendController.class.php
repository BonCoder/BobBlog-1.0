<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/17
 * Time: 18:55
 */

namespace Admin\Controller;

class FriendController extends BaseController
{
    protected $friend;
    protected $menu = 'Friend/lists';

    protected function _initialize()
    {
        parent::_initialize();
        $this->friend = D('Friend');
    }

    public function lists()
    {
        $keyword = I('get.name');
        $wheres = array();
        $wheres['line_name'] = array('like', "%{$keyword}%");
        $this->assign('keyword', $keyword);

        $lines = $this->friend->getPageResult($wheres);
        $this->assign(['line' => $lines['rows'], 'pagination' => $lines['pageHtml']]);

        $this->assign('menu', $this->menu);

        $this->display('list');
    }


    // 新增管理员
    public function create()
    {
        if (IS_POST) {
            if (I('post.id')) {
                if ($this->friend->create() !== false) {
                    if ($this->friend->save() !== false) {
                        $successMsg = '更新友链成功！';
                    } else {
                        $errorMsg = '更新友链失败！';
                    }
                    cookie('successMsg', $successMsg, 5);
                    cookie('errorMsg', $errorMsg, 5);
                    // 此处用函数，不用$this->redirect
                    redirect(cookie('forwardUrl'));
                } else {
                    $errors = json_encode($this->friend->getError());
                    cookie('errors', $errors, 5);
                    $this->redirect('Friend/create', array('id' => I('post.id')));
                }
            } else {
                if ($this->friend->create() !== false) {
                    // 请求数据添加到数据库中
                    if ($this->friend->add() !== false) {
                        $successMsg = '添加友链成功！';
                    } else {
                        $errorMsg = '添加友链失败！';
                    }
                    cookie('successMsg', $successMsg, 5);
                    cookie('errorMsg', $errorMsg, 5);
                    $this->redirect('Friend/lists');
                } else {
                    $errors = json_encode($this->friend->getError());
                    cookie('errors', $errors, 5);
                    $this->redirect('Friend/create');
                }
            }
        } else {
            if (I('get.id')) {
                $id = I('get.id');
                $friend =  M("friend_line")->where("id = $id")->find();
                $this->assign($friend);
                $this->assign('meta_title', '编辑友链');
            } else {
                $this->assign('meta_title', '添加友链');
            }
            $this->assign('menu', $this->menu);
            $this->display('create');
        }
    }


    // 删除管理员
    public function delete()
    {
        $ids = explode(',', I('post.id'));

        // 开启事务
        $this->friend->startTrans();

        $deleted = 0; // 记录成功删除的数量
        foreach ($ids as $id) {
            // 判断是否允许删除 1为admin
            if ($id == '1') {
                break;
            }
            $deleted += M("friend_line")->where('id=' . $id)->delete();
        }

        // 判断是否全部删除
        if ($deleted == count($ids)) {
            // 提交事务
            $this->friend->commit();
            $successMsg = '成功删除了' . $deleted . '条数据！';
            cookie('successMsg', $successMsg, 5);
        } else {
            // 回滚事务
            $this->friend->rollback();
            $errorMsg = '删除友链失败！';
            cookie('errorMsg', $errorMsg, 5);
        }

        $this->redirect('Friend/lists');
    }

    public function examine()
    {
        $keyword = I('get.name');
        $wheres = array();
        $wheres['line_name'] = array('like', "%{$keyword}%");
        $this->assign('keyword', $keyword);

        $lines = $this->friend->getPagesResult($wheres);
        $this->assign(['line' => $lines['rows'], 'pagination' => $lines['pageHtml']]);

        $this->assign('menu', 'Friend/examine');

        $this->display('examine_list');
    }

    public function ExamineAdd()
    {
        if ($this->friend->ExamineAdd() !== false) {
            $successMsg = '友链审核通过！';
        } else {
            $errorMsg = '友链审核失败！';
        }
        cookie('successMsg', $successMsg, 5);
        cookie('errorMsg', $errorMsg, 5);
        $this->redirect('Friend/examine');
    }

    //修改友链状态
    public function updateStatus(){
        $id = I('post.id');
        if($this->friend->saveStatus($id)){
            echo json_encode(1);
        }else{
            echo json_encode(0);
        }
    }

    // 删除管理员
    public function ExamineDelete()
    {
        $ids = explode(',', I('post.id'));

        // 开启事务
        $this->friend->startTrans();

        $deleted = 0; // 记录成功删除的数量
        foreach ($ids as $id) {
            // 判断是否允许删除 1为admin
            if ($id == '1') {
                break;
            }
            $deleted += M("apply_friend")->where('id=' .intval($id))->delete();
        }

        // 判断是否全部删除
        if ($deleted == count($ids)) {
            // 提交事务
            $this->friend->commit();
            $successMsg = '成功删除了' . $deleted . '条数据！';
            cookie('successMsg', $successMsg, 5);
        } else {
            // 回滚事务
            $this->friend->rollback();
            $errorMsg = '删除友链失败！';
            cookie('errorMsg', $errorMsg, 5);
        }

        $this->redirect('Friend/examine');
    }
}