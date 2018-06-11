<?php
/**
 * Created by PhpStorm.
 * User: HP
 * Date: 2016/10/16
 * Time: 23:36
 */

namespace Admin\Behaviors;

use Think\Behavior;

class loginBehavior extends Behavior {

    // 此方法和common中tags文件配合调用
    public function run(&$param) {
        // 访问除了登录之外的页面时，判断是否已登录，未登录则返回登录页面
        $userInfo = session('userInfo');
        if (empty($userInfo)) {
            $module = MODULE_NAME;
            $controller = CONTROLLER_NAME;
            $action = ACTION_NAME;
            if ($module == 'Admin' && $controller == 'Index') {
                if ($action != 'index') {
                    header('Location:' . U('Admin/Index/index'));
                }
            } elseif ($module == 'Admin' && $controller != 'Index') {
                header('Location:' . U('Admin/Index/index'));
            }
        }
    }
}