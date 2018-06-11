<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/14
 * Time: 16:53
 */

namespace Home\Model;

use Think\Model;

class ApplyModel extends Model
{
    protected $tableName='apply_friend' ;

    public function save(){
        $data['name'] = I('post.name');
        $data['email'] = I('post.email');
        $data['website'] = I('post.website');
        $data['content'] = I('post.content');
//        $data = $this->data;
        $data['ip'] = $_SERVER['REMOTE_ADDR']; // tcp层握手的ip,客户端不能伪造
        $data['create_at'] = date('Y-m-d H:i:s', time());
        $id = M($this->tableName)->add($data);
//        $id = parent::save();
        if ($id === false) {
            return false;
        }
        return true;
    }

}