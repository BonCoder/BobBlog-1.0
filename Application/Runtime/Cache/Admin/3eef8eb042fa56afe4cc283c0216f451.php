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
                <small>标签管理</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="javascript:;"><i class="fa fa-dashboard"></i> 首页</a></li>
                <li class="active"> 文章管理</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form action="<?php echo U();?>" method="get">
                        <div class="box box-default">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <input type="text" name="name" value="<?php echo ($keyword); ?>" class="form-control"
                                               placeholder="标签名称">
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="">
                                            <button type="submit" class="btn btn-default">
                                                <span class="glyphicon glyphicon-search"></span> 搜索
                                            </button>
                                            <a href="<?php echo U('PostTab/lists');?>" class="btn btn-default">
                                                <span class="glyphicon glyphicon-repeat"></span>清空
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php if(!empty($_COOKIE['successMsg'])): ?><div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <?php echo (cookie('successMsg')); ?>
                        </div><?php endif; ?>
                    <?php if(!empty($_COOKIE['errorMsg'])): ?><div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <?php echo (cookie('errorMsg')); ?>
                        </div><?php endif; ?>

                    <div class="box">
                        <div class="box-header">
                            <a href="<?php echo U('PostTab/create');?>" class="btn btn-primary"><span
                                    class="glyphicon glyphicon-plus"></span> 新增</a>
                            <a href="javascript:;" class="js-delete btn btn-default">
                                <span class="glyphicon glyphicon-trash text-danger"></span>删除
                            </a>
                            <form id="js-delete-form" method="post" action="<?php echo U('PostTab/delete');?>"
                                  style="display: none">
                                <input type="text" name="id" value="">
                            </form>
                        </div>

                        <div class="box-body table-responsive no-padding">
                            <table class="table table-hover">
                                <tbody>
                                <tr>
                                    <th class="text-center"><input class="js-select-all" type="checkbox"></th>
                                    <th class="col-md-1 text-center">ID</th>
                                    <th class="col-md-2 text-center">标签名称</th>
                                    <th class="col-md-1 text-center">关联文章(篇)</th>
                                    <th class="col-md-2 text-center">添加时间</th>
                                    <th class="col-md-2 text-center">修改时间</th>
                                    <th class="text-center">操作</th>
                                </tr>

                                <?php if(is_array($postTabs)): foreach($postTabs as $key=>$postTab): ?><tr>
                                        <td class="text-center"><input class="ids" type="checkbox"
                                                                       value="<?php echo ($postTab["id"]); ?>"></td>
                                        <td class="text-center"><?php echo ($postTab["id"]); ?></td>
                                        <td class="text-center"><?php echo ($postTab["tab_name"]); ?></td>
                                        <td class="text-center"><?php echo ($postTab["count"]); ?></td>
                                        <td class="text-center"><?php echo ($postTab["created_at"]); ?></td>
                                        <td class="text-center"><?php echo ($postTab["updated_at"]); ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo U('PostTab/create', array('id'=>$postTab['id']));?>"
                                               class="glyphicon glyphicon-pencil operation" title="编辑">
                                            </a>
                                            <a data-id="<?php echo ($postTab["id"]); ?>"
                                               class="js-delete-one glyphicon glyphicon-trash operation text-danger"
                                               title="删除" href="javascript:;">
                                            </a>
                                        </td>
                                    </tr>
                                    </tr><?php endforeach; endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!--分页-->
                    <div class="box-tools pull-right">
                        <ul class="pagination inline">
                            <?php echo ($pagination); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
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