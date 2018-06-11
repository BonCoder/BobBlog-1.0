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

class ToolModel extends Model
{
    protected $tableName='friend_line' ;
    public function friendLine(){
        $info = M("friend_line")->field("line_name,line_url")->where("status = 1")->select();
        return $info;
    }

}