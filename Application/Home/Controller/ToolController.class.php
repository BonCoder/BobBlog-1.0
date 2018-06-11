<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/22
 * Time: 00:44
 */

namespace Home\Controller;


class ToolController extends BaseController
{
    protected function _initialize()
    {
        parent::_initialize();
    }

    public function index(){
        // 菜单选中
        $menu = 'Tool/tool.html';
        $this->assign('menu', $menu);

        $this->assign('title',"工具-Bob的博客-个人博客-技术博客-PHP-Java-网站建设");
        $this->display('Tool/tool');
    }

    public function qrcode(){
        // 菜单选中
        $menu = 'Tool/qrcode.html';
        $this->assign('menu', $menu);

        $this->assign('title',"生成二维码-Bob的博客-个人博客-技术博客-PHP-Java-网站建设");
        $this->display('Tool/qrcode');
    }
}