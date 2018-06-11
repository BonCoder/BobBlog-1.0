<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/17
 * Time: 18:55
 */

namespace Admin\Controller;

class UserController extends BaseController
{
    protected $user;
    protected $menu = 'User/lists';

    protected function _initialize()
    {
        parent::_initialize();
        $this->user = D('User');
    }

    public function lists()
    {
        $keyword = I('get.name');
        $wheres = array();
        $wheres['name'] = array('like', "%{$keyword}%");
        $this->assign('keyword', $keyword);

        $users = $this->user->getPageResult($wheres);
        $this->assign(['users' => $users['rows'], 'pagination' => $users['pageHtml']]);

        // 将当前url地址保存到cookie中
        cookie('forwardUrl', $_SERVER['REQUEST_URI']);
        $this->assign('menu', $this->menu);

        $handleStatus = [0 => '禁用', 1 => '正常'];
        $this->assign('handleStatus', $handleStatus);

        $this->display('list');
    }


    // 新增管理员
    public function create()
    {
        if (IS_POST) {
            if (I('post.id')) {
                if ($this->user->create() !== false) {
                    if ($this->user->save() !== false) {
                        $successMsg = '更新管理员成功！';
                    } else {
                        $errorMsg = '更新管理员失败！';
                    }
                    cookie('successMsg', $successMsg, 5);
                    cookie('errorMsg', $errorMsg, 5);
                    // 此处用函数，不用$this->redirect
                    redirect(cookie('forwardUrl'));
                } else {
                    $errors = json_encode($this->user->getError());
                    cookie('errors', $errors, 5);
                    $this->redirect('User/create', array('id' => I('post.id')));
                }
            } else {
                if ($this->user->create() !== false) {
                    // 请求数据添加到数据库中
                    if ($this->user->add() !== false) {
                        $successMsg = '添加管理员成功！';
                    } else {
                        $errorMsg = '添加管理员失败！';
                    }
                    cookie('successMsg', $successMsg, 5);
                    cookie('errorMsg', $errorMsg, 5);
                    $this->redirect('User/lists');
                } else {
                    $errors = json_encode($this->user->getError());
                    cookie('errors', $errors, 5);
                    $this->redirect('User/create');
                }
            }
        } else {
            if (I('get.id')) {
                $id = I('get.id');
                $user = $this->user->where("id = $id")->find();
                $this->assign($user);
                $this->assign('meta_title', '编辑管理员');
            } else {
                $this->assign('meta_title', '添加管理员');
            }
            $this->assign('menu', $this->menu);
            $this->display('create');
        }
    }


    // 删除管理员
    public function delete()
    {
        $ids = explode(',', I('post.id'));

        // 开启事务
        $this->user->startTrans();

        $deleted = 0; // 记录成功删除的数量
        foreach ($ids as $id) {
            // 判断是否允许删除 1为admin
            if ($id == '1') {
                break;
            }
            $deleted += $this->user->where('id=' . $id)->delete();
        }

        // 判断是否全部删除
        if ($deleted == count($ids)) {
            // 提交事务
            $this->user->commit();
            $successMsg = '成功删除了' . $deleted . '条数据！';
            cookie('successMsg', $successMsg, 5);
        } else {
            // 回滚事务
            $this->user->rollback();
            $errorMsg = '删除管理员失败！（不能删除超级管理员）';
            cookie('errorMsg', $errorMsg, 5);
        }

        $this->redirect('User/lists');
    }

    //修改系统基础参数
    public function systemParameter(){
        if($_POST){
            if ($this->user->saveSystem() !== false) {
                $successMsg = '更新系统基本参数成功！';
            } else {
                $errorMsg = '更新系统基本参数失败！';
            }
            cookie('successMsg', $successMsg, 3);
            cookie('errorMsg', $errorMsg, 3);
            $this->redirect('User/systemParameter');
        }else{
            $sysInfo = M('system_info')->find();
            $this->assign('sysInfo',$sysInfo);
            $this->assign('menu', 'User/systemParameter');
            // 将当前url地址保存到cookie中
            cookie('forwardUrl', $_SERVER['REQUEST_URI']);
            $this->display('systemParameter');
        }
    }

    //修改个人详情
    public function updateUserInfo(){
        if($_POST){
            if ($this->user->updateUserInfo() !== false) {
                $successMsg = '修改成功！';
            } else {
                $errorMsg = '修改失败！';
            }
            cookie('successMsg', $successMsg, 3);
            cookie('errorMsg', $errorMsg, 3);
            $this->redirect('User/updateUserInfo');
        }else{
            $uid = session('userInfo.id');
            $userInfo = M('user_info')->where("id = ".intval($uid))->find(); //查询用户信息
            $this->assign($userInfo);
            $this->assign('menu', 'User/updateUserInfo');
            $this->display('userInfo');
        }
    }

    //上传头像
    public function uploadImg(){
        $file_name = $_FILES['userFace']["tmp_name"];
        $file_type = $_FILES['userFace']["type"];
        $img1_retype=explode("/",$file_type);
        $uid = session('userInfo.id');
        $img1_rename="logo_".$uid.".".$img1_retype[1];  //头像重命名
        $target_name = './Public/Home/images/'.$img1_rename;  //上传文件的存放路径
        $upload_path = './Public/Home/images/'; //上传文件的存放路径
        if(!file_exists($upload_path))
        {
            mkdir($upload_path,0777);
        }
//开始移动文件到相应的文件夹
        if(move_uploaded_file($file_name,$target_name)){
            $upload_path = '/Public/Home/images/'; //上传文件的存放路径
            $src=$upload_path.$img1_rename;
            $data['logo_url'] = $src;
            M("user_info")->where("uid = ".intval($uid))->save($data);
            $res=array(
                'code' => 0,
                'msg' => '上传成功！',
                'data' => array(
                    'src'=>$src,
                    'title'=>'用户头像'
                )
            );
            echo json_encode($res);
            exit;
        }else{
            $res=array(
                'code' => 1,
                'msg' => '上传失败！',
                'data' => array(
                    'src'=>'',
                    'title'=>''
                )
            );
            echo json_encode($res);
        }
    }



}