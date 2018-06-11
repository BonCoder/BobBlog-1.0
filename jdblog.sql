/*
Navicat MySQL Data Transfer

Source Server         : 118.193.156.175
Source Server Version : 50717
Source Host           : 118.193.156.175:3306
Source Database       : jdblog

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-06-30 09:12:29
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `post`
-- ----------------------------
DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `user_id` int(11) NOT NULL DEFAULT '1' COMMENT '作者id',
  `author` varchar(32) NOT NULL DEFAULT '' COMMENT '作者',
  `category_id` int(11) NOT NULL DEFAULT '0' COMMENT '文章分类',
  `content` varchar(10000) NOT NULL DEFAULT '' COMMENT '文章内容',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1显示 0不显示',
  `read_count` int(11) NOT NULL DEFAULT '1' COMMENT '阅读数',
  `like_num` int(11) NOT NULL DEFAULT '1' COMMENT '点赞数',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `title` (`title`,`category_id`,`created_at`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of post
-- ----------------------------

-- ----------------------------
-- Table structure for `post_category`
-- ----------------------------
DROP TABLE IF EXISTS `post_category`;
CREATE TABLE `post_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '分类名称',
  `sort` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='文章分类表';

-- ----------------------------
-- Records of post_category
-- ----------------------------

-- ----------------------------
-- Table structure for `shield_ip`
-- ----------------------------
DROP TABLE IF EXISTS `shield_ip`;
CREATE TABLE `shield_ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) NOT NULL DEFAULT '' COMMENT 'ip',
  `remark` varchar(100) NOT NULL DEFAULT '' COMMENT '备注',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of shield_ip
-- ----------------------------

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `nickname` varchar(32) CHARACTER SET utf8mb4 NOT NULL DEFAULT '' COMMENT '昵称',
  `password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
  `salt` char(6) NOT NULL DEFAULT '' COMMENT '盐',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1正常0禁用',
  `last_time` datetime NOT NULL COMMENT '最后登录时间',
  `last_ip` varchar(20) NOT NULL DEFAULT '0' COMMENT '最后登录ip',
  `register_time` datetime NOT NULL COMMENT '注册时间',
  `register_ip` varchar(20) NOT NULL DEFAULT '0' COMMENT '注册ip',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='后台管理员表';

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for `visit_log`
-- ----------------------------
DROP TABLE IF EXISTS `visit_log`;
CREATE TABLE `visit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '游客' COMMENT '访客名字',
  `ip` varchar(20) NOT NULL DEFAULT '0' COMMENT '访客ip',
  `longitude` varchar(20) NOT NULL DEFAULT '' COMMENT '经度',
  `latitude` varchar(20) NOT NULL DEFAULT '' COMMENT '纬度',
  `address` varchar(150) NOT NULL DEFAULT '' COMMENT '城市地址',
  `area` varchar(150) NOT NULL DEFAULT '' COMMENT 'ip物理地址',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=191 DEFAULT CHARSET=utf8 COMMENT='访客日志表';

-- ----------------------------
-- Records of visit_log
-- ----------------------------
