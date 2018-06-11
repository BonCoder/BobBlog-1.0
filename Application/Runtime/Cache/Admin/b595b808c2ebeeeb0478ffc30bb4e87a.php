<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台登录-BobCoder</title>
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/Public/Admin/css/font.css">
    <link rel="stylesheet" href="/Public/Admin/css/xadmin.css">
    <link rel="stylesheet" href="/Public/Admin/static/layui/css/layui.css">
    <script src="/Public/Admin/js/jquery-2.1.4.min.js"></script>
    <script src="/Public/Admin/static/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/Public/Admin/js/xadmin.js"></script>
    <script src="/Public/Admin/static/layer/layer.js"></script>

</head>
<body class="login-bg">

<div class="login">
    <div class="message">BobCoder-管理登录</div>
    <div id="darkbannerwrap"></div>

    <form method="post" class="layui-form" >
        <input name="log_name" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
        <hr class="hr15">
        <input name="log_password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
        <hr class="hr15">
        <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
        <hr class="hr20" >
    </form>
</div>
<?php if($error != null): ?><script>
    layui.use('form', function(){
        layer.msg("<?php echo ($error); ?>")
    })
    </script><?php endif; ?>

<script>
    $(function  () {
        layui.use('form', function(){
            var form = layui.form;
//            layer.msg('玩命卖萌中', function(){
//                //关闭后的操作
//            });
            //监听提交
            form.on('submit(login)', function(data){
                location.href='/Admin/Index/index'
                return true;
            });
        });
    })
</script>

</body>
</html>