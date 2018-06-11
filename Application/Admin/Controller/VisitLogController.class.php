<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/19
 * Time: 18:56
 */

namespace Admin\Controller;


class VisitLogController extends BaseController
{
    protected $visitLog;
    protected $menu = 'VisitLog/lists';

    protected function _initialize()
    {
        parent::_initialize();
        $this->visitLog = D('VisitLog');
    }

    // 访问记录列表
    public function lists()
    {

        $name = I('get.name');
//        $date = I('get.date');
//        list($minDate, $maxDate) = explode(' - ', $date);
        $minDate = I('get.minDate');
        $maxDate = I('get.maxDate');
        $wheres = array();
        $wheres['ip'] = array('like', "%{$name}%");
        if ($minDate != '' && $maxDate != '') {
            $wheres['created_at'] = array('between', array($minDate, $maxDate));
        }
        $this->assign(['name' => $name, 'minDate' => $minDate,'maxDate' => $maxDate]);

        $visitLogs = $this->visitLog->getPageResult($wheres);
        $visitUsers = $this->visitLog->getUserRecord();
        $this->assign(['visitLogs' => $visitLogs['rows'], 'pagination' => $visitLogs['pageHtml']]);
        $this->assign('menu', $this->menu);
        $this->assign('visitUsers',$visitUsers);
        $this->display('list');
    }


    // 删除访问记录
    public function delete()
    {
        $ids = explode(',', I('post.id'));

        // 开启事务
        $this->visitLog->startTrans();

        $deleted = 0; // 记录成功删除的数量
        foreach ($ids as $id) {
            $deleted += $this->visitLog->where('id=' . intval($id))->delete();
        }

        // 判断是否全部删除
        if ($deleted == count($ids)) {
            // 提交事务
            $this->visitLog->commit();
            $successMsg = '成功删除了' . $deleted . '条数据！';
            cookie('successMsg', $successMsg, 5);
        } else {
            // 回滚事务
            $this->visitLog->rollback();
            $errorMsg = '删除文章失败！';
            cookie('errorMsg', $errorMsg, 5);
        }

        $this->redirect('VisitLog/lists');
    }


    // ip地址屏蔽
    public function ipLists()
    {
        $keyword = I('get.name');
        $wheres = array();
        $wheres['ip'] = array('like', "%{$keyword}%");
        $this->assign('keyword', $keyword);

        $shieldIps = D('ShieldIp')->getPageResult($wheres);
        $this->assign(['shieldIps' => $shieldIps['rows'], 'pagination' => $shieldIps['pageHtml']]);
        $this->assign('menu', 'VisitLog/ipLists');

        $this->display('ipList');
    }

    // 新增ip
    public function ipCreate()
    {
        $shieldIp = D('ShieldIp');
        if (IS_POST) {
            if ($shieldIp->create() !== false) {
                // 请求数据添加到数据库中
                if ($shieldIp->add() !== false) {
                    $successMsg = '添加ip地址成功！';
                } else {
                    $errorMsg = '添加ip地址失败！';
                }
                cookie('successMsg', $successMsg, 5);
                cookie('errorMsg', $errorMsg, 5);
                $this->redirect('VisitLog/ipLists');
            } else {
                $errors = json_encode($shieldIp->getError());
                cookie('errors', $errors, 5);
                $this->redirect('VisitLog/ipCreate');
            }
        } else {
            $this->assign('meta_title', '添加ip地址');
            $this->assign('menu', 'VisitLog/ipLists');
            $this->display('ipCreate');
        }
    }

    // 删除屏蔽的ip
    public function deleteIps()
    {
        $ids = explode(',', I('post.id'));
        $shieldIp = D('ShieldIp');
        // 开启事务
        $shieldIp->startTrans();

        $deleted = 0; // 记录成功删除的数量
        foreach ($ids as $id) {
            $deleted += $shieldIp->where('id=' . $id)->delete();
        }

        // 判断是否全部删除
        if ($deleted == count($ids)) {
            // 提交事务
            $shieldIp->commit();
            $successMsg = '成功删除了' . $deleted . '条数据！';
            cookie('successMsg', $successMsg, 5);
        } else {
            // 回滚事务
            $shieldIp->rollback();
            $errorMsg = '删除文章失败！';
            cookie('errorMsg', $errorMsg, 5);
        }

        $this->redirect('VisitLog/ipLists');
    }

}