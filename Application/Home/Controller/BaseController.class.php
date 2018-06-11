<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/19
 * Time: 17:10
 */

namespace Home\Controller;

use Org\Net\IpLocation;
use Think\Controller;

class BaseController extends Controller
{
    protected function _initialize()
    {
        // 访问日志记录表
        $ip = $_SERVER['REMOTE_ADDR']; // tcp层握手的ip,客户端不能伪造
        if (!cookie('visit' . $ip)) {
            $this->getLatlngByIp($ip);
            cookie('visit' . $ip, 1, 3600); // cookie保存1小时
        }

        // 顶部菜单
        $categories = M('PostCategory')->where("status = 1")->order('sort asc')->select();
        $this->assign('categories', $categories);

        // 最新文章
        $latestPosts = M("Post")->field("id,title")->order('created_at desc')->limit(10)->select();
        $this->assign('latestPosts', $latestPosts);

        // 热门文章
        $hotsPosts = M('Post')->field("id,title")->order('read_count desc')->limit(10)->select();
        $this->assign('hotsPosts', $hotsPosts);

        //用户信息
        $userInfo = M('user_info')->where("id = 1")->find();
        $this->assign($userInfo);

        //所有标签
        $tabs = D("Post")->getPostTab(0);
        $this->assign('Tabs',$tabs);

        //文章总数和标签总数
        $countPost = M('Post')->count();
        $this->assign('countPost',$countPost);
        $this->assign('countTab',count($tabs));

        //友情链接
        $info = D("Tool")->friendLine();
        $this->assign("link",$info);


    }


    // 获取当前浏览用户经纬度
    public function getLatlngByIp($ip)
    {
        // 调用百度web api
        $content = file_get_contents("http://api.map.baidu.com/location/ip?ak=b1bKCarPwdp9v2jo85UjnjKCSWnK2oB9&ip={$ip}&coor=bd09ll");
        $content = json_decode($content, true);
        $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

        // 存入数据库
        $data = array();
        $data['ip'] = $ip;
        $data['longitude'] = $content['content']['point']['x']; // 经度
        $data['latitude'] = $content['content']['point']['y']; // 纬度
        $data['address'] = $content['content']['address']; // 城市地址
        $data['url'] = $url;     //访问地址
        $data['created_at'] = date('Y-m-d H:i:s', time());

        $ipLocation = new IpLocation('qqwry.dat');
        $location = $ipLocation->getlocation($ip); // 纯真地址
        // $data['address'] = iconv('gb2312', 'utf-8', $location['country']);
        $data['area'] = iconv('gb2312', 'utf-8', $location['area']);

        // ip屏蔽
        $ip = substr($ip, 0, strrpos($ip, '.'));
        $ips = M('ShieldIp')->field('ip')->select();
        $newIps = array_column($ips,'ip');  //将二维数组转换成一个数组
//        $newIps = array();
//        foreach ($ips as $k => $v) {
//            foreach ($v as $m => $n) {
//                $newIps[] = $n;
//            }
//        }
        if (!in_array($ip, $newIps)) {
            M('VisitLog')->add($data);
        }
    }

}
