<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/14
 * Time: 16:53
 */

namespace Home\Model;

use Home\Widget\Page;
use Think\Model;

class PostModel extends Model
{
    protected $tableName = 'post';

    // 分页列表
    public function getPageResult($categoryId, $wheres = array())
    {
        if ($categoryId == '-1') {
            $wheres['category_id'] = array('gt', 0);
            $wheres['homepage'] = array('eq', 1);
        } else {
            $wheres['category_id'] = array('eq', $categoryId);
        }

        // 取状态正常的文章
        $wheres['p.status'] = array('eq', 1);

        // 准备分页工具条html
        $pageHtml = '';
        $pageSize = 5;  // 每页多少条
        $allRows = $this->count();
        $totalRows = $this->alias('p')->where($wheres)->count();  // 总条数
        $page = new Page($totalRows, $pageSize);
        $pageHtml = $page->show(); // 生成分页的html
        // 准备分页列表数据 $page->firstRow 起始条数=(页码-1)*每页数
        if ($page->firstRow > $totalRows) {
            // 起始条数大于总条数, 显示最后一页数据.
            $page->firstRow = 0;
        }
        $rows = $this->alias('p')
            ->field('p.id,p.title,p.content,p.read_count,p.like_num,p.created_at,pc.name as category_name')
            ->join('post_category pc on p.category_id = pc.id', 'left')
            ->limit($page->firstRow, $page->listRows)
            ->where($wheres)
            ->order('created_at desc')
            ->select();
        return array('rows' => $rows, 'pageHtml' => $pageHtml ,'allPost' =>$allRows);
    }

    // 标签分页列表
    public function getPageTabResult($id)
    {

        // 准备分页工具条html
        $pageHtml = '';
        $pageSize = 5;  // 每页多少条
        $totalRows = M("dim_post_tab")->where('p_id='.intval($id))->count();  // 总条数
        $page = new Page($totalRows, $pageSize);
        $pageHtml = $page->show(); // 生成分页的html
        // 准备分页列表数据 $page->firstRow 起始条数=(页码-1)*每页数
        if ($page->firstRow > $totalRows) {
            // 起始条数大于总条数, 显示最后一页数据.
            $page->firstRow = 0;
        }
        $rows = $this->alias('p')
            ->field('p.*')
            ->join('dim_post_tab as a on a.p_id = p.id', 'left')
            ->limit($page->firstRow, $page->listRows)
            ->where('a.t_id='.intval($id))
            ->order('created_at desc')
            ->select();
        return array('rows' => $rows, 'pageHtml' => $pageHtml);
    }

    //查询文章标签
    public function getPostTab($postId){
        if($postId==0){
            $info = M("post_tab")->field("id,tab_name,class_tab")->select();
        }else{
            $info = M("dim_post_tab as a")->field("b.id,b.tab_name,b.class_tab")->join("post_tab as b on b.id = a.t_id","left")->where('a.p_id = '.intval($postId))->select();
        }
        return $info;
    }

}