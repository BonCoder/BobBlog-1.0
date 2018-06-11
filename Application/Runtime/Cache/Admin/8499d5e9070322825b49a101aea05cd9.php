<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>博客管理系统</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="Shortcut Icon" href="/Public/Admin/images/Bob.jpg">
    <link rel="stylesheet" href="/Public/Admin/static/adminlte/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/Admin/static/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="/Public/Admin/static/ionicons/ionicons-2.0.1/css/ionicons.min.css">
    <link  rel="stylesheet" href="/Public/Admin/static/adminlte/plugins/select2/select2.css">
    <link rel="stylesheet" href="/Public/Admin/static/adminlte/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/Public/Admin/static/adminlte/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="/Public/Admin/css/customs.css?1">
    <link rel="stylesheet" href="/Public/Admin/static/layui2/css/layui.css">
    <link rel="stylesheet" href="/Public/Admin/static/leaf/plugins/art-dialog/css/ui-dialog.css"/>
    <link rel="stylesheet" href="/Public/Admin/static/leaf/css/leaf.css"/>
    
    <style>
        .dx-info-default {
            padding: 15px 24px;
        }
    </style>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    
        <header class="main-header">
            <a href="" class="logo">
                <span class="logo-mini">Blog</span>
                <span class="logo-lg">Bob 的博客</span>
            </a>

            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <ul class="menu">
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="/Public/Admin/static/adminlte/dist/img/user2-160x160.jpg"
                                                     class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>

                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>

                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 9 tasks</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>

                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                         role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                         aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>

                        <li class="dropdown user user-menu">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo ($_SESSION['userInfo']['logo_url']); ?>" class="user-image"
                                     alt="User Image">
                                <span class="hidden-xs"><?php echo ($_SESSION['userInfo']['username']); ?></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <img src="<?php echo ($_SESSION['userInfo']['logo_url']); ?>"
                                         class="img-circle"
                                         alt="User Image">
                                    <p>
                                        <?php echo ($_SESSION['userInfo']['username']); ?>
                                        <small>2017年5月1日注册</small>
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo U('User/updateUserInfo');?>" class="btn btn-default btn-flat">个人信息</a>
                                    </div>
                                    <div class="pull-right">
                                      <a href="<?php echo U('Index/logout');?>" class="btn btn-default btn-flat">注销</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    

    
        <aside class="main-sidebar">

            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo ($_SESSION['userInfo']['logo_url']); ?>" class="img-circle"
                             alt="User Image">
                    </div>

                    <div class="pull-left info">
                        <p><?php echo ($_SESSION['userInfo']['username']); ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="搜索...">

                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>

                <ul class="sidebar-menu">
                    <li class="header"><b>主菜单</b></li>
                    <li class="">
                        <a href="<?php echo U('Index/welcome');?>"><i class="fa fa-dashboard"></i> <span>仪表盘</span></a>
                    </li>
                    <li class="treeview ">
                        <a href="javascript:;"><i class="fa fa-tags"></i>
                            <span>文章管理</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?php echo U('Post/lists');?>">文章列表</a>
                            </li>
                            <li>
                                <a href="<?php echo U('PostCategory/lists');?>">文章分类</a>
                            </li>
                            <li>
                                <a href="<?php echo U('PostTab/lists');?>">标签管理</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview ">
                        <a href="javascript:;"><i class="fa  fa-spinner"></i>
                            <span>访问记录</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?php echo U('VisitLog/lists');?>">访问列表</a>
                            </li>
                            <li>
                                <a href="<?php echo U('VisitLog/ipLists');?>">IP屏蔽</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview ">
                        <a href="javascript:;"><i class="fa fa-cog"></i>
                            <span>系统管理</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?php echo U('User/lists');?>">管理员列表</a>
                            </li>
                            <li>
                                <a href="<?php echo U('User/systemParameter');?>">系统基本参数</a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="javascript:;"><i class="fa fa-dashboard"></i>
                            <span>友情链接</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?php echo U('Friend/lists');?>">友情链接</a>
                            </li>
                            <li>
                                <a href="<?php echo U('Friend/examine');?>">链接审核</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>
    

    
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                文章管理
                <small>文章分类</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="javascript:;"><i class="fa fa-dashboard"></i> 首页</a></li>
                <li class="active"> 文章管理</li>
            </ol>
        </section>

        <!-- Main content -->


        <div class="childrenBody">
            <blockquote class="layui-elem-quote news_search">
                <form action="<?php echo U();?>" method="get">
                    <div class="layui-inline">
                        <div class="layui-input-inline">
                            <input type="text" value="<?php echo ($keyword); ?>" name="name" placeholder="请输入关键字" class="layui-input search_input">
                        </div>
                        <button type="submit" class="layui-btn search_btn">
                            <span class="glyphicon glyphicon-search"></span> 搜索
                        </button>
                    </div>
                </form>
                <br>
                <div class="layui-inline">
                    <a id="addCategory-btn" class="layui-btn layui-btn-normal newsAdd_btn">添加分类</a>
                </div>
                <div class="layui-inline">
                    <a class="layui-btn layui-btn-danger batchDel js-delete">批量删除</a>
                    <form id="js-delete-form" method="post" action="<?php echo U('PostCategory/delete');?>"
                          style="display: none">
                        <input type="text" name="id" value="">
                    </form>
                </div>
                <div class="layui-inline">
                    <div class="layui-form-mid layui-word-aux">本页面刷新后除新添加的文章外所有操作无效，关闭页面所有数据重置</div>
                </div>
            </blockquote>
            <div class="layui-form news_list">
                <table class="layui-table">
                    <colgroup>
                        <col width="50">
                        <col width="20%">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col width="13%">
                    </colgroup>
                    <thead>
                    <tr>
                        <th><input type="checkbox" name="" lay-skin="primary" class="js-select-all" lay-filter="allChoose" id="allChoose"></th>
                        <th style="text-align:left;">分类名称</th>
                        <th>关联文章(篇)</th>
                        <th>排序</th>
                        <th>状态</th>
                        <th>添加时间</th>
                        <th>修改时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody class="">
                    <?php if(is_array($postCategories)): foreach($postCategories as $key=>$postCategory): ?><tr>
                            <td>
                                <input type="checkbox" name="checked" lay-skin="primary" lay-filter="choose" value="<?php echo ($postCategory["id"]); ?>">
                                <div class="layui-unselect layui-form-checkbox" lay-skin="primary"><i class="layui-icon"></i></div>
                            </td>
                            <td><?php echo ($postCategory["name"]); ?></td>
                            <td><?php echo ($postCategory["count"]); ?></td>
                            <td><?php echo ($postCategory["sort"]); ?></td>
                            <td>
                                <?php if($postCategory["status"] == 1 ): ?><input type="checkbox" name="show" lay-skin="switch" value="<?php echo ($postCategory["id"]); ?>" class="status" lay-text="是|否" lay-filter="isShow" checked>
                                    <div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>是</em><i></i></div>
                                    <?php else: ?>
                                    <input type="checkbox" name="show" lay-skin="switch" value="<?php echo ($postCategory["id"]); ?>" class="status" lay-text="是|否" lay-filter="isShow">
                                    <div class="layui-unselect layui-form-switch" lay-skin="_switch"><em>否</em><i></i></div><?php endif; ?>
                            </td>
                            <td><?php echo ($postCategory["created_at"]); ?></td>
                            <td><?php echo ($postCategory["updated_at"]); ?></td>
                            <td>
                                <a  data-id= "<?php echo ($postCategory["id"]); ?>" class="layui-btn layui-btn-mini saveCategory-btn "><i class="iconfont icon-edit"></i> 编辑</a>
                                <a data-id="<?php echo ($line["id"]); ?>" class="js-delete-one layui-btn layui-btn-danger layui-btn-mini " data-id="1">
                                    <i class="layui-icon"></i> 删除</a>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
            <!--修改文章分类-->
            <div id="addCategory" class="index-updatePassword dx-info-default" style="display: none;">
                <form class="layui-form" action="<?php echo U('PostCategory/create');?>" method="post">
                    <div class="layui-form-item">
                        <label class="layui-form-label">分类名</label>
                        <div class="layui-input-block dx-input-required">
                            <input type="text" id="name" name="name" lay-verify="required" autocomplete="off" placeholder="请输入分类名" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-block dx-input-required">
                            <input type="text" id="sort" name="sort" lay-verify="required" autocomplete="off" placeholder="请输入排序" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">状态</label>
                        <div class="layui-input-block list-status">
                            <input type="radio" name="status" value="1" id="start" title="启用" checked >
                            <input type="radio" name="status" value="0" id="stop" title="禁用" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <input type="hidden" name="id" class="id"/>
                            <button class="layui-btn" lay-submit="" lay-filter="updatePassword">提交</button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="page">
                <!--分页-->
                <div class="box-tools pull-right">
                    <ul class="pagination inline">
                        <?php echo ($pagination); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                Anything you want
            </div>
            <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>
    

</div>

<script type="text/javascript" src="/Public/Admin/static/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="/Public/Admin/static/adminlte/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/Admin/static/adminlte/dist/js/app.min.js"></script>
<script type="text/javascript" src="/Public/Admin/static/leaf/js/leaf.js"></script>
<script type="text/javascript" src="/Public/Admin/static/leaf/plugins/art-dialog/dist/dialog-min.js"></script>
<script>
    var menu = '<?php echo ($menu); ?>';
    $('.treeview-menu > li > a').each(function () {
        if ($(this).attr('href').indexOf(menu) > -1) {
            $(this).parent().addClass("active");
            $(this).parent().parent().parent().addClass("active");
        }
    });
</script>

    <script type="text/javascript" src="/Public/Admin/static/layui2/layui.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/categorp.js"></script>


</body>
</html>