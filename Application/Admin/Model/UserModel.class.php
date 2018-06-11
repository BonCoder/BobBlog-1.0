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

class UserModel extends Model
{
    protected $_auto = array(
        array('salt', '\Org\Util\StringNew::randString', '', 'function'),
    );

    // 表单验证规则
    protected $patchValidate = true;
    protected $_validate = array(
        // 登录时
        array('log_name', 'require', '账号不能够为空'),
        array('log_password', 'require', '密码不能够为空'),

        // 创建修改时
        array('name', 'require', '账号不能够为空'),
        array('password', 'require', '密码不能够为空'),
        array('nickname', 'require', '昵称不能够为空'),
        array('name', '', '帐号名称已经存在！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一
        array('password', 'checkPwd', '密码格式不正确', 0, 'callback', 1), // 自定义方法验证密码格式
        array('repassword', 'password', '确认密码不正确', 0, 'confirm', 1), // 验证确认密码是否和密码一致
        array('password', 'checkPwd', '密码格式不正确', 0, 'callback', 2), // 自定义方法验证密码格式
        array('repassword', 'password', '确认密码不正确', 0, 'confirm', 2), // 验证确认密码是否和密码一致
    );

    // 自定义验证方法
    protected function checkPwd()
    {
        $regExp = '/^(?![0-9]+$)(?![a-zA-Z]+$)[0-9A-Za-z]{6,20}$/';
        if (preg_match($regExp, I('post.password'))) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 登录验证功能
     * @return bool
     */
    public function login($param)
    {
        $name = $param['log_name'];
        $password = $param['log_password'];

        // 判断用户名是否存在
        $row = $this->field('id,name,password,salt,status')->getByName($name);

        if (empty($row)) {
            $this->error = '用户不存在！';
            return false;
        }
        if ($row['status'] == 0) {
            $this->error = '用户已禁用，不能登录！';
            return false;
        }
        $hash='sha256';
        $salt = base_convert(sha1(uniqid(mt_rand(), true)), 16, 36);
        $pwd=$password.'{'.$row['salt'].'}';
        $digest= hash($hash,$pwd,true);
        for ($i = 1; $i < 5000; ++$i) {
            $digest = hash($hash,$digest.$pwd,true);
        }
        $newpwd=base64_encode($digest);
        
//        md5(md5($this->data['password']) . $this->data['salt']);
        // 判断密码是否和数据库中的密码一致
        if ($row['password'] == $newpwd) {

            // 找到当前id,更新登录时间和ip
            $data['id'] = $row['id'];
            $data['last_time'] = date('Y-m-d H:i:s', time());
            $data['last_ip'] = get_client_ip(); // 转化为长整形

            $result = parent::save($data);
            if ($result === false) {
                return false;
            }
            // 保存session
            $userInfo = M('user_info')->field("username,logo_url")->where("id = ".intval($row['id']))->find(); //查询用户信息
            $userInfo['id'] = $row['id'];
            $userInfo['name'] = $row['name'];
            session('userInfo', $userInfo, 86400);
            return true;
        } else {
            $this->error = '密码不正确！';
            return false;
        }
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

        return array('rows' => $rows, 'pageHtml' => $pageHtml);
    }


    // 添加管理员
    public function add()
    {
        $uid = session('userInfo.id');
        if ($uid != 1) {
            $this->error = "只有超级管理员才能添加！";
            return false;
        }

        $data = $this->data;
        $data['register_time'] = date('Y-m-d H:i:s', time());
        $data['last_time'] = date('Y-m-d H:i:s', time());
        $data['register_id'] = get_client_ip();
        $data['last_id'] = get_client_ip();
        $data['name'] = strtolower($this->data['name']);
        $data['password'] = md5(md5($data['password']) . $this->data['salt']);

        $id = parent::add($data);
        if ($id === false) {
            $this->error = "添加管理员失败！";
            return false;
        }
        return true;
    }

    // 修改管理员
    public function save()
    {
        $uid = session('userInfo.id');
        if ($uid != 1) {
            $this->error = "只有超级管理员才能修改！";
            return false;
        }

        $data = $this->data;
        $data['last_time'] = date('Y-m-d H:i:s', time());
        $data['last_id'] = get_client_ip();
        $row = $this->field('id,salt')->getById($data['id']);
        $data['password'] = md5(md5($data['password']) . $row['salt']);

        $id = parent::save($data);

        if ($id === false) {
            $this->error = "修改管理员失败！";
            return false;
        }
        return true;
    }

    // 修改系统信息
    public function saveSystem()
    {
        $uid = session('userInfo.id');
        if ($uid != 1) {
            $this->error = "只有超级管理员才能修改！";
            return false;
        }
        $data['version'] = $_POST['version'];
        $data['author'] = $_POST['author'];
        $data['homePage'] = $_POST['homePage'];
        $data['server'] = $_POST['server'];
        $data['dataBase'] = $_POST['dataBase'];
        $data['userRights'] = $_POST['userRights'];
        $data['keywords'] = $_POST['keywords'];
        $data['powerby'] = $_POST['powerby'];
        $data['description'] = $_POST['description'];
        $data['record'] = $_POST['record'];
        $data['ip'] = $_POST['ip'];
        $id = M("system_info")->where("id = 1")->save($data);
        if ($id === false) {
            $this->error = "修改管理员失败！";
            return false;
        }
        return true;
    }

    // 修改用户信息
    public function updateUserInfo()
    {
        $uid = session('userInfo.id');
        $data['realname'] = $_POST['realname'];
        $data['sex'] = $_POST['sex'];
        $data['email'] = $_POST['email'];
        $data['motto'] = $_POST['motto'];
        $data['qq'] = $_POST['qq'];
        $data['weixin'] = $_POST['weixin'];
        $data['myself'] = $_POST['myself'];
        $id = M("user_info")->where("uid = ".intval($uid))->save($data);
        if ($id === false) {
            $this->error = "修改用户信息失败！";
            return false;
        }
        return true;
    }


}