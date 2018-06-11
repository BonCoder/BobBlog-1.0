<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/14
 * Time: 12:27
 */

namespace Admin\Model;


use Admin\Widget\Page;
use Think\Model;

class PostCategoryModel extends Model
{
    protected $post;
    protected $patchValidate = true;

    protected $_validate = array(
        array('name', 'require', '文章分类名称不能够为空'),
    );

    protected function _initialize()
    {
        $this->post = D('Post');
    }

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

        $rows = $this->where($wheres)
            ->limit($page->firstRow, $page->listRows)
            ->order('id desc')
            ->select();
        foreach ($rows as &$row) {
            $row['count'] = $this->post->where('category_id=' . $row['id'])->count();
        }

        return array('rows' => $rows, 'pageHtml' => $pageHtml);
    }

    // 添加文章分类
    public function add()
    {
        $data = $this->data;
        $data['created_at'] = date('Y-m-d H:i:s', time());
        $data['updated_at'] = date('Y-m-d H:i:s', time());
        $id = parent::add($data);

        if ($id === false) {
            $this->error = "添加文章分类失败！";
            return false;
        }
        return true;
    }

    // 修改文章分类
    public function save()
    {
        $data = $this->data;
        $data['updated_at'] = date('Y-m-d H:i:s', time());
        $id = parent::save($data);

        if ($id === false) {
            return false;
        }
        return true;
    }

    // 是否允许被删除
    public function allowDelete($id)
    {
        // 有文章关联时，不能被删除
        $count = $this->post->where('category_id=' . $id)->count();
        if ($count > 0) {
            return false;
        }

        return true;
    }

    //文章分类系统信息详情
    public function getCategoryRecord(){
        $all = $this->count("id");  //总共
        $today = $this->where("DATEDIFF(created_at,NOW())=0")->count("id");  //今日
        $yearsday = $this->where("DATEDIFF(created_at,NOW())=-1")->count("id");  //昨日
        $toweekday = $this->where("YEARWEEK(date_format(created_at,'%Y-%m-%d')) = YEARWEEK(now())")->count("id");  //这周
        $tomonth = $this->where("date_format(created_at,'%Y-%m')=date_format(now(),'%Y-%m')")->count("id");  //这月
        return array('today'=>$today,'yearsday'=>$yearsday,'toweekday'=>$toweekday,'tomonth'=>$tomonth,'all'=>$all);
    }

    //修改分类状态
    public function saveStatus($id){
        $rs = M('post_category')->field('status')->where("id =".intval($id))->find();
        if($rs['status'] == 0){
            $data = array('status'=>1);
        }else if($rs['status'] == 1){
            $data = array('status'=>0);
        }
        $id = M('post_category')->where("id =".intval($id))->save($data);
        if ($id === false) {
            return false;
        }
        return true;
    }

}