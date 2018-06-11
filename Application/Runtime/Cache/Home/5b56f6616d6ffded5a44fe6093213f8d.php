<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!--<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">-->
    <title><?php echo ($title); ?>--Bob的博客|技术博客|个人博客</title>
    <link rel="Shortcut Icon" href="/Public/Home/images/logo3.png">
    <meta name="description" content="Bob的博客是一个关注网站建设、网络推广、Html5+css3、Java、PHP、Mysql等技术分享的博客,提供博主在学习成果和工作中经验总结，是一个互联网从业者值得收藏的网站。"/>
    <meta name="keywords" content="Bob的博客,Linux,Windows,bobcoder,个人主页,php,java,技术博客,个人博客,mysql,nginx,svn,Bob"/>
    <meta name="generator" content="Typecho 1.0/14.10.10"/>
    <link rel="stylesheet" href="/Public/Home/css/calendar.css">
    <link rel="stylesheet" href="/Public/Home/css/bootstrap.min.css?2">
    <link rel="stylesheet" href="/Public/Home/css/material.min.css?1">
    <link rel="stylesheet" href="/Public/Home/css/ripples.min.css?1">
    <link rel="stylesheet" href="/Public/Home/css/roboto.min.css?1">
    <link rel="stylesheet" href="/Public/Home/css/customs.css?1">
    <link rel="stylesheet" href="/Public/Home/static/share/demo/life.css">
    <link rel="stylesheet" href="/Public/Home/static/ionicons/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/Public/Admin/static/layui/css/layui.css">
    <script src="//msite.baidu.com/sdk/c.js?appid=1582923272386365"></script>
    

    

</head>
<body>
<header>

    <div class="navbar navbar-fixed-top navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" id="logo" href="javascript:;">Bob 的博客</a>
            </div>
            <div class="navbar-collapse collapse navbar-responsive-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo U('Index/Entrance');?>" title="欢迎页">
                            <span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('Post/index',array('id'=>-1));?>" title="首页"> Bob 的博客</a>
                    </li>
                    <?php if(is_array($categories)): foreach($categories as $key=>$category): ?><li>
                            <a href="<?php echo U('Post/index',array('id'=>$category['id']));?>" title="<?php echo ($category["name"]); ?>"><?php echo ($category["name"]); ?></a>
                        </li><?php endforeach; endif; ?>
                    <li>
                        <a href="<?php echo U('Tool/index');?>" title="工具"> 工具</a>
                    </li>
                    <li>
                        <a href="<?php echo U('Apply/index');?>" title="申请互链"> 申请互链</a>
                    </li>
                    <!--<li>-->
                    <!--<a href="<?php echo U('Index/index');?>" title="留言板">-->
                    <!--留言板-->
                    <!--</a>-->
                    <!--</li>-->
                </ul>
                <!--<ul class="nav navbar-nav navbar-right">-->
                <!--<li><a href="javascript:;">登录</a></li>-->
                <!--<li><a href="javascript:;">注册</a></li>-->
                <!--</ul>-->
            </div>
        </div>
    </div>
</header>

<!---->

<?php if($status == -1): ?><div class="layui-carousel" id="test2" style="margin-top: 61px;margin-bottom: -50px;">
    <div carousel-item="">
        <li><a href="#"><img src="/Public/Home/images/banner1.png" ></a></li>
        <li><a href="#"><img src="/Public/Home/images/banner2.png" ></a></li>
        <li><a href="#"><img src="/Public/Home/images/banner3.jpg" ></a></li>
    </div>
</div><?php endif; ?>
<div class="container big-container" id="main">
    <div class="row">
        
<div class="rows">
<div class="col-md-9">
	<div class="panel panel-default">
		<div class="panel panel-sm">
			<div class="panel-heading clearfix">
				<label><i class="fa fa-bookmark"></i> 二维码生成</label>
			</div>
			<form action="" class="form-horizontal panel-body" id="form1" method="post">
				<ul class="nav nav-tabs nav-tabs-sm" role="tablist" id="mytabs">
					<li role="presentation" class="active">
						<a href="http://www.bobcoder.cc" role="tab" data-toggle="tab" id="tab1" aria-controls="pane1"><strong>QRCode Generator</strong></a>
					</li>
				</ul>
				<div class="tab-content" style="padding-top: 15px;">
					<div role="tabpanel" class="tab-pane fade in active" id="pane1" aria-labelledby="tab1">
						<div class="form-group form-group-sm">
							<label class="control-label col-md-2">二维码内容</label>
							<div class="col-md-10">
								<textarea name="txtContent" id="txtContent" rows="2" class="form-control input-normal" placeholder="http://www.bobcoder.cc"></textarea>
							</div>
						</div>

						<div class="form-group form-group-sm">
							<label class="control-label col-md-2">二维码图像</label>
							<div class="col-md-10">
								<div id="qrcode"></div>
								<p class="m-top-10 text-muted">使用手机扫一扫</p>
							</div>
						</div>
						
						<div class="form-group form-group-sm">
							<div class="col-md-10 col-md-offset-2">
								<p class="form-control-static text-danger" id="tips"></p>
							</div>
						</div>
					</div>
				</div>
				<hr class="sm">
				<div class="btn-footer">
					<button name="btnCreate" class="btn btn-success" type="button" onClick="f_onCreateQrcode();" title="将根据您填写的内容生成二维码图像">开始生成</button>
					<button name="btnClear" class="btn btn-default" type="button" onClick="f_onClearQrcode();" title="清除">清除</button>
				</div>
			</form>    
		</div>
	</div>
	</div>
	<!--/主体内容-->
</div>


        <div class="col-md-3">
            <form method="post" action="<?php echo U('Post/search');?>" class="panel-body">
                <div class="input-group">
                    <div class="form-control-wrapper">
                        <input type="text" name="keyword" class="form-control" placeholder="搜索"
                               size="32"/>
                    </div>
                    <span class="input-group-btn">
                        <button class="btn btn-primary btn-fab btn-raised mdi-action-search" value="" id="search-btn"
                                type="submit">
                        </button>
                    </span>
                </div>
            </form>
            <!--<div id="calendar" class="calendar" ></div>-->
            <br>
            <div class="panel panels panel-info ">
                <a class="panel-heading" onclick="$('.user_info').slideToggle()" href="javascript:;">
                    <h3 class="panel-title">Bob`S BLOG</h3>
                </a>
                <div class="user_info">
                <div class="blog-sidebar-logo">
                    <img src="<?php echo ($logo_url); ?>">
                </div>
                <div class="blog-sidebar-count blog-sidebar-padding">
                    <div class="blog-sidebar-count-left">
                        <p class="blog-sidebar-count-p"><?php echo ($countPost); ?></p>
                        <span class="blog-sidebar-count-span">文章</span>
                    </div>
                    <div class="blog-sidebar-count-right">
                        <p class="blog-sidebar-count-p"><?php echo ($countTab); ?></p>
                        <span class="blog-sidebar-count-span">标签</span>
                    </div>
                    <div style="clear: both;"></div>
                        <span style="font-weight: bolder;font-size: 16px;">自我介绍：</span>
                    <p><?php echo ($myself); ?></p>
                    <div style="margin: 10px 0;">
                        <span style="font-weight: bolder;font-size: 16px;">座右铭：</span>
                    <p><?php echo ($motto); ?></p>
                    </div>
                    <p style="padding-bottom: 20px">
                        <span style="font-weight: bolder;font-size: 16px;">联系方式：</span><br>
                        <span style="padding-left: 20px">QQ : <?php echo ($qq); ?></span><br>
                        <span style="padding-left: 20px">微信号 : <?php echo ($weixin); ?></span><br>
                        <span style="padding-left: 20px">邮箱 : <?php echo ($email); ?></span><br>
                    </p>
                </div>
                </div>
            </div>
            <div class="panel panel-info">
                <a class="panel-heading" onclick="$('.recent_posts_box').slideToggle()" href="javascript:;">
                    <h3 class="panel-title">最新文章</h3>
                </a>
                <div class="recent_posts_box">
                    <?php if(is_array($latestPosts)): foreach($latestPosts as $key=>$latestPost): ?><a href="<?php echo U('Post/detail',array('id'=>$latestPost['id']));?>"
                           class="item"><?php echo ($latestPost["title"]); ?></a><?php endforeach; endif; ?>
                </div>
            </div>
            <div class="panel panel-info">
                <a class="panel-heading" onclick="$('.hot_posts_box').slideToggle()" href="javascript:;">
                    <h3 class="panel-title">热门文章</h3>
              </a>
                <div class="hot_posts_box">
                    <?php if(is_array($hotsPosts)): foreach($hotsPosts as $key=>$hotsPosts): ?><a href="<?php echo U('Post/detail',array('id'=>$hotsPosts['id']));?>"
                           class="item"><?php echo ($hotsPosts["title"]); ?></a><?php endforeach; endif; ?>
                </div>
            </div>
            <div class="panel panel-info">
                <a class="panel-heading" onclick="$('.blog-sidebar-tags').slideToggle()" href="javascript:;">
                    <h3 class="panel-title">标签云</h3>
                </a>
                <div class="blog-sidebar-tags">
                    <ul class="blog-sidebar-tags-ul blog-sidebar-padding">
                        <?php if(is_array($Tabs)): foreach($Tabs as $key=>$tab): ?><li><a href="<?php echo U('Post/tab',array('id'=>$tab['id']));?>"
                                   class="tag-could tag-could<?php echo ($tab["class_tab"]); ?>" data-toggle="tooltip"
                                   data-placement="top" title="" data-original-title="CSS"><?php echo ($tab["tab_name"]); ?></a></li><?php endforeach; endif; ?>
                    </ul>
                </div>
            </div>

        </div>
        <!--返回顶部-->
        <div id="elevator_item">
            <a id="elevator" onclick="return false;" title="回到顶部"></a>
            <a class="qr"></a>
            <div class="qr-popup">
                <a class="code-link"><img class="code" src="/Public/Home/images/wx.jpg"/></a>
                <span>加作者为微信好友</span>
                <div class="arr"></div>
            </div>
        </div>
    </div>
</div>
<footer>
    <center class="footer-bottom">
        <div class="">
        <ul class="footer-nav" style="width: 1200px;">
            <li><h3 class="panel-title">友情链接:</h3></li>
        <?php if(is_array($link)): foreach($link as $key=>$line): ?><li style="margin: 5px"><a  class="item" href="<?php echo ($line["line_url"]); ?>" title="<?php echo ($line["line_name"]); ?>" target="_blank"><?php echo ($line["line_name"]); ?></a></li><?php endforeach; endif; ?>
        </ul>
        </div>
        <li style="text-align: center;font-size: 18px">博客已运行<span id="elapseClock"></span><span class="my-face">(●'◡'●)ﾉ♥</span>
            <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1263146966'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s22.cnzz.com/z_stat.php%3Fid%3D1263146966%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>        </li>
        <div class="container">
            <ul class="footer-nav">
                <li>Copyright <span rel="nofollow">2017</span></li>
                <li>Bob 的博客</li>
                <li><span rel="nofollow">蜀ICP备17022542号-1</span></li>
            </ul>
        </div>
    </center>
    </div>
</footer>
<script src="/Public/Home/js/jquery-2.1.4.min.js"></script>
<script src="/Public/Home/js/bootstrap.min.js"></script>
<script src="/Public/Home/js/material.min.js"></script>
<script src="/Public/Home/js/ripples.min.js"></script>
<script src="/Public/Home/js/jquery.scrollUp.min.js"></script>
<script src="/Public/Home/js/calendar.js"></script>
<script type="text/javascript" charset="utf-8" src="/Public/Admin/static/layui/layui.js"></script>

    <!-- Recommended Script Positioning -->
    <script src="js/modernizr-2.8.3.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/Public/Home/js/qrcode.min.js"></script>
    <script type="text/javascript">
        //二维码内容
        var txtContent = document.getElementById("txtContent"), tips = $("#tips");

        // 设置 qrcode 参数
        var qrcode = new QRCode('qrcode', {
            text: 'www.bobcoder.cc',
            width: 256,
            height: 256,
            colorDark: '#000000',
            colorLight: '#ffffff',
            correctLevel: QRCode.CorrectLevel.H
        });

        //生成二维码图像
        function f_onCreateQrcode() {
            if (!txtContent) {
                return false;
            } else {
                if (!txtContent.value) {
                     tips.html("！请填写<strong>二维码内容</strong>再提交生成");
                } else {
                    // 使用 API
                    qrcode.clear();
					tips.empty();
                    qrcode.makeCode(txtContent.value);
                }
                return false;
            }
        }

        //清除二维码内容
        function f_onClearQrcode() {
            if (txtContent) {
                txtContent.value = "www.bobcoder.cc";
                // 使用 API
                qrcode.clear();
                qrcode.makeCode('请输入二维码内容再生成图像');
            }
        }
    </script>


<script>
    // 第一种 判断屏幕尺寸
    if (screen && screen.width > 880) {
        document.write('<script src="/Public/Home/js/canvas-nest.min.js"><\/script>');
        document.write('<script src="/Public/Home/js/L_slide.js"><\/script>');
    }else if (screen && screen.width < 880) {
        $("#cnzz_stat_icon_1263146966").css('display','none');

    }
</script>
<script>
//    if (screen && screen.width > 880) {
        function timeElapse(date){
            var current =new Date();
            var seconds = (Date.parse(current) - Date.parse(date)) / 1000;
            var days = Math.floor(seconds / (3600 * 24));
            seconds = seconds % (3600 * 24);
            var hours = Math.floor(seconds / 3600);
            if (hours < 10) {
                hours = "0" + hours;
            }
            seconds = seconds % 3600;
            var minutes = Math.floor(seconds / 60);
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            seconds = seconds % 60;
            if (seconds < 10) {
                seconds = "0" + seconds;
            }
            var result = "<span class=\"digit\">" + days + "</span> 天 <span class=\"digit\">" + hours + "</span> 小时 <span class=\"digit\">" + minutes + "</span> 分 <span class=\"digit\">" + seconds + "</span> 秒";
            $("#elapseClock").html(result);
        }
        var data = "2017-05-26 09:58:05";
        timeElapse(data);
        setInterval(function () {
            timeElapse(data);
        }, 500);
//    }
</script>
<script type="text/javascript">
    if (screen && screen.width > 880) {
        $(function () {
            $(window).scroll(function () {
                var scrolltop = $(this).scrollTop();
                if (scrolltop >= 200) {
                    $("#elevator_item").show();
                } else {
                    $("#elevator_item").hide();
                }
            });
            $("#elevator").click(function () {
                $("html,body").animate({scrollTop: 0}, 500);
            });
            $(".qr").hover(function () {
                $(".qr-popup").show();
            }, function () {
                $(".qr-popup").hide();
            });
        });
    }
</script>
<script>
    //百度自动推送
    (function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
    //360自动推送
    (function(){
        var src = (document.location.protocol == "http:") ? "http://js.passport.qihucdn.com/11.0.1.js?68e5c3e7d45eee77d13667c54433b181":"https://jspassport.ssl.qhimg.com/11.0.1.js?68e5c3e7d45eee77d13667c54433b181";
        document.write('<script src="' + src + '" id="sozz"><\/script>');
    })();
</script>
<script>
    layui.use(['carousel', 'form'], function(){
        var carousel = layui.carousel
            ,form = layui.form;
        //改变下时间间隔、动画类型、高度
        //建造实例
        carousel.render({
            elem: '#test2'
            ,width: '100%' //设置容器宽度
            ,height: '360px'
            ,arrow: 'always' //始终显示箭头
            ,interval: 3000
            //,anim: 'updown' //切换动画方式
        });
    });
</script>
</body>
</html>