<?php
return array(
    // 配置数据库
//    'DB_TYPE' => 'mysql',       // 数据库类型
//    'DB_HOST' => '127.0.0.1',   // 服务器地址
//    'DB_NAME' => 'jdblog',        // 数据库名
//    'DB_USER' => 'root',        // 用户名
//    'DB_PWD' => '123456',       // 密码
//    'DB_PORT' => '3306',        // 端口

    // 线上
    'DB_TYPE' => 'mysql',       // 数据库类型
    'DB_HOST' => '127.0.0.1',   // 服务器地址
    'DB_NAME' => 'blog',        // 数据库名
    'DB_USER' => 'root',        // 用户名
    'DB_PWD' => '123456',       // 密码
    'DB_PORT' => '3306',        // 端口

//    'SHOW_PAGE_TRACE' => true,

    // url链接中去掉模块
    'DEFAULT_MODULE' => 'Home',
    'MODULE_ALLOW_LIST' => array('Home','Admin'),

    // url访问模式为rewrite模式
    'URL_MODEL'=>'2',
    // 开启伪静态
    'URL_HTML_SUFFIX' =>'.html',

	'TMPL_EXCEPTION_FILE'=>'./404.html',
	
	'ERROR_PAGE'=>'./404.html',
	
    'DEFAULT_FILTER' => 'htmlspecialchars', //默认过滤函数
);
