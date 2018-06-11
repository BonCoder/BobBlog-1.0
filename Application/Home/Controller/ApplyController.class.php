<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/22
 * Time: 00:44
 */

namespace Home\Controller;


class ApplyController extends BaseController
{
    protected function _initialize()
    {
        parent::_initialize();
    }

    public function index(){
        // 菜单选中
        $menu = 'Apply/apply.html';
        $this->assign('menu', $menu);

        $this->assign('title',"申请互链-Bob的博客-个人博客-技术博客-PHP-Java-网站建设");
        $this->display('Apply/apply');
    }



    public function createCode(){
         $srcstr = "abcdefghkmnprstuvwxyzABCDEFGHKMNPRSTUVWXYZ0123456789";
            mt_srand();
            $strs = "";
            for ($i = 0; $i < 5; $i++) {
                $strs .= $srcstr[mt_rand(0, 55)];
            }
//随机生成的字符串
        $str = $strs;
//验证码图片的宽度
        $width  = 80;
//验证码图片的高度
        $height = 30;
//声明需要创建的图层的图片格式
        @ header("Content-Type:image/png");
//创建一个图层
        $im = imagecreate($width, $height);
//背景色
        $back = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);
//模糊点颜色
        $pix  = imagecolorallocate($im, 187, 230, 247);
//字体色
        $font = imagecolorallocate($im, 41, 163, 238);
//绘模糊作用的点
        mt_srand();
        for ($i = 0; $i < 1000; $i++) {
            imagesetpixel($im, mt_rand(0, $width), mt_rand(0, $height), $pix);
        }
//输出字符
        imagestring($im, 15, 15, 6, $str, $font);
//输出矩形
        imagerectangle($im, 0, 0, $width -1, $height -1, $font);
//输出图片
        imagepng($im);
        imagedestroy($im);
//选择 Session
        $_SESSION["createCode"] = $str;
    }

    public function VerificationCode(){
        $code = I('post.code');
        $createCode = $_SESSION["createCode"];
        if(empty($code)){
            echo "<span style='color:red'>验证码不能为空</span>";
        }elseif(strcasecmp($code,$createCode)==0){
            echo "<span style='color:#339933'>验证码正确</span>";
        }else{
            echo "<span style='color:red'>验证码错误</span>";
        }
    }

    public function saveFriend(){
        $code = I('post.code');
        $createCode = $_SESSION["createCode"];
        if($code != $createCode){
            $errorMsg = "验证码错误!";
        }else{
            if(D('Apply')->save()){
                $successMsg = "提交成功!";
            }else{
                $errorMsg = "提交失败!";
            }
        }
        cookie('successMsg', $successMsg, 5);
        cookie('errorMsg', $errorMsg, 5);
        // 此处用函数，不用$this->redirect
        $this->redirect('Apply/index');

    }
}