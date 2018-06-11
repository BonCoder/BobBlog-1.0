/*
Navicat MySQL Data Transfer

Source Server         : RDS
Source Server Version : 50718
Source Host           : bobcoder.mysql.rds.aliyuncs.com:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50718
File Encoding         : 65001

Date: 2018-06-11 11:19:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for apply_friend
-- ----------------------------
DROP TABLE IF EXISTS `apply_friend`;
CREATE TABLE `apply_friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(100) DEFAULT NULL COMMENT '网站名称',
  `email` varchar(100) DEFAULT NULL COMMENT '邮箱',
  `website` varchar(200) DEFAULT NULL COMMENT '网站地址',
  `ip` varchar(30) DEFAULT NULL COMMENT 'ip',
  `content` tinytext COMMENT '网站简介',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of apply_friend
-- ----------------------------
INSERT INTO `apply_friend` VALUES ('35', 'Bob', 'bob@bobcoder.cc', 'https://www.bobcoder.cc', '125.71.110.104', '123', '2017-10-22 21:43:24');


-- ----------------------------
-- Table structure for dim_post_tab
-- ----------------------------
DROP TABLE IF EXISTS `dim_post_tab`;
CREATE TABLE `dim_post_tab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` int(11) NOT NULL COMMENT '文章id',
  `t_id` int(11) NOT NULL COMMENT '标签id',
  `createTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=405 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dim_post_tab
-- ----------------------------


-- ----------------------------
-- Table structure for friend_line
-- ----------------------------
DROP TABLE IF EXISTS `friend_line`;
CREATE TABLE `friend_line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `line_name` varchar(100) DEFAULT NULL COMMENT '友情链接名称',
  `line_url` varchar(100) DEFAULT NULL COMMENT '友情链接地址',
  `userid` int(11) DEFAULT NULL COMMENT '录入人员',
  `createTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1:启用 0:禁用',
  `email` varchar(50) DEFAULT NULL COMMENT '站长邮箱',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COMMENT='友情链接';

-- ----------------------------
-- Records of friend_line
-- ----------------------------
INSERT INTO `friend_line` VALUES ('1', 'Bob`S BLOG', 'https://www.bobcoder.cc/', '1', '2017-09-28 21:31:48', '2017-08-10 14:16:07', '1', 'bob@bobcoder.cc');

-- ----------------------------
-- Table structure for post
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `user_id` int(11) NOT NULL DEFAULT '1' COMMENT '作者id',
  `author` varchar(32) NOT NULL DEFAULT '' COMMENT '作者',
  `category_id` int(11) NOT NULL DEFAULT '0' COMMENT '文章分类',
  `content` longtext NOT NULL COMMENT '文章内容',
  `status` int(4) NOT NULL DEFAULT '1' COMMENT '1显示 0不显示',
  `read_count` int(11) NOT NULL DEFAULT '1' COMMENT '阅读数',
  `like_num` int(11) NOT NULL DEFAULT '1' COMMENT '点赞数',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '修改时间',
  `pushs` int(11) NOT NULL DEFAULT '0' COMMENT '推送次数',
  `homepage` int(11) NOT NULL DEFAULT '1' COMMENT '是否显示首页-1:显示 0:不显示',
  PRIMARY KEY (`id`),
  KEY `title` (`title`,`category_id`,`created_at`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of post
INSERT INTO `post` VALUES ('1', 'Bob的博客源码分享', '1', 'Bob', '23', '&lt;p style=&quot;white-space: normal; text-align: center;&quot;&gt;&lt;span style=&quot;color: rgb(0, 176, 80);&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-size: 24px;&quot;&gt;欢迎大家来到Bob的blog&lt;/span&gt;&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;span style=&quot;font-size: 20px;&quot;&gt;&lt;strong&gt;分享：&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&amp;nbsp; &amp;nbsp;&amp;nbsp;&lt;span style=&quot;font-size: 18px;&quot;&gt;&amp;nbsp;首先，谢谢大家支持Bob的博客。最近因为很多小伙伴私信我，想要我的博客源码。于是，我花了一些时间将博客大部分功能分享出来。由于我的博客还在开发中，现在估计才完成百分之六十，所以有部分功能暂时不对外开发，希望大家理解。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&amp;nbsp; &amp;nbsp; 前台有些功能是从其他网站拔下来的，后台功能基本上都是自己撸的，所以后台代码写的比较low，希望大家理解，有很多代码可以完善，希望大家能指点一下，让我能将博客弄的更好。&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&amp;nbsp; &amp;nbsp;（文章写到一半，突然手贱按了 Ctrl+W 将页面关闭了，无奈又从新写.........）&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&amp;nbsp;&lt;span style=&quot;font-size: 20px;&quot;&gt;&amp;nbsp;&lt;strong&gt;前台：&lt;/strong&gt;&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot; style=&quot;width: 957.594px; white-space: normal;&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;博客首页&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;文章列表&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;文章分类&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;最新文章&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;友情链接&lt;span style=&quot;font-size: 16px;&quot;&gt;（开放部分）&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;工具箱&lt;span style=&quot;font-size: 16px;&quot;&gt;（未开放）&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;标签&lt;span style=&quot;font-size: 16px;&quot;&gt;（未开放）&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;个人介绍&lt;span style=&quot;font-size: 16px;&quot;&gt;（未开放）&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;span style=&quot;font-size: 20px;&quot;&gt;&amp;nbsp;&amp;nbsp;&lt;strong&gt;后台：&lt;/strong&gt;&lt;/span&gt;&lt;/p&gt;&lt;ul class=&quot; list-paddingleft-2&quot; style=&quot;width: 957.594px; white-space: normal;&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;仪表盘&lt;span style=&quot;font-size: 16px;&quot;&gt;（开发中）&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;文章管理&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;ol class=&quot;custom_num1 list-paddingleft-1&quot; style=&quot;width: 957.594px; white-space: normal;&quot;&gt;&lt;li class=&quot;list-num-2-1 list-num1-paddingleft-1&quot;&gt;&lt;p&gt;文章列表管理&lt;/p&gt;&lt;/li&gt;&lt;li class=&quot;list-num-2-2 list-num1-paddingleft-1&quot;&gt;&lt;p&gt;新增文章&lt;/p&gt;&lt;/li&gt;&lt;li class=&quot;list-num-2-3 list-num1-paddingleft-1&quot;&gt;&lt;p&gt;文章分类&lt;/p&gt;&lt;/li&gt;&lt;li class=&quot;list-num-2-4 list-num1-paddingleft-1&quot;&gt;&lt;p&gt;标签管理（未开放）&lt;/p&gt;&lt;/li&gt;&lt;/ol&gt;&lt;ul class=&quot; list-paddingleft-2&quot; style=&quot;width: 957.594px; white-space: normal;&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;访问记录&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;ol class=&quot;custom_num1 list-paddingleft-1&quot; style=&quot;width: 957.594px; white-space: normal;&quot;&gt;&lt;li class=&quot;list-num-2-1 list-num1-paddingleft-1&quot;&gt;&lt;p&gt;访问列表（浏览地址未开放）&lt;/p&gt;&lt;/li&gt;&lt;li class=&quot;list-num-2-2 list-num1-paddingleft-1&quot;&gt;&lt;p&gt;IP屏蔽&lt;/p&gt;&lt;/li&gt;&lt;/ol&gt;&lt;ul class=&quot; list-paddingleft-2&quot; style=&quot;width: 957.594px; white-space: normal;&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;系统管理&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;ol class=&quot;custom_num1 list-paddingleft-1&quot; style=&quot;width: 957.594px; white-space: normal;&quot;&gt;&lt;li class=&quot;list-num-2-1 list-num1-paddingleft-1&quot;&gt;&lt;p&gt;管理员列表&lt;/p&gt;&lt;/li&gt;&lt;/ol&gt;&lt;ul class=&quot; list-paddingleft-2&quot; style=&quot;width: 957.594px; white-space: normal;&quot;&gt;&lt;li&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;友情链接&lt;span style=&quot;font-size: 16px;&quot;&gt;（未开放）&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;网站收藏&lt;span style=&quot;font-size: 16px;&quot;&gt;（开发中）&lt;/span&gt;&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-size: 20px;&quot;&gt;案例图片：&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-size: 20px;&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20170807/1502073937453684.png&quot; title=&quot;1502073937453684.png&quot; alt=&quot;image.png&quot;&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;strong&gt;&lt;span style=&quot;font-size: 20px;&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20170807/1502074430492627.png&quot; title=&quot;1502074430492627.png&quot; alt=&quot;image.png&quot;&gt;&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20170807/1502074475330053.png&quot; title=&quot;1502074475330053.png&quot; alt=&quot;image.png&quot;&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20170807/1502075087571806.png&quot; title=&quot;1502075087571806.png&quot; alt=&quot;image.png&quot;&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20170807/1502075062361897.png&quot; title=&quot;1502075062361897.png&quot; alt=&quot;image.png&quot;&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20170807/1502074512101778.png&quot; title=&quot;1502074512101778.png&quot; alt=&quot;image.png&quot;&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;br&gt;&lt;img src=&quot;/ueditor/php/upload/image/20170807/1502074611100040.png&quot; title=&quot;1502074611100040.png&quot; alt=&quot;image.png&quot;&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20170807/1502074680129775.png&quot; title=&quot;1502074680129775.png&quot; alt=&quot;image.png&quot;&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;img src=&quot;/ueditor/php/upload/image/20170807/1502074758925183.png&quot; title=&quot;1502074758925183.png&quot; alt=&quot;image.png&quot;&gt;&lt;/p&gt;&lt;h2 style=&quot;font-family: inherit; font-style: inherit; white-space: normal; box-sizing: border-box; margin: 15px -25px; padding: 3px 0px 3px 24px; outline: 0px; border-width: 0px 0px 0px 5px; border-top-style: initial; border-right-style: initial; border-bottom-style: initial; border-left-style: solid; border-top-color: initial; border-right-color: initial; border-bottom-color: initial; border-left-color: rgb(13, 170, 234); border-image: initial; vertical-align: baseline; font-size: 1.6rem; line-height: 35px; background-color: rgb(247, 247, 247); font-weight: normal;&quot;&gt;&lt;span style=&quot;color: rgb(75, 172, 198);&quot;&gt;项目地址&lt;/span&gt;&lt;/h2&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 10px; font-family: inherit; font-style: inherit; white-space: normal; box-sizing: border-box; padding: 0px; outline: 0px; border: 0px; vertical-align: baseline; text-align: justify; word-wrap: break-word; line-height: 30px; word-break: break-all; text-indent: 2em;&quot;&gt;&lt;span style=&quot;font-size: 20px;&quot;&gt;在线演示：&lt;/span&gt;&lt;a href=&quot;https://www.bobcoder.cc/Post/detail/id/84.html&quot; target=&quot;_blank&quot; style=&quot;font-size: 18px;&quot;&gt;https://www.bobcoder.cc/&lt;/a&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 10px; font-family: inherit; font-style: inherit; white-space: normal; box-sizing: border-box; padding: 0px; outline: 0px; border: 0px; vertical-align: baseline; text-align: justify; word-wrap: break-word; line-height: 30px; word-break: break-all; text-indent: 2em;&quot;&gt;&lt;span style=&quot;font-size: 20px;&quot;&gt;详细介绍：&lt;/span&gt;&lt;a href=&quot;https://www.bobcoder.cc/Post/detail/id/84.html&quot; target=&quot;_blank&quot; style=&quot;font-size: 18px;&quot;&gt;https://www.bobcoder.cc/Post/detail/id/84.html&lt;/a&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 10px; font-family: inherit; font-style: inherit; white-space: normal; box-sizing: border-box; padding: 0px; outline: 0px; border: 0px; vertical-align: baseline; text-align: justify; word-wrap: break-word; line-height: 30px; word-break: break-all; text-indent: 2em;&quot;&gt;&lt;span style=&quot;color: inherit; font-family: inherit; font-size: 18px; font-style: inherit; text-indent: 2em;&quot;&gt;下载地址:&amp;nbsp;&lt;/span&gt;&lt;a href=&quot;https://pan.baidu.com/s/1bqgRgZl&quot; target=&quot;_blank&quot; style=&quot;font-family: inherit; font-size: 18px; font-style: inherit; text-indent: 2em; background-color: rgb(255, 255, 255);&quot;&gt;https://pan.baidu.com/s/1bqgRgZl&lt;/a&gt;&lt;span style=&quot;color: inherit; font-family: inherit; font-size: 18px; font-style: inherit; text-indent: 2em;&quot;&gt;密码：d1p0&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 10px; font-family: inherit; font-style: inherit; white-space: normal; box-sizing: border-box; padding: 0px; outline: 0px; border: 0px; vertical-align: baseline; text-align: justify; word-wrap: break-word; line-height: 30px; word-break: break-all; text-indent: 2em;&quot;&gt;&lt;span style=&quot;color: rgb(255, 102, 0); font-family: inherit; font-style: inherit; text-indent: 2em; font-size: 20px;&quot;&gt;再次强调：转载或使用请保留版权和来源信息，谢谢！&lt;/span&gt;&lt;br&gt;&lt;/p&gt;&lt;p style=&quot;white-space: normal;&quot;&gt;&lt;span style=&quot;font-size: 20px;&quot;&gt;&lt;strong style=&quot;box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-family: inherit;&quot;&gt;本文地址：&lt;/strong&gt;&lt;/span&gt;&lt;a href=&quot;https://www.bobcoder.cc/Post/detail/id/84.html&quot; target=&quot;_blank&quot; style=&quot;font-size: 18px;&quot;&gt;https://www.bobcoder.cc/Post/detail/id/84.html&lt;/a&gt;&lt;br&gt;&lt;span style=&quot;font-size: 20px;&quot;&gt;&lt;strong style=&quot;box-sizing: border-box; margin: 0px; padding: 0px; outline: 0px; border: 0px; vertical-align: baseline; font-style: inherit; font-family: inherit;&quot;&gt;版权声明：&lt;/strong&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;本文为原创文章，版权归 Bob 所有，欢迎分享本文，转载请保留出处&lt;/span&gt;！&lt;/span&gt;&lt;/p&gt;&lt;hr&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 10px; white-space: normal; padding: 0px; box-sizing: border-box; -webkit-tap-highlight-color: transparent; line-height: 25px; color: rgb(88, 102, 110); font-family: &amp;quot;Exo 2&amp;quot;, &amp;quot;Trebuchet MS&amp;quot;, Helvetica, Arial, &amp;quot;PingFang SC&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, SimHei, &amp;quot;WenQuanYi Micro Hei&amp;quot;, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; box-sizing: border-box; -webkit-tap-highlight-color: transparent; font-size: 16px;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 10px; white-space: normal; padding: 0px; box-sizing: border-box; -webkit-tap-highlight-color: transparent; line-height: 25px; color: rgb(88, 102, 110); font-family: &amp;quot;Exo 2&amp;quot;, &amp;quot;Trebuchet MS&amp;quot;, Helvetica, Arial, &amp;quot;PingFang SC&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, SimHei, &amp;quot;WenQuanYi Micro Hei&amp;quot;, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; box-sizing: border-box; -webkit-tap-highlight-color: transparent; font-size: 18px;&quot;&gt;还没看懂的小伙伴可以在底下留言&lt;/span&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0057.gif&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; box-sizing: border-box; -webkit-tap-highlight-color: transparent; font-size: 18px;&quot;&gt;或者在线咨询作者&lt;/span&gt;&lt;img src=&quot;http://img.baidu.com/hi/jx2/j_0057.gif&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; box-sizing: border-box; -webkit-tap-highlight-color: transparent; font-size: 18px;&quot;&gt;，作者QQ：44785355 / 邮箱：bob@bobcoder.cc&lt;/span&gt;&lt;/p&gt;&lt;p style=&quot;margin-top: 0px; margin-bottom: 10px; white-space: normal; padding: 0px; box-sizing: border-box; -webkit-tap-highlight-color: transparent; line-height: 25px; color: rgb(88, 102, 110); font-family: &amp;quot;Exo 2&amp;quot;, &amp;quot;Trebuchet MS&amp;quot;, Helvetica, Arial, &amp;quot;PingFang SC&amp;quot;, &amp;quot;Hiragino Sans GB&amp;quot;, &amp;quot;STHeiti Light&amp;quot;, &amp;quot;Microsoft YaHei&amp;quot;, SimHei, &amp;quot;WenQuanYi Micro Hei&amp;quot;, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;margin: 0px; padding: 0px; box-sizing: border-box; -webkit-tap-highlight-color: transparent; font-family: 微软雅黑, &amp;quot;Microsoft YaHei&amp;quot;; font-size: 20px;&quot;&gt;观看，如果你觉得本文还不错或者对您有帮助，请扫码下面的打赏二维码打赏一下吧，谢谢！&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;margin: 0px; padding: 0px; box-sizing: border-box; -webkit-tap-highlight-color: transparent; font-family: 微软雅黑, &amp;quot;Microsoft YaHei&amp;quot;; font-size: 20px;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', '1', '1715', '46', '2017-08-07 11:20:05', '2018-02-05 12:55:27', '17', '1');

-- ----------------------------
-- Table structure for post_category
-- ----------------------------
DROP TABLE IF EXISTS `post_category`;
CREATE TABLE `post_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '分类名称',
  `sort` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '修改时间',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

-- ----------------------------
-- Records of post_category
-- ----------------------------
INSERT INTO `post_category` VALUES ('19', 'Java', '2', '2017-07-04 11:22:06', '2017-07-04 11:22:06', '1');
INSERT INTO `post_category` VALUES ('20', 'JavaScript', '3', '2017-07-04 23:38:13', '2017-07-04 23:38:13', '1');
INSERT INTO `post_category` VALUES ('21', 'MySql', '4', '2017-07-05 11:39:10', '2017-07-05 11:39:10', '1');
INSERT INTO `post_category` VALUES ('22', 'Linux', '5', '2017-07-06 15:47:54', '2017-07-06 15:48:16', '1');
INSERT INTO `post_category` VALUES ('23', 'PHP', '6', '2017-07-08 10:47:54', '2017-07-08 10:47:54', '1');
INSERT INTO `post_category` VALUES ('24', '话外语', '7', '2017-07-21 17:41:10', '2017-09-22 18:00:57', '1');

-- ----------------------------
-- Table structure for post_tab
-- ----------------------------
DROP TABLE IF EXISTS `post_tab`;
CREATE TABLE `post_tab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tab_name` varchar(100) DEFAULT NULL COMMENT '标签名',
  `class_tab` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of post_tab
-- ----------------------------
INSERT INTO `post_tab` VALUES ('2', 'java', '2', '2017-07-07 16:51:32', '2017-07-13 13:36:52');
INSERT INTO `post_tab` VALUES ('3', 'php', '3', '2017-07-07 16:51:37', '2017-07-13 13:36:53');
INSERT INTO `post_tab` VALUES ('4', 'mysql', '5', '2017-07-13 10:43:49', '2017-07-13 13:36:54');
INSERT INTO `post_tab` VALUES ('5', 'html', '2', '2017-07-13 10:43:54', '2017-07-13 13:36:54');
INSERT INTO `post_tab` VALUES ('6', 'javascript', '0', '2017-07-13 10:44:04', '2017-07-13 13:36:56');
INSERT INTO `post_tab` VALUES ('7', 'linux', '5', '2017-07-13 10:44:17', '2017-07-13 13:36:58');
INSERT INTO `post_tab` VALUES ('8', 'css', '7', '2017-07-13 10:44:21', '2017-07-13 13:36:58');
INSERT INTO `post_tab` VALUES ('9', 'nginx', '4', '2017-07-13 10:45:22', '2017-07-13 13:36:59');
INSERT INTO `post_tab` VALUES ('10', 'svn', '9', '2017-07-13 10:45:36', '2017-07-13 13:37:01');
INSERT INTO `post_tab` VALUES ('20', 'HTTP', '6', '2017-07-14 16:51:05', '2017-07-14 16:51:05');
INSERT INTO `post_tab` VALUES ('21', 'Session', '9', '2017-07-19 14:38:44', '2017-07-19 14:38:44');
INSERT INTO `post_tab` VALUES ('22', '搞笑', '4', '2017-07-21 17:43:22', '2017-07-21 17:43:22');
INSERT INTO `post_tab` VALUES ('23', '情感', '5', '2017-07-25 10:52:12', '2017-07-25 10:52:12');
INSERT INTO `post_tab` VALUES ('24', '福利', '4', '2017-08-10 23:21:13', '2017-08-10 23:21:13');
INSERT INTO `post_tab` VALUES ('25', '美女', '9', '2017-08-10 23:21:35', '2017-08-10 23:21:35');
INSERT INTO `post_tab` VALUES ('26', 'Yii', '8', '2017-08-30 14:06:53', '2017-08-30 14:06:53');
INSERT INTO `post_tab` VALUES ('27', 'JFrame', '2', '2017-10-10 11:53:08', '2017-10-10 11:53:08');
INSERT INTO `post_tab` VALUES ('29', 'protocol buffer', '2', '2017-11-14 11:01:22', '2017-11-14 11:01:22');
INSERT INTO `post_tab` VALUES ('30', '缓存', '8', '2017-12-13 16:19:46', '2017-12-13 16:19:46');
INSERT INTO `post_tab` VALUES ('31', 'Redis', '4', '2018-03-05 14:38:38', '2018-03-05 14:38:38');

-- ----------------------------
-- Table structure for push
-- ----------------------------
DROP TABLE IF EXISTS `push`;
CREATE TABLE `push` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '推送人',
  `success` int(11) DEFAULT NULL COMMENT '成功推送的url条数',
  `remain` int(11) DEFAULT NULL COMMENT '当天剩余的可推送url条数',
  `error` int(11) DEFAULT NULL COMMENT '错误码，与状态码相同',
  `message` varchar(255) DEFAULT NULL COMMENT '错误描述',
  `pid` varchar(255) DEFAULT NULL COMMENT '推送的文章ID',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of push
-- ----------------------------


-- ----------------------------
-- Table structure for shield_ip
-- ----------------------------
DROP TABLE IF EXISTS `shield_ip`;
CREATE TABLE `shield_ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL DEFAULT '' COMMENT 'ip',
  `remark` varchar(100) NOT NULL DEFAULT '' COMMENT '备注',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of shield_ip
-- ----------------------------


-- ----------------------------
-- Table structure for system_info
-- ----------------------------
DROP TABLE IF EXISTS `system_info`;
CREATE TABLE `system_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(10) DEFAULT NULL COMMENT '版本号',
  `author` varchar(20) DEFAULT NULL COMMENT '开发作者	',
  `homePage` varchar(50) DEFAULT NULL COMMENT '网站首页	',
  `server` varchar(20) DEFAULT NULL COMMENT '服务器环境',
  `dataBase` varchar(20) DEFAULT NULL COMMENT '数据库版本',
  `userRights` varchar(20) DEFAULT NULL COMMENT '用户权限	',
  `keywords` varchar(200) DEFAULT NULL COMMENT '默认关键字',
  `powerby` varchar(200) DEFAULT NULL COMMENT '版权信息',
  `description` varchar(500) DEFAULT NULL COMMENT '网站描述',
  `record` varchar(30) DEFAULT NULL COMMENT '网站备案号	',
  `ip` varchar(20) DEFAULT NULL COMMENT 'ip',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of system_info
-- ----------------------------
INSERT INTO `system_info` VALUES ('1', 'v-2.0', 'BobCoder', 'www.bobcoder.cc', 'Centos 7.2', 'mysql  Ver 5.6.36', 'administrator', 'Bob的博客,Linux,Windows,bobcoder,个人主页,php,java,技术博客,个人博客,mysql,nginx,svn,Bob', 'BobCoder', 'Bob的博客是一个关注网站建设、网络推广、Html5+css3、Java、PHP、Mysql等技术分享的博客,提供博主在学习成果和工作中经验总结，是一个互联网从业者值得收藏的网站。', '蜀ICP备17022542号-1', '120.78.142.118');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `nickname` varchar(32) CHARACTER SET utf8mb4 NOT NULL DEFAULT '' COMMENT '昵称',
  `password` varchar(100) NOT NULL DEFAULT '' COMMENT '密码',
  `salt` char(6) NOT NULL DEFAULT '' COMMENT '盐',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1正常0禁用',
  `last_time` datetime NOT NULL COMMENT '最后登录时间',
  `last_ip` varchar(20) NOT NULL DEFAULT '0' COMMENT '最后登录ip',
  `register_time` datetime NOT NULL COMMENT '注册时间',
  `register_ip` varchar(20) NOT NULL DEFAULT '0' COMMENT '注册ip',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='后台管理员表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'Bob', 'rJBYxgc8w/cGvhhWi7si/ydlflZ0Mv0CjfhpYkUQQcU=', '199591', '1', '2018-03-09 17:37:09', '127.0.0.1', '2017-06-16 21:38:47', '0');

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `usergroup` varchar(20) NOT NULL COMMENT '用户组',
  `realname` varchar(30) DEFAULT NULL COMMENT '真实姓名',
  `sex` int(11) DEFAULT NULL COMMENT '1:男 2女',
  `email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `motto` varchar(500) DEFAULT NULL COMMENT '座右铭',
  `qq` int(11) DEFAULT NULL COMMENT 'QQ',
  `weixin` varchar(30) DEFAULT NULL COMMENT '微信',
  `myself` tinytext COMMENT '自我评价',
  `logo_url` varchar(100) DEFAULT NULL COMMENT '用户头像路径',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES ('1', '1', 'BobCoder', 'Administrators', '李宁', '1', 'bob@bobcoder.cc', '迷茫是因为能力还配不上梦想！', '44785355', 'Baby520131757', '博主网名—Bob,一个名90后的程序猿,计算机软件工程毕业，现从事 的是网站web开发。手机控，喜欢捣鼓新鲜玩意儿。业余爱好是玩游戏，跑步，旅游。喜欢交新朋友。', '/Public/Home/images/logo_1.png');

-- ----------------------------
-- Table structure for visit_log
-- ----------------------------
DROP TABLE IF EXISTS `visit_log`;
CREATE TABLE `visit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '游客' COMMENT '访客名字',
  `ip` varchar(20) NOT NULL DEFAULT '0' COMMENT '访客ip',
  `longitude` varchar(20) DEFAULT '' COMMENT '经度',
  `latitude` varchar(20) DEFAULT '' COMMENT '纬度',
  `address` varchar(150) DEFAULT '' COMMENT '城市地址',
  `url` varchar(150) DEFAULT NULL COMMENT '访问地址',
  `area` varchar(150) NOT NULL DEFAULT '' COMMENT 'ip物理地址',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81816 DEFAULT CHARSET=utf8 COMMENT='访客日志表';

-- ----------------------------
-- Records of visit_log
-- ----------------------------

