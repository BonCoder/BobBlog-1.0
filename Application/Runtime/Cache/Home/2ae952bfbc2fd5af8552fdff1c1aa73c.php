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
    
    <link rel="stylesheet" href="/Public/Home/static/share/dist/css/share.min.css">
    <link rel="stylesheet" href="/Public/Home/static/share/demo/life.css">
    <link rel="stylesheet" href="/Public/Home/static/share/default.css">
    <link rel="stylesheet" href="/Public/Home/static/highlight/styles/agate.css">
    <style>
        .w-e-text pre code {  background: #333;}
    </style>


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
        
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3 class="post-title">
                    <a href="<?php echo U('Post/detail',array('id'=>$post['id']));?>" title="<?php echo ($post["title"]); ?>"><?php echo ($post["title"]); ?></a>
                </h3>
                <div class="post-meta">
                    <span class="ion-calendar">
                        <span class="post-meta-color"> <?php echo date("Y-m-d",strtotime($post['created_at'])); ?></span>&emsp;
                    </span>
                    <a href="javascript:;" style="color:#777" class="ion-heart" id="like_num">
                        <span class="post-meta-color"> <?php echo ($post["like_num"]); ?></span>&emsp;
                    </a>
                    <span class="ion-eye">
                        <span class="post-meta-color"> <?php echo ($post["read_count"]); ?></span>&emsp;
                    </span>
                    <span class="ion-ios-pricetags-outline">
                        <span class="post-meta-color"> <?php echo ($post["category_name"]); ?> </span>&emsp;
                    </span>
                </div>
                <div style="margin-top: -8px;">&nbsp;</div>
                <div class="post-content w-e-text">
                        <?php echo (htmlspecialchars_decode($post["content"])); ?>
                </div>
                <footer class="blog-post-page-tags">
                    <span style="font-size: 16px">标签:</span>
                    <?php if(is_array($postTabs)): foreach($postTabs as $key=>$tabs): ?><a href="<?php echo U('Post/tab',array('id'=>$tabs['id']));?>" rel="tag" data-toggle="tooltip"
                           data-placement="top" title="" class="tag-could tag-could<?php echo ($tabs["class_tab"]); ?>"
                           data-original-title="Linux" target="_blank" pram="<?php echo ($tabs["id"]); ?>"><?php echo ($tabs["tab_name"]); ?></a><?php endforeach; endif; ?>
                </footer>
                <div class="money-like" id="like-money">
                    <div class="reward-button">赏
                        <span class="money-code">
								<span class="alipay-code">
									<img class="alipay-img" src="/Public/Home/images/alipay.png"><b>支付宝扫码打赏</b>
								</span>
                                <span class="alipay-code" style="margin-left: 20px;">
									<img class="alipay-img" src="/Public/Home/images/weixin.png"><b>微信扫码打赏</b>
								</span>
                            <span class="alipay-code" style="margin-left: 20px;">
									<img class="alipay-img" src="/Public/Home/images/qq.png"><b>财付通扫码打赏</b>
								</span>
							</span>
                    </div>
                    <p class="money-notice">若你觉得我的文章对你有帮助,欢迎点击上方按钮对我打赏</p>
                </div>
                <div align="center">
                    <img class="webcode" src="/Public/Home/images/www.bobcoder.cc.png"><br>
                    <b>扫描二维码，分享此网站</b>
                </div>
            </div>
        </div>
        <p class="tags">分享至：</p>
        <div class="social-share" data-sites="qq,qzone,wechat,weibo,douban"
             data-wechat-qrcode-title="请打开微信扫一扫">
        </div>

        <!--上一页，下一页-->
        <div id="pre-page">
            <span>
                <span style="color: #333">上一篇：&nbsp;</span>
                <a href="<?php if($postPre){echo $postPre['id'];}else{echo 'javascript:;';}?>" rel="prev">
                    <?php if($postPre){echo $postPre['title'];}else{echo '无';}?>
                </a>
            </span>
            <span>
                <span style="color: #333">下一篇：&nbsp;</span>
                <a href="<?php if($postNext){echo U('Post/detail',array('id'=>$postNext['id']));}else{echo 'javascript:;';}?>"
                   rel="prev">
                    <?php if($postNext){echo $postNext['title'];}else{echo '无';}?>
                </a>
            </span>
            <a href="javascript:;">&emsp;</a>
        </div>
        <!--PC和WAP自适应版-->
        <div id="SOHUCS" sid="<?php echo ($post["id"]); ?>" ></div>

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

    <script src="/Public/Home/static/share/src/js/jquery.share.js"></script>
    <script src="/Public/Home/static/share/src/js/jquery.qrcode.min.js"></script>
    <script src="/Public/Home/static/highlight/highlight.pack.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <script type="text/javascript">
        (function(){
            var appid = 'cyt71qrx0';
            var conf = 'prod_1530361e2ba8b157ffe4d6fd31d125ba';
            var width = window.innerWidth || document.documentElement.clientWidth;
            if (width < 960) {
                window.document.write('<script id="changyan_mobile_js" charset="utf-8" type="text/javascript" src="https://changyan.sohu.com/upload/mobile/wap-js/changyan_mobile.js?client_id=' + appid + '&conf=' + conf + '"><\/script>'); } else { var loadJs=function(d,a){var c=document.getElementsByTagName("head")[0]||document.head||document.documentElement;var b=document.createElement("script");b.setAttribute("type","text/javascript");b.setAttribute("charset","UTF-8");b.setAttribute("src",d);if(typeof a==="function"){if(window.attachEvent){b.onreadystatechange=function(){var e=b.readyState;if(e==="loaded"||e==="complete"){b.onreadystatechange=null;a()}}}else{b.onload=a}}c.appendChild(b)};loadJs("https://changyan.sohu.com/upload/changyan.js",function(){window.changyan.api.config({appid:appid,conf:conf})}); } })(); </script>
    <script>
        document.styleSheets[0].addRule('.line', 'width: 720px');
        $('.big-container').attr('id', 'main');
        // 点赞
        $('#like_num').click(function () {
            var id = '<?php echo ($post["id"]); ?>';
            $.ajax({
                url: "<?php echo U('Post/like');?>",
                type: "post",
                data: {'id': id},
                dataType: 'json',
                success: function (data) {
                    if (data.status == 200) {
                        $('#like_num').css('color', '#53d572');
                        $('#like_num').children('span').html(data.like_num);
                    }
                },
                error: function () {
                    //todo
                }
            });
        });
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