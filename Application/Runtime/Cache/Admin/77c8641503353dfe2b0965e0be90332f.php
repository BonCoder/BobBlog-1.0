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
    
    <link rel="stylesheet" href="/Public/Admin/css/user.css">
    <script type="text/javascript" src="/Public/Admin/static/layui2/layui.js"></script>

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
                个人信息
                <small>个人信息修改</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="javascript:;"><i class="fa fa-dashboard"></i> 首页</a></li>
                <li class="active"> 个人/li>
            </ol>
        </section>

        <?php if(!empty($_COOKIE['successMsg'])): ?><div class="alert alert-success alert-dismissible" style="margin-top: 20px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <?php echo (cookie('successMsg')); ?>
            </div><?php endif; ?>
        <?php if(!empty($_COOKIE['errorMsg'])): ?><div class="alert alert-warning alert-dismissible" style="margin-top: 20px;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <?php echo (cookie('errorMsg')); ?>
            </div><?php endif; ?>

        <!-- Main content -->
        <div class="childrenBody" style="height: 100%;background-color: #fff">
        <form class="layui-form" ction="<?php echo U('User/updateUserInfo');?>" method="post">
            <div class="user_left">
                <div class="layui-form-item">
                    <label class="layui-form-label">用户名</label>
                    <div class="layui-input-block">
                        <input type="text" value="<?php echo ($username); ?>" name="username" disabled class="layui-input layui-disabled">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">用户组</label>
                    <div class="layui-input-block">
                        <input type="text" value="<?php echo ($usergroup); ?>" name="usergroup" disabled class="layui-input layui-disabled">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">真实姓名</label>
                    <div class="layui-input-block">
                        <input type="text" value="<?php echo ($realname); ?>" placeholder="请输入真实姓名" name="realname" lay-verify="required" class="layui-input realName">
                    </div>
                </div>
                <div class="layui-form-item" pane="">
                    <label class="layui-form-label">性别</label>
                    <div class="layui-input-block userSex">
                        <?php if($sex == 1): ?><input type="radio" name="sex" value="1" title="男" checked="">
                        <input type="radio" name="sex" value="2" title="女">
                        <?php else: ?>
                            <input type="radio" name="sex" value="1" title="男">
                            <input type="radio" name="sex" value="2" title="女" checked=""><?php endif; ?>
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">邮箱</label>
                    <div class="layui-input-block">
                        <input type="text" value="<?php echo ($email); ?>" name="email" placeholder="请输入邮箱" lay-verify="required|email" class="layui-input userEmail">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">座右铭</label>
                    <div class="layui-input-block">
                        <input type="text" value="<?php echo ($motto); ?>" name="motto" placeholder="请输入座右铭" lay-verify="required" class="layui-input userMotto">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">QQ</label>
                    <div class="layui-input-block">
                        <input type="text" value="<?php echo ($qq); ?>" name="qq" placeholder="请输入QQ号"  class="layui-input QQ">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">微信</label>
                    <div class="layui-input-block">
                        <input type="text" value="<?php echo ($weixin); ?>" name="weixin" placeholder="请输入微信号"  class="layui-input userWeixin">
                    </div>
                </div>
                <div class="layui-form-item">
                    <label class="layui-form-label">自我评价</label>
                    <div class="layui-input-block">
                        <textarea placeholder="请输入内容" name="myself" class="layui-textarea myself"><?php echo ($myself); ?></textarea>
                    </div>
                </div>
            </div>
            <div class="user_right">
                <input type="file" name="userFace" class="layui-upload-file" id="userlogo" lay-title="掐指一算，我要换一个头像了">
                <p>由于是纯静态页面，所以只能显示一张随机的图片</p>
                <img src="<?php echo ($logo_url); ?>" class="layui-circle" id="userFace">
            </div>
            <div class="layui-form-item" style="margin-left: 5%;">
                <div class="layui-input-block">
                    <button class="layui-btn" lay-submit="" lay-filter="changeUser">立即提交</button>
                    <button type="reset" class="layui-btn layui-btn-primary">重置</button>
                </div>
            </div>
        </form>
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

    <script type="text/javascript" src="/Public/Admin/js/user.js"></script>
    <script>
        $(function () {
            // 删除单条
            $(".js-delete-one").click(function () {
                var id = $(this).attr("data-id");

                leaf.confirm("您确定要删除吗？", function () {
                    // 把id填充到form表单中
                    $("#js-delete-form input[name='id']").val(id);

                    // 提交表单
                    $("#js-delete-form").submit();
                });
            });

            // 多条删除
            $(".js-delete").click(function () {
                var ids = [];
                var checkboxList = $(".ids:checked"); // 取到已选中的项

                for (var i = 0; i < checkboxList.length; i++) {
                    ids.push($(checkboxList[i]).val());
                }

                if (ids.length == 0) {
                    leaf.toast("请选择你要删除的数据！");
                    return;
                }

                leaf.confirm("你确定要删除吗？", function () {
                    // 把id填充到form表单中
                    $("#js-delete-form input[name='id']").val(ids.toString());

                    // 提交表单
                    $("#js-delete-form").submit();
                });
            });

            // 实现全选影响下面复选框的选中效果
            $(".js-select-all").click(function () {
                $(".ids").prop("checked", $(this).prop('checked'));
            });

            // 实现单个选择影响上方复选框的选中效果
            $('.ids').click(function () {
                $('.js-select-all').prop('checked', $('.ids:not(:checked)').length == 0);
            });

        })

    </script>


</body>
</html>