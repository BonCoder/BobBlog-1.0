<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/20
 * Time: 16:58
 */

namespace Admin\Model;

use Admin\Widget\Page;
use Think\Model;

class ShieldIpModel extends Model
{
    // 表单验证规则
    protected $patchValidate = true;
    protected $_validate = array(
        array('ip', 'require', 'ip不能够为空'),
        array('remark', 'require', '备注不能够为空'),
    );

    // 分页列表
    public function getPageResult($wheres = array())
    {
        // 准备分页工具条html
        $pageHtml = '';
        $pageSize = 15;  // 每页多少条
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

        return array('rows' => $rows, 'pageHtml' => $pageHtml);
    }


    // 添加屏蔽ip
    public function add()
    {
        $data = $this->data;
        $data['created_at'] = date('Y-m-d H:i:s', time());

        $id = parent::add($data);

        if ($id === false) {
            $this->error = "添加ip地址失败！";
            return false;
        }
        return true;
    }
}