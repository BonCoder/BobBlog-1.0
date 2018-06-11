<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/19
 * Time: 19:00
 */

namespace Admin\Model;

use Admin\Widget\Page;
use Think\Model;

class VisitLogModel extends Model
{
    // 分页列表
    public function getPageResult($wheres = array())
    {
        // 准备分页工具条html
        $pageHtml = '';
        $pageSize = 13;  // 每页多少条
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

    //今日和昨日访问人数
    public function getUserRecord(){
        $all = $this->count("distinct(ip)");  //总共访问人数
        $today = $this->where("DATEDIFF(created_at,NOW())=0")->count("distinct(ip)");  //今日访问人数
        $yearsday = $this->where("DATEDIFF(created_at,NOW())=-1")->count("distinct(ip)");  //昨日访问人数
        $toweekday = $this->where("YEARWEEK(date_format(created_at,'%Y-%m-%d')) = YEARWEEK(now())")->count("distinct(ip)");  //这周访问人数
        $yearsweek = $this->where("YEARWEEK(date_format(created_at,'%Y-%m-%d')) = YEARWEEK(now())-1")->count("distinct(ip)");  //上周访问人数
        $tomonth = $this->where("date_format(created_at,'%Y-%m')=date_format(now(),'%Y-%m')")->count("distinct(ip)");  //这月访问人数
        $yearsmonth = $this->where(" PERIOD_DIFF( date_format( now( ) , '%Y%m' ) , date_format( created_at, '%Y%m' ) ) =1")->count("distinct(ip)");  //上月访问人数
        return array('today'=>$today,'yearsday'=>$yearsday,'toweekday'=>$toweekday,'yearsweek'=>$yearsweek,'tomonth'=>$tomonth,'yearsmonth'=>$yearsmonth,'all'=>$all);
    }

}