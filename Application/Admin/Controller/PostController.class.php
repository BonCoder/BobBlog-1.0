<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/14
 * Time: 10:49
 */

namespace Admin\Controller;

class PostController extends BaseController
{
    protected $post;
    protected $menu = 'Post/lists';

    protected function _initialize()
    {
        parent::_initialize();
        $this->post = D('Post');
    }

    // 文章列表
    public function lists()
    {
        $keyword = I('get.name');
        $wheres = array();
        $wheres['title'] = array('like', "%{$keyword}%");
        $this->assign('keyword', $keyword);

        $posts = $this->post->getPageResult($wheres);
        $this->assign(['posts' => $posts['rows'], 'pagination' => $posts['pageHtml']]);

        $handleStatus = [0 => '禁用', 1 => '正常'];
        $this->assign('handleStatus', $handleStatus);
        $this->assign('menu', $this->menu);

        // 将当前url地址保存到cookie中
        cookie('forwardUrl', $_SERVER['REQUEST_URI']);

        $this->display('list');
    }


    // 新增文章
    public function create()
    {
        if (IS_POST) {
            if (I('post.id')) {
                if ($this->post->create() !== false) {
                    if ($this->post->save() !== false) {
                        $successMsg = '更新文章成功！';
                    } else {
                        $errorMsg = '更新文章失败！';
                    }
                    $tabs = $_POST["tags"];
                    D("Post")->savePostTab($tabs,I('post.id'));
                    cookie('successMsg', $successMsg, 5);
                    cookie('errorMsg', $errorMsg, 5);
                    // 此处用函数，不用$this->redirect
                    redirect(cookie('forwardUrl'));
                } else {
                    $errors = json_encode($this->post->getError());
                    cookie('errors', $errors, 5);
                    $this->redirect('Post/create', array('id' => I('post.id')));
                }
            } else {
                if ($this->post->create() !== false) {
                    // 请求数据添加到数据库中
                    $id=$this->post->add();
                    if ($id) {
                        $successMsg = '添加文章成功！';
                    } else {
                        $errorMsg = '添加文章失败！';
                    }
                    $tabs = $_POST["tags"];
                    D("Post")->savePostTab($tabs,$id);
                    cookie('successMsg', $successMsg, 5);
                    cookie('errorMsg', $errorMsg, 5);
                    $this->redirect('Post/lists');
                } else {
                    $errors = json_encode($this->post->getError());
                    cookie('errors', $errors, 5);
                    $this->redirect('Post/create');
                }
            }
        } else {
            if (I('get.id')) {
                $id = I('get.id');
                $post = $this->post->where("id = $id")->find();
                $this->assign($post);
                $postTab = M("dim_post_tab")->field("t_id")->where("p_id=$id")->select();
                $postTab = implode(',',array_column($postTab,'t_id'));
                $this->assign($post);
                $this->assign(['meta_title'=> '编辑文章','postTab'=>$postTab]);
            } else {
                $this->assign('meta_title', '添加文章');
            }
            $postCategory = D('postCategory');
            $categories = $postCategory->field('id,name')->select();
            $postTab = D('postTab');
            $postTabs = $postTab->field("id,tab_name")->select();
            $this->assign('tabs', $postTabs);
            $this->assign('categories', $categories);
            $this->assign('menu', $this->menu);
            $this->display('create');
        }
    }

    //修改文章状态
    public function updateStatus(){
        $id = I('post.id');
        if($this->post->saveStatus($id)){
            echo json_encode(1);
        }else{
            echo json_encode(0);
        }
    }

    //文章首页是否显示
    public function updateType(){
        $id = I('post.id');
        if($this->post->saveType($id)){
            echo json_encode(1);
        }else{
            echo json_encode(0);
        }
    }

    //上传图片
    public function uploadImg(){
        $file_name = $_FILES['upload']["tmp_name"];
        $file_type = $_FILES['upload']["type"];
        $img1_retype=explode("/",$file_type);
        $rename=time();
        $img1_rename=$rename.".".$img1_retype[1];
        $target_name = './layui/'.date('Ymd/').$img1_rename;
        $upload_path = './layui/'.date('Ymd/'); //上传文件的存放路径
        if(!file_exists($upload_path))  //检查文件夹是否存在
        {
            mkdir($upload_path,0777);  //创建文件夹并赋777权限
        }
        if(move_uploaded_file($file_name,$target_name)){          //开始移动文件到相应的文件夹
            $upload_path = '/layui/'.date('Ymd/'); //上传文件的存放路径
            $src=$upload_path.$img1_rename;
            $res=array(
                'errno' => 0,
                'data' => [$src]
            );
            echo json_encode($res);
            exit;
        }else{
            $res=array(
                'errno' => 1,
            );
            echo json_encode($res);
        }
    }

    // 删除文章
    public function delete()
    {
        $ids = explode(',', I('post.id'));

        // 开启事务
        $this->post->startTrans();

        $deleted = 0; // 记录成功删除的数量
        $uid = session('userInfo.id');
        foreach ($ids as $id) {
            $authorId = $this->post->getFieldById($id, 'user_id');

            if ($authorId == $uid) {
                $deleted += $this->post->where('id=' . intval($id))->delete(); // 只有作者本人可删除
            }

        }

        // 判断是否全部删除
        if ($deleted == count($ids)) {
            // 提交事务
            $this->post->commit();
            $successMsg = '成功删除了' . $deleted . '条数据！';
            cookie('successMsg', $successMsg, 5);
        } else {
            // 回滚事务
            $this->post->rollback();
            $errorMsg = '删除文章失败！';
            cookie('errorMsg', $errorMsg, 5);
        }

        $this->redirect('Post/lists');
    }

    //百度主动推送
    public function postPushBaiDu(){
        $ids = explode(',', I('post.id'));
        $urls = array();
        foreach ($ids as $id) {
            M('post')->where('id='.intval($id))->setInc('pushs',1);
        }
        for($i=0;$i<count($ids);$i++){
            $urls[$i] = "https://www.bobcoder.cc/Post/detail/id/".$ids[$i].".html";
        }
        $api = 'http://data.zz.baidu.com/urls?site=https://www.bobcoder.cc&token=6ghjG8IW7xG75ETN';
        $ch = curl_init();
        $options =  array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        $arr = json_decode($result,JSON_FORCE_OBJECT);
        if($arr['success'] > 0){
            $data['uid'] = session('userInfo.id');
            $data['success'] = $arr['success'];
            $data['remain'] = $arr['remain'];
            $data['pid'] = I('post.id');
            M('push')->add($data);
        }elseif ($arr['error'] > 0){
            $data['uid'] = session('userInfo.id');
            $data['error'] = $arr['error'];
            $data['message'] = $arr['message'];
            $data['pid'] = I('post.id');
            M('push')->add($data);
        }
        echo $result;
    }

    //熊掌号主动推送
    public function postPushXZH(){
        $ids = explode(',', I('post.id'));
        $urls = array();
        foreach ($ids as $id) {
            M('post')->where('id='.intval($id))->setInc('pushs',1);
        }
        for($i=0;$i<count($ids);$i++){
            $urls[$i] = "https://www.bobcoder.cc/Post/detail/id/".$ids[$i].".html";
        }
        $api = 'http://data.zz.baidu.com/urls?appid=1582923272386365&token=emxRPfHFT1AAYvn7&type=realtime';
        $ch = curl_init();
        $options =  array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        $arr = json_decode($result,JSON_FORCE_OBJECT);
        if($arr['success'] > 0){
            $data['uid'] = session('userInfo.id');
            $data['success'] = $arr['success_realtime'];
            $data['remain'] = $arr['remain_realtime'];
            $data['pid'] = I('post.id');
            M('push')->add($data);
        }elseif ($arr['error'] > 0){
            $data['uid'] = session('userInfo.id');
            $data['error'] = $arr['error'];
            $data['message'] = $arr['message'];
            $data['pid'] = I('post.id');
            M('push')->add($data);
        }
        echo $result;
    }

}