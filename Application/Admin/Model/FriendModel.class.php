<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/17
 * Time: 15:17
 */

namespace Admin\Model;

use Admin\Widget\Page;
use Think\Model;

class FriendModel extends Model
{
    protected $tableName = "friend_line";
    // 分页列表
    public function getPageResult($wheres = array())
    {
        // 准备分页工具条html
        $pageHtml = ''; 
        $pageSize = 10;  // 每页多少条
        $totalRows = $this->where($wheres)->count();  // 总条数
        $page = new Page($totalRows, $pageSize);
        $pageHtml = $page->show(); // 生成分页的html
        // 准备分页列表数据 $page->firstRow 起始条数=(页码-1)*每页数
        if ($page->firstRow > $totalRows) {
            // 起始条数大于总条数, 显示最后一页数据.
            $page->firstRow = 0;
        }
        $rows = M("friend_line")->where($wheres)
            ->limit($page->firstRow, $page->listRows)
            ->order('id ')
            ->select();

        return array('rows' => $rows, 'pageHtml' => $pageHtml);
    }


    // 添加友链
    public function add()
    {
        $data = $this->data;
        $uid = session('userInfo.id');
        $data['createTime'] = date('Y-m-d H:i:s', time());
        $data['updateTime'] = date('Y-m-d H:i:s', time());
        $data['userid'] = $uid;
        $id = parent::add($data);

        if ($id === false) {
            $this->error = "添加友链失败！";
            return false;
        }
        return true;
    }

    // 修改管理员
    public function save()
    {
        $data = $this->data;
        $data['updateTime'] = date('Y-m-d H:i:s', time());
        $id = parent::save($data);

        if ($id === false) {
            return false;
        }
        return true;
    }

    //修改文章状态
    public function saveStatus($id){
        $rs = M('friend_line')->field('status')->where("id =".intval($id))->find();
        if($rs['status'] == 0){
            $data = array('status'=>1);
        }else if($rs['status'] == 1){
            $data = array('status'=>0);
        }
        $id = M('friend_line')->where("id =".intval($id))->save($data);
        if ($id === false) {
            return false;
        }
        return true;
    }


    //友链信息详情
    public function getFriendRecord(){
        $all = $this->count("id");  //总共
        $today = $this->where("DATEDIFF(createTime,NOW())=0")->count("id");  //今日
        $yearsday = $this->where("DATEDIFF(createTime,NOW())=-1")->count("id");  //昨日
        $toweekday = $this->where("YEARWEEK(date_format(createTime,'%Y-%m-%d')) = YEARWEEK(now())")->count("id");  //这周
        $tomonth = $this->where("date_format(createTime,'%Y-%m')=date_format(now(),'%Y-%m')")->count("id");  //这月
        return array('today'=>$today,'yearsday'=>$yearsday,'toweekday'=>$toweekday,'tomonth'=>$tomonth,'all'=>$all);
    }

    // 友链审核分页列表
    public function getPagesResult($wheres = array())
    {
        // 准备分页工具条html
        $pageHtml = '';
        $pageSize = 10;  // 每页多少条
        $totalRows = M('apply_friend')->where($wheres)->count();  // 总条数
        $page = new Page($totalRows, $pageSize);
        $pageHtml = $page->show(); // 生成分页的html
        // 准备分页列表数据 $page->firstRow 起始条数=(页码-1)*每页数
        if ($page->firstRow > $totalRows) {
            // 起始条数大于总条数, 显示最后一页数据.
            $page->firstRow = 0;
        }
        $rows = M("apply_friend")->where($wheres)
            ->limit($page->firstRow, $page->listRows)
            ->order('id ')
            ->select();

        return array('rows' => $rows, 'pageHtml' => $pageHtml);
    }

    // 添加友链审核
    public function ExamineAdd()
    {
        $id = I('get.id');
        $Deatil = M('apply_friend')->where('id='.intval($id))->find();
        $uid = session('userInfo.id');
        $data['line_name'] = $Deatil['name'];
        $data['line_url'] = $Deatil['website'];
        $data['email'] = $Deatil['email'];
        $data['createTime'] = date('Y-m-d H:i:s', time());
        $data['updateTime'] = date('Y-m-d H:i:s', time());
        $data['userid'] = $uid;
        $result = M($this->tableName)->add($data);
        if ($result === false) {
            $this->error = "友链审核失败！";
            return false;
        }else{
            M('apply_friend')->where('id='.intval($id))->delete();  //删除原先的记录
            return true;
        }
    }
}