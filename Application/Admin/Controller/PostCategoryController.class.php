<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/14
 * Time: 11:57
 */

namespace Admin\Controller;

class PostCategoryController extends BaseController
{
    protected $postCategory;
    protected $menu = 'PostCategory/lists';

    protected function _initialize()
    {
        parent::_initialize();
        $this->postCategory = D('PostCategory');
    }

    public function lists()
    {
        $keyword = I('get.name');
        $wheres = array();
        $wheres['name'] = array('like', "%{$keyword}%");
        $this->assign('keyword', $keyword);

        $postCategories = $this->postCategory->getPageResult($wheres);
        $this->assign(['postCategories' => $postCategories['rows'], 'pagination' => $postCategories['pageHtml']]);

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
                if ($this->postCategory->create() !== false) {
                    if ($this->postCategory->save() !== false) {
                        $successMsg = '更新文章分类成功！';
                    } else {
                        $errorMsg = '更新文章分类失败！';
                    }
                    cookie('successMsg', $successMsg, 5);
                    cookie('errorMsg', $errorMsg, 5);
                    // 此处用函数，不用$this->redirect
                    redirect(cookie('forwardUrl'));
                } else {
                    $errors = json_encode($this->postCategory->getError());
                    cookie('errors', $errors, 5);
                    $this->redirect('PostCategory/lists', array('id' => I('post.id')));
                }
            } else {
                if ($this->postCategory->create() !== false) {
                    // 请求数据添加到数据库中
                    if ($this->postCategory->add() !== false) {
                        $successMsg = '添加文章分类成功！';
                    } else {
                        $errorMsg = '添加文章分类失败！';
                    }
                    cookie('successMsg', $successMsg, 5);
                    cookie('errorMsg', $errorMsg, 5);
                    $this->redirect('PostCategory/lists');
                } else {
                    $errors = json_encode($this->postCategory->getError());
                    cookie('errors', $errors, 5);
                    $this->redirect('PostCategory/lists');
                }
            }
        } else {
            if (I('get.id')) {
                $id = I('get.id');
                $postCategory = $this->postCategory->where("id = $id")->find();
                echo json_encode($postCategory);
//                $this->assign('meta_title', '编辑文章分类');
            } else {
                $this->assign('meta_title', '添加文章分类');
            }
//            $this->assign('menu', $this->menu);
//            $this->display('create');
        }
    }

    // 删除文章分类
    public function delete()
    {
        $ids = explode(',', I('post.id'));

        // 开启事务
        $this->postCategory->startTrans();

        $deleted = 0; // 记录成功删除的数量
        foreach ($ids as $id) {
            // 判断是否允许删除
            if (!$this->postCategory->allowDelete($id)) {
                break;
            }
            // 执行删除操作，并记录成功删除的条数
            $deleted += $this->postCategory->where('id=' . $id)->delete();
        }

        // 判断是否全部删除
        if ($deleted == count($ids)) {
            // 提交事务
            $this->postCategory->commit();
            $successMsg = '成功删除了' . $deleted . '条数据！';
            cookie('successMsg', $successMsg, 5);
        } else {
            // 回滚事务
            $this->postCategory->rollback();
            $errorMsg = '删除失败，分类下有文章关联！';
            cookie('errorMsg', $errorMsg, 5);
        }

        $this->redirect('PostCategory/lists');
    }

    //修改分类状态
    public function updateStatus(){
        $id = I('post.id');
        if($this->postCategory->saveStatus($id)){
            echo json_encode(1);
        }else{
            echo json_encode(0);
        }
    }

}