<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/16
 * Time: 23:21
 */

namespace Home\Controller;

use Think\Controller;

class IndexController extends BaseController
{
    protected function _initialize()
    {
        parent::_initialize();
    }

    public function index()
    {
        $post=new PostController();
        $post->index();
    }

    public function Entrance()
    {
        $this->display('welcome');
    }

    public function test()
    {
//以下是将字符串“Helloweba欢迎您”分别加密和解密
//加密：
        echo "加密:  ";
        echo $this->encryptDecrypt('password', 'Helloweba欢迎您',0);
        echo "<br>";
//解密：
        echo "解密:  ";
        echo $this->encryptDecrypt('password', 'z0JAx4qMwcF+db5TNbp/xwdUM84snRsXvvpXuaCa4Bk=',1);
    }

    function encryptDecrypt($key, $string, $decrypt){
        if($decrypt){
            $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($string), MCRYPT_MODE_CBC, md5(md5($key))), "12");
            return $decrypted;
        }else{
            $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $string, MCRYPT_MODE_CBC, md5(md5($key))));
            return $encrypted;
        }
    }

    /**
     * 声明此方法用来处理调用对象中不存在的方法
     */
    function __call($funName, $arguments)
    {
        $this->display('Layouts/404');
    }

    /**
     * 声明此方法用来处理调用对象中不存在的方法
     */
    function   _empty(){
        $this->error('您访问的页面不存在！','Layouts/404');
    }
}