<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/15
 * Time: 22:07
 */

namespace Home\Controller;


class PostController extends BaseController
{
    protected $post;

    protected function _initialize()
    {
        parent::_initialize();
        $this->post = D('Post');
    }

    public function index()
    {
        $categoryId = empty(I('get.id')) ? '-1' : I('get.id');

        if($categoryId != '-1'){
            if(!(M('PostCategory')->where("id=".intval($categoryId)." and status=1")->find())){
                $this->display('Layouts/404');
                exit;
            }
        }

        // 菜单选中
        $menu = 'Post/index/id/' . $categoryId . '.html';
        $this->assign('menu', $menu);

        // 正文
        $posts = $this->post->getPageResult($categoryId);
        $this->assign(['posts' => $posts['rows'], 'pagination' => $posts['pageHtml']]);

        if ($categoryId == '-1') {
//            $posts = $this->post->field("id,title,category_id,content,read_count,like_num,created_at")->where("read_count = (select MAX(read_count) from post) and status=1")->find();
//            $this->assign('hotPost',$posts);  //热门文章
            $this->assign('status',$categoryId);
            $this->assign('title',"Bob的博客-PHP-Java-mysql");
            $this->display('Post/list');
        } else {
            // 当前文章分类
            $nowCategory = M('PostCategory')->where('id=' . intval($categoryId))->getField('name');
            $this->assign('notice', '您正在查看：&nbsp;“' . $nowCategory . '”&nbsp;&nbsp;分类下的文章');
            $this->assign('title',$nowCategory."分类-Bob的博客-个人博客-技术博客-PHP-Java-网站建设");
            $this->display('Post/innerList');
        }
    }

    public function detail()
    {
        $postId = I('get.id');

        if(!(M('Post')->where("id=".intval($postId)." and status=1")->find())){
            $this->display('Layouts/404');
            exit;
        }

        // 菜单选中
        $categoryId = $this->post->where('id=' . intval($postId))->getField('category_id');
        $menu = 'Post/index/id/' . $categoryId . '.html';
        $this->assign('menu', $menu);

        // 上下篇
        $pre['id'] = array('lt', $postId);
        $next['id'] = array('gt', $postId);
        $condition['category_id'] = array('eq', $categoryId);
        $postPre = $this->post->where($condition)->where($pre)->order('id desc')->find();
        $postNext = $this->post->where($condition)->where($next)->order('id asc')->find();
        $this->assign(['postPre' => $postPre, 'postNext' => $postNext]);

        // 文章正文
        $post = $this->post->alias('p')
            ->field('p.*,pc.name as category_name,pc.id as cid')
            ->where('p.id=' . intval($postId))
            ->join('post_category pc on p.category_id = pc.id', 'left')
            ->find();

        //文章标签
        $posttabs = D("Post")->getPostTab($postId);
        $this->assign('postTabs',$posttabs);

        // 浏览次数
        if (!cookie('readCount' . $postId)) {
            $this->post->where('id=' . intval($postId))->setInc('read_count', 1);
            cookie('readCount' . $postId, 1, 1800); // cookie保存半小时
        }
        $this->assign('title',$post['title']);
        $this->assign('post', $post);
        $this->display('Post/detail');

    }


    //搜索
    public function search()
    {
        $keyword = I('post.keyword');
        $wheres = array();
        $wheres['title'] = array('like', "%{$keyword}%");

        $this->assign('notice', '您正在查看：包含关键字&nbsp;&nbsp;“' . $keyword . '”&nbsp;&nbsp;的文章');

        // 菜单选中
        $menu = 'search';
        $this->assign('menu', $menu);

        // 正文 -1表示所有文章
        $posts = $this->post->getPageResult(-1, $wheres);
        $this->assign(['posts' => $posts['rows'], 'pagination' => $posts['pageHtml'],'title'=>$posts['title']]);

        $this->assign('title',"搜索'".$keyword."'-Bob的博客-个人博客-技术博客-PHP-Java-网站建设");
        $this->display('Post/innerList');
    }

    //标签
    public function tab(){
        $id = I('get.id');
        if(!(M('post_tab')->where("id=".intval($id))->find())){
            $this->display('Layouts/404');
            exit;
        }
        $keyword = M("post_tab")->where('id='.intval($id))->getField("tab_name");
        $this->assign('notice', '您正在查看：关于标签&nbsp;&nbsp;“' . $keyword . '”&nbsp;&nbsp;的文章');

        // 菜单选中
        $menu = 'search';
        $this->assign('menu', $menu);

        // 正文 -1表示所有文章
        $posts = $this->post->getPageTabResult($id);
        $this->assign(['posts' => $posts['rows'], 'pagination' => $posts['pageHtml']]);
        $this->display('Post/innerList');
    }


    // 点赞
    public function like()
    {
        $id = I('post.id');
        if (!cookie('likeNum' . $id)) {
            $this->post->where('id=' . intval($id))->setInc('like_num', 1);
            cookie('likeNum' . $id, 1, 3600); // cookie保存1小时

            $likeNum = $this->post->where('id=' . intval($id))->getField('like_num');
            $data['status'] = 200;
            $data['like_num'] = $likeNum;
        } else {
            $data['status'] = 404;
            $data['message'] = '1小时内不能重复点赞';
        }

        $this->ajaxReturn($data);
    }
}