<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
    // 登陆验证
    public function index()
    {
        if (IS_POST) {
            $User = D('User');
            if ($User->create() !== false) {
                $param = I('post.');
                $result = $User->login($param);
                if ($result === true) {
                   return $this->welcome();
                } else {
                    $this->assign('error', show_model_error($User));
                    $this->display('index');
                }
            }
//            $this->error(show_model_error($User));
        } else {
            $this->display('index');
        }
    }

    public function welcome()
    {
        $visitUsers = D("VisitLog")->getUserRecord();
        $posts = D("Post")->getPostRecord();
        $category = D("PostCategory")->getCategoryRecord();
        $tab = D("PostTab")->getTabRecord();
        $friend = D("Friend")->getFriendRecord();
        $sysInfo = M('system_info')->find();
        $latestPosts = D("Post")->field("id,title,created_at")->order('created_at desc')->limit(7)->select();
        $this->assign('latestPosts', $latestPosts); //最新文章
        $this->assign('sysInfo',$sysInfo); //系统信息
        $this->assign('visit',$visitUsers);  //访问人数
        $this->assign('post',$posts);  //文章
        $this->assign('category',$category);  //文章分类
        $this->assign('tab',$tab);  //文章标签
        $this->assign('friend',$friend);  //友链
        $this->assign('menu', 'Index/welcome');
        $this->display('Welcome/list');
    }

    public function test(){
        $result = '{"remain":4999997,"success":3}';
        $arr = json_decode($result,JSON_FORCE_OBJECT);
        var_dump($arr);die();

        explode(',', $result);
    }

    // 退出登录
    public function logout()
    {
        session('userInfo', null);
        header('Location:' . U('Admin/Index/index'));
    }
}