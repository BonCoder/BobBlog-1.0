<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/14
 * Time: 11:57
 */

namespace Admin\Controller;

class PostTabController extends BaseController
{
    protected $postTab;
    protected $menu = 'PostTab/lists';

    protected function _initialize()
    {
        parent::_initialize();
        $this->postTab = D('PostTab');
    }

    public function lists()
    {
        $keyword = I('get.name');
        $wheres = array();
        $wheres['name'] = array('like', "%{$keyword}%");
        $this->assign('keyword', $keyword);

        $postCategories = $this->postTab->getPageResult($wheres);
        $this->assign(['postTabs' => $postCategories['rows'], 'pagination' => $postCategories['pageHtml']]);

        // 将当前url地址保存到cookie中
        cookie('forwardUrl', $_SERVER['REQUEST_URI']);
        $this->assign('menu', $this->menu);

        $this->display('list');
    }

    // 新增文章分类
    public function create()
    {
        if (IS_POST) {
            if (I('post.id')) {
                if ($this->postTab->create() !== false) {
                    if ($this->postTab->save() !== false) {
                        $successMsg = '更新标签成功！';
                    } else {
                        $errorMsg = '更新标签失败！';
                    }
                    cookie('successMsg', $successMsg, 5);
                    cookie('errorMsg', $errorMsg, 5);
                    // 此处用函数，不用$this->redirect
                    redirect(cookie('forwardUrl'));
                } else {
                    $errors = json_encode($this->postTab->getError());
                    cookie('errors', $errors, 5);
                    $this->redirect('PostTab/create', array('id' => I('post.id')));
                }
            } else {
                if ($this->postTab->create() !== false) {
                    // 请求数据添加到数据库中
                    if ($this->postTab->add() !== false) {
                        $successMsg = '添加标签成功！';
                    } else {
                        $errorMsg = '添加标签失败！';
                    }
                    cookie('successMsg', $successMsg, 5);
                    cookie('errorMsg', $errorMsg, 5);
                    $this->redirect('PostTab/lists');
                } else {
                    $errors = json_encode($this->postCategory->getError());
                    cookie('errors', $errors, 5);
                    $this->redirect('PostTab/create');
                }
            }
        } else {
            if (I('get.id')) {
                $id = I('get.id');
                $postTab = $this->postTab->where("id = $id")->find();
                $this->assign($postTab);
                $this->assign('meta_title', '编辑标签');
            } else {
                $this->assign('meta_title', '添加标签');
            }
            $this->assign('menu', $this->menu);
            $this->display('create');
        }
    }

    // 删除文章分类
    public function delete()
    {
        $ids = explode(',', I('post.id'));

        // 开启事务
        $this->postTab->startTrans();

        $deleted = 0; // 记录成功删除的数量
        foreach ($ids as $id) {
            // 判断是否允许删除
            if (!$this->postTab->allowDelete($id)) {
                break;
            }
            // 执行删除操作，并记录成功删除的条数
            $deleted += $this->postTab->where('id=' . $id)->delete();
        }

        // 判断是否全部删除
        if ($deleted == count($ids)) {
            // 提交事务
            $this->postTab->commit();
            $successMsg = '成功删除了' . $deleted . '条数据！';
            cookie('successMsg', $successMsg, 5);
        } else {
            // 回滚事务
            $this->postTab->rollback();
            $errorMsg = '删除失败，分类下有文章关联！';
            cookie('errorMsg', $errorMsg, 5);
        }

        $this->redirect('PostTab/lists');
    }

}