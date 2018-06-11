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
    

    
    <style>
     .layui-layedit{ width: 800px;}
     #inputTitle{ width: 500px;}
     #inputCategory{ width: 100px;}
     #inputTags{ width: 300px;}
    </style>
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <?php echo ($meta_title); ?>
                <small>填写文章信息</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('admin') }}"><i class="fa fa-dashboard"></i> 首页</a></li>
                <li><a href="<?php echo U('Post/lists');?>">文章管理</a></li>
                <li class="active"><?php echo ($meta_title); ?></li>
            </ol>
        </section>

        <section class="content">
            <div class="box box-primary">
                <form role="form" action="<?php echo U('Post/create');?>" id="js-post-submit" method="post">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputTitle">标题</label>
                            <input type="text" name="title" class="form-control" id="inputTitle" value="<?php echo ($title); ?>">
                            <p class="help-block">请输入标题，字数在2－20之间</p>
                        </div>
                        <!--<div class="form-group">-->
                        <!--<label for="inputAuthor">作者</label>-->
                        <!--<input type="text" name="author" class="form-control " id="inputAuthor" value="<?php echo ($author); ?>">-->
                        <!--<p class="help-block">请输入作者，字数在2－20之间</p>-->
                        <!--</div>-->
                        <div class="form-group">
                            <label for="inputCategory">文章分类</label>
                            <select id="inputCategory" class="form-control" name="category_id">
                                <?php if(is_array($categories)): foreach($categories as $key=>$category): if($category["id"] == $category_id): ?><option value="<?php echo ($category["id"]); ?>" selected="selected"><?php echo ($category["name"]); ?></option>
                                        <?php else: ?>
                                        <option value="<?php echo ($category["id"]); ?>"><?php echo ($category["name"]); ?></option><?php endif; endforeach; endif; ?>
                            </select>
                            <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                            <label for="inputTags">标签</label><br/>
                            <select id="inputTags" class="form-control tags" name="tags[]" multiple="multiple">
                                <?php if(is_array($tabs)): foreach($tabs as $key=>$tabs): ?><option value="<?php echo ($tabs["id"]); ?>"><?php echo ($tabs["tab_name"]); ?></option><?php endforeach; endif; ?>
                            </select>
                                    <p class="help-block"></p>
                        </div>

                        <div class="form-group">
                            <label>阅读数</label>
                            <div class="input-group">
                                <div class="input-group">
                                    <span class="input-group-btn read-count-dec">
                                        <button type="button" class="btn btn-primary">-</button>
                                    </span>
                                    <input style="width: 100px; text-align: center;" type="text"
                                           name="read_count" value="<?php echo ($read_count); ?>" class="form-control rate initialized"
                                           placeholder="浏览数">
                                    <span class="input-group-btn read-count-inc">
                                        <button type="button" class="btn btn-success">+</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>点赞数</label>
                            <div class="input-group">
                                <div class="input-group">
                                    <span class="input-group-btn like-num-dec">
                                        <button type="button" class="btn btn-primary">-</button>
                                    </span>
                                    <input style="width: 100px; text-align: center;" type="text"
                                           name="like_num" value="<?php echo ($like_num); ?>" class="form-control rate initialized"
                                           placeholder="点赞数">
                                    <span class="input-group-btn like-num-inc">
                                        <button type="button" class="btn btn-success">+</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>状态</label>
                            <div>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="status" checked value="1">正常
                                    </label>
                                </div>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="status" value="0">禁用
                                    </label>
                                </div>
                            </div>
                            <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                            <label>首页显示</label>
                            <div>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="homepage" checked value="1">正常
                                    </label>
                                </div>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="homepage" value="0">禁用
                                    </label>
                                </div>
                            </div>
                            <p class="help-block"></p>
                        </div>
                        <div class="form-group">
                            <lable for="ck-editor"><b>内容</b></lable>
                            <div id="textarea-content">
                                <textarea name="content" style="display: none" >
                                </textarea>
                                <div id="editor" style="width: 800px;">
                                    <?php echo (htmlspecialchars_decode($content)); ?>
                                </div>
                            </div>
                            <p class="help-block">请添加文章内容</p>
                        </div>
                    </div>

                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?php echo ($id); ?>"/>
                        <button class="layui-btn layui-btn-warm js-btn-submit">提交</button>
                    </div>
                </form>
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

    <!--<script type="text/javascript" charset="utf-8" src="/Public/Admin/static/ueditor/lang/zh-cn/zh-cn.js"></script>-->
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/static/adminlte/plugins/select2/select2.full.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/Admin/static/layui/layui.js"></script>
    <script src="/Public/Admin/static/wangeditor/release/wangEditor.js"></script>
    <script type="text/javascript">
        var E = window.wangEditor;
        var editor = new E('#editor');         // 或者 var editor = new E( document.getElementById('#editor') )
        editor.customConfig.uploadImgServer = '/Admin/Post/uploadImg';
        editor.customConfig.uploadFileName = 'upload';
        editor.create();
    </script>
    <script>
//        var face = [];
//        for (var i=1;i<=15;i++){
//            face.push("{src: '/Public/Admin/emj/line/"+i+".gif', alt: '["+i+"]'}")
//        }
//        alert(face.toString());
        document.styleSheets[0].addRule('.line', 'width: 720px');
        layui.use(['form','layedit','upload'], function(){
            var layedit = layui.layedit
                ,$ = layui.jquery;
            layedit.set({
                uploadImage: {
                    url: '/Admin/Post/uploadImg' //接口url
                    ,type: 'post' //默认post
                }
            });
            $('.site-demo-layedit').on('click', function(){
                var type = $(this).data('type');
                active[type] ? active[type].call(this) : '';
            });
            //自定义工具栏
//            layedit.build('LAY_demo2', {
//                tool: [
//                    'strong' //加粗
//                    ,'italic' //斜体
//                    ,'underline' //下划线
//                    ,'del' //删除线
//                    ,'|' //分割线
//                    ,'left' //左对齐
//                    ,'center' //居中对齐
//                    ,'right' //右对齐
//                    ,'|' //分割线
//                    ,'link' //超链接
//                    ,'unlink' //清除链接
//                    ,'face' //表情
//                    ,'code' //代码
//                    ,'image' //插入图片
//                    ,'yulan' //预览
//                ]
//                ,height: 500
//            })
        });
    </script>


    <script>
            // 提交表单
         $(".js-btn-submit").click(function () {
                var content = $(".w-e-text").html();
                // 把content填充到form表单中
                $("#js-post-submit textarea[name='content']").val(content);
                // 提交表单
                $("#js-post-submit").submit();
            });


        $("#inputTags").select2({
            tags: true,
            maximumSelectionLength: 5 //最多能够选择的个数
        });
        if('<?php echo ($postTab); ?>' != ''){
            var tabarry = '<?php echo ($postTab); ?>'.split(',');
            $('#inputTags').select2().val(tabarry).trigger('change');
        }
//        var ue = UE.getEditor('editor');
//        CKEDITOR.replace('ck-editor',{extraPlugins: 'codesnippet',codeSnippet_theme: 'zenburn'});

        // 错误提示信息
        if ('<?php echo (cookie('errors')); ?>' != '') {
            var errors = '<?php echo (cookie('errors')); ?>';
            errors = JSON.parse(errors);
            if ('title' in errors) {
                $('#inputTitle').parent().addClass('has-error');
                $('#inputTitle').next().html(errors.title);
            }
            if ('content' in errors) {
                $('#textarea-content').parent().addClass('has-error');
                $('#textarea-content').next().html(errors.content);
            }
        }

        // 状态回显
        if ('<?php echo ($status); ?>' != '') {
            $("input[type='radio'][name='status']").each(function () {
                if ($(this).val() == '<?php echo ($status); ?>') {
                    $(this).attr("checked", "checked");
                }
            });
        }

        // 阅读数自增自减
        $('.read-count-dec').click(function () {
            var readNum = $("input[name='read_count']").val();
            if (isNaN(readNum)) {
                readNum = 0;
            }
            if (readNum > 1) {
                readNum = parseInt(readNum) - 1;
                $(this).next().val(readNum);
            } else {
                $(this).next().val(1);
            }
        });
        $('.read-count-inc').click(function () {
            var readNum = $("input[name='read_count']").val();
            if (readNum==='') {
                $(this).prev().val(1);
            }else{
                readNum = parseInt(readNum) + 1;
                $(this).prev().val(readNum);
            }
        });

        // 点选数自增自减
        $('.like-num-dec').click(function () {
            var likeNum = $(this).next().val();
            if (isNaN(likeNum)) {
                likeNum = 0;
            }
            if (likeNum > 1) {
                likeNum = parseInt(likeNum) - 1;
                $(this).next().val(likeNum);
            } else {
                $(this).next().val(1);
            }
        });
        $('.like-num-inc').click(function () {
            var likeNum = $(this).prev().val();
            if (likeNum==='') {
                $(this).prev().val(1);
            }else{
                likeNum = parseInt(likeNum) + 1;
                $(this).prev().val(likeNum);
            }
        });

    </script>


</body>
</html>