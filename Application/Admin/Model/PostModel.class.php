<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/14
 * Time: 12:17
 */

namespace Admin\Model;


use Admin\Widget\Page;
use Think\Model;

class PostModel extends Model
{
    // 表单验证规则
    protected $patchValidate = true;
    protected $_validate = array(
        array('title', 'require', '标题不能够为空'),
        array('author', 'require', '作者不能够为空'),
        array('category_id', 'require', '文章分类不能够为空'),
        array('content', 'require', '文章内容不能够为空'),
    );

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
        $rows = $this->alias('p')
            ->field('p.*,pc.name as category_name')
            ->join('post_category pc on p.category_id = pc.id', 'left')
            ->where($wheres)
            ->limit($page->firstRow, $page->listRows)
            ->order('p.id desc')
            ->select();

        return array('rows' => $rows, 'pageHtml' => $pageHtml);
    }


    // 添加文章
    public function add()
    {
        $data = $this->data;
        $data['created_at'] = date('Y-m-d H:i:s', time());
        $data['updated_at'] = date('Y-m-d H:i:s', time());

        // 作者为当前登录用户昵称
        $uid = session('userInfo.id');
        $nickname = D('user')->where('id=' . intval($uid))->getField('nickname');
        $data['author'] = $nickname;
        $data['user_id'] = $uid;
        $id = parent::add($data);

        if ($id === false) {
            $this->error = "添加文章失败！";
            return false;
        }
        return $id;
    }

    // 修改文章
    public function save()
    {
        $data = $this->data;
        $data['updated_at'] = date('Y-m-d H:i:s', time());

        // 只有作者本人可修改
        $uid = session('userInfo.id');
        $authorId = $this->getFieldById($data['id'], 'user_id');

        if ($uid != $authorId) {
            return false;
        }

        $id = parent::save($data);

        if ($id === false) {
            return false;
        }
        return true;
    }

    //修改文章状态
    public function saveStatus($id){
        $rs = M('post')->field('status')->where("id =".intval($id))->find();
        if($rs['status'] == 0){
            $data = array('status'=>1);
        }else if($rs['status'] == 1){
            $data = array('status'=>0);
        }
        $id = M('post')->where("id =".intval($id))->save($data);
        if ($id === false) {
            return false;
        }
        return true;
    }

    //修改文章状态
    public function saveType($id){
        $rs = M('post')->field('homepage')->where("id =".intval($id))->find();
        if($rs['homepage'] == 0){
            $data = array('homepage'=>1);
        }else if($rs['homepage'] == 1){
            $data = array('homepage'=>0);
        }
        $id = M('post')->where("id =".intval($id))->save($data);
        if ($id === false) {
            return false;
        }
        return true;
    }

    //查询标签
    public function savePostTab($tabs,$id){
       $info = M("dim_post_tab")->where("p_id=$id")->select();
       if($info){
           M("dim_post_tab")->where("p_id=$id")->delete();
       }
        for ($i=0;$i<count($tabs);$i++){
            $save['p_id']=$id;
            $save['t_id']=$tabs[$i];
            M("dim_post_tab")->add($save);
        }
    }

    //文章系统信息详情
    public function getPostRecord(){
        $all = $this->count("id");  //总共
        $today = $this->where("DATEDIFF(created_at,NOW())=0")->count("id");  //今日
        $yearsday = $this->where("DATEDIFF(created_at,NOW())=-1")->count("id");  //昨日
        $toweekday = $this->where("YEARWEEK(date_format(created_at,'%Y-%m-%d')) = YEARWEEK(now())")->count("id");  //这周
        $tomonth = $this->where("date_format(created_at,'%Y-%m')=date_format(now(),'%Y-%m')")->count("id");  //这月
        return array('today'=>$today,'yearsday'=>$yearsday,'toweekday'=>$toweekday,'tomonth'=>$tomonth,'all'=>$all);
    }
}