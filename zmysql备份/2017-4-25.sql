/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : saas

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2017-04-26 09:33:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for liyulin_admin
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_admin`;
CREATE TABLE `liyulin_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adm_name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `adm_pwd` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `create_time` int(11) NOT NULL,
  `login_time` int(11) NOT NULL,
  `login_ip` varchar(30) CHARACTER SET utf8 NOT NULL,
  `is_effect` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_admin
-- ----------------------------
INSERT INTO `liyulin_admin` VALUES ('1', 'admin', '88e4f5cffe90ee47fa5e07309c7b95a6', '超级管理员', '0', '1493104872', '2130706433', '1', '0', '627520');
INSERT INTO `liyulin_admin` VALUES ('2', 'liyulin', '372ab7573d6b4791a03f8a9a315eecc9', '李渝林123', '0', '1493170218', '2130706433', '1', '0', '1');
INSERT INTO `liyulin_admin` VALUES ('6', 'liyulin2', '372ab7573d6b4791a03f8a9a315eecc9', '2组', '1492165076', '0', '2130706433', '1', '0', '5');

-- ----------------------------
-- Table structure for liyulin_admin_log
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_admin_log`;
CREATE TABLE `liyulin_admin_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ip` varchar(50) CHARACTER SET utf8 NOT NULL,
  `operation` varchar(20) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 NOT NULL,
  `create_time` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_group` varchar(255) CHARACTER SET utf8 NOT NULL,
  `backups_id` int(11) unsigned NOT NULL COMMENT '备份id,可查看备份以及备份恢复',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_admin_log
-- ----------------------------
INSERT INTO `liyulin_admin_log` VALUES ('1', '1', '127.0.0.1', '登录', '登录成功', '1489817269', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('2', '1', '127.0.0.1', '登录', '登录成功', '1489817392', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('3', '1', '127.0.0.1', '登录', '登录成功', '1489823410', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('4', '1', '127.0.0.1', '登录', '登录成功', '1490002931', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('5', '1', '127.0.0.1', '新增管理员李渝林成功', '2', '1490009497', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('6', '1', '127.0.0.1', '修改管理员2的信息成功', '1', '1490010178', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('7', '1', '127.0.0.1', '修改管理员2的信息成功', '1', '1490010188', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('8', '1', '127.0.0.1', '修改管理员2的信息成功', '1', '1490010220', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('9', '1', '127.0.0.1', '新增管理员分组木木测试成功', '1', '1490010989', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('10', '1', '127.0.0.1', '修改管理员分组：木木测试的信息成功', '1', '1490011343', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('11', '1', '127.0.0.1', '修改管理员分组：管理员的信息成功', '1', '1490012119', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('12', '1', '127.0.0.1', '登录', '登录成功', '1490090109', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('13', '1', '127.0.0.1', '登录', '登录成功', '1490170459', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('14', '1', '127.0.0.1', '登录', '登录成功', '1490263401', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('15', '1', '127.0.0.1', '退出', '退出成功', '1490263454', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('16', '2', '127.0.0.1', '登录', '登录成功', '1490263466', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('17', '2', '127.0.0.1', '退出', '退出成功', '1490265381', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('18', '2', '127.0.0.1', '登录', '登录成功', '1490265443', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('19', '2', '127.0.0.1', '修改管理员分组：管理员的信息成功', '1', '1490265460', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('20', '2', '127.0.0.1', '退出', '退出成功', '1490266055', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('21', '2', '127.0.0.1', '登录', '登录成功', '1490266061', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('22', '2', '127.0.0.1', '登录', '登录成功', '1490336536', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('23', '2', '127.0.0.1', '登录', '登录成功', '1490337873', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('24', '2', '127.0.0.1', '退出', '退出成功', '1490337898', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('25', '2', '127.0.0.1', '登录', '登录成功', '1490337920', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('26', '2', '127.0.0.1', '退出', '退出成功', '1490342908', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('27', '2', '127.0.0.1', '登录', '登录成功', '1490342913', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('28', '2', '127.0.0.1', '退出', '退出成功', '1490343697', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('29', '2', '127.0.0.1', '登录', '登录成功', '1490343722', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('30', '2', '127.0.0.1', '退出', '退出成功', '1490349381', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('31', '1', '127.0.0.1', '登录', '登录成功', '1490349444', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('32', '1', '127.0.0.1', '登录', '登录成功', '1490787421', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('33', '1', '127.0.0.1', '退出', '退出成功', '1490787424', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('34', '2', '127.0.0.1', '登录', '登录成功', '1490787435', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('35', '2', '127.0.0.1', '登录', '登录成功', '1490939335', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('36', '2', '127.0.0.1', '登录', '登录成功', '1490947873', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('37', '2', '127.0.0.1', '退出', '退出成功', '1490952356', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('38', '2', '127.0.0.1', '登录', '登录成功', '1490952363', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('39', '2', '127.0.0.1', '登录', '登录成功', '1491395013', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('40', '2', '127.0.0.1', '登录', '登录成功', '1491476794', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('41', '2', '127.0.0.1', '登录', '登录成功', '1491560360', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('42', '1', '127.0.0.1', '登录', '登录成功', '1491986129', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('43', '1', '127.0.0.1', '登录', '登录成功', '1491986195', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('44', '1', '127.0.0.1', '退出', '退出成功', '1491986276', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('45', '1', '127.0.0.1', '登录', '登录成功', '1491986281', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('46', '1', '127.0.0.1', '退出', '退出成功', '1491986283', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('47', '1', '127.0.0.1', '登录', '登录成功', '1491986288', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('48', '1', '127.0.0.1', '退出', '退出成功', '1491986359', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('49', '2', '127.0.0.1', '登录', '登录成功', '1491986419', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('50', '2', '127.0.0.1', '退出', '退出成功', '1491994348', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('51', '1', '127.0.0.1', '退出', '退出成功', '1492052550', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('52', '1', '127.0.0.1', '登录', '登录成功', '1492052579', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('53', '1', '127.0.0.1', '退出', '退出成功', '1492052584', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('54', '1', '127.0.0.1', '登录', '登录成功', '1492052590', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('55', '1', '127.0.0.1', '退出', '退出成功', '1492052616', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('56', '2', '127.0.0.1', '登录', '登录成功', '1492052624', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('57', '2', '127.0.0.1', '退出', '退出成功', '1492063016', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('58', '2', '127.0.0.1', '登录', '登录成功', '1492063024', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('59', '2', '127.0.0.1', '退出', '退出成功', '1492064377', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('60', '1', '127.0.0.1', '登录', '登录成功', '1492064385', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('61', '1', '127.0.0.1', '修改管理员分组：管理员的信息成功', '1', '1492064460', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('62', '1', '127.0.0.1', '退出', '退出成功', '1492065854', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('63', '2', '127.0.0.1', '登录', '登录成功', '1492065865', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('64', '2', '127.0.0.1', '退出', '退出成功', '1492066818', '李渝林', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('65', '1', '127.0.0.1', '登录', '登录成功', '1492066831', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('66', '1', '127.0.0.1', '登录', '登录成功', '1492136921', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('67', '1', '127.0.0.1', '登录', '登录成功', '1492149164', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('68', '1', '127.0.0.1', '修改管理员2的信息成功', '1', '1492164454', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('69', '1', '127.0.0.1', '新增管理员lyl成功', '3', '1492164479', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('70', '1', '127.0.0.1', '退出', '退出成功', '1492164551', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('71', '1', '127.0.0.1', '登录', '登录成功', '1492164628', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('72', '1', '127.0.0.1', '修改管理员3的信息成功', '1', '1492164684', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('73', '1', '127.0.0.1', '退出', '退出成功', '1492164694', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('74', '3', '127.0.0.1', '登录', '登录成功', '1492164703', 'lyl', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('75', '3', '127.0.0.1', '退出', '退出成功', '1492164713', 'lyl', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('76', '1', '127.0.0.1', '登录', '登录成功', '1492164733', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('77', '1', '127.0.0.1', '新增管理员lyl2成功', '4', '1492164757', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('78', '1', '127.0.0.1', '新增管理员123123成功', '5', '1492164812', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('79', '1', '127.0.0.1', '修改管理员4的信息成功', '1', '1492164835', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('80', '1', '127.0.0.1', '登录', '登录成功', '1492164918', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('81', '1', '127.0.0.1', '新增管理员2组成功', '6', '1492165076', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('82', '2', '127.0.0.1', '登录', '登录成功', '1492423812', '李渝林123', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('83', '2', '127.0.0.1', '退出', '退出成功', '1492427626', '李渝林123', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('84', '1', '127.0.0.1', '登录', '登录成功', '1492427633', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('85', '1', '127.0.0.1', '退出', '退出成功', '1492427653', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('86', '2', '127.0.0.1', '登录', '登录成功', '1492427661', '李渝林123', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('87', '2', '127.0.0.1', '登录', '登录成功', '1492596051', '李渝林123', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('88', '2', '127.0.0.1', '登录', '登录成功', '1492682763', '李渝林123', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('89', '2', '127.0.0.1', '登录', '登录成功', '1493029063', '李渝林123', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('90', '2', '127.0.0.1', '登录', '登录成功', '1493083636', '李渝林123', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('91', '2', '127.0.0.1', '退出', '退出成功', '1493087603', '李渝林123', '管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('92', '1', '127.0.0.1', '登录', '登录成功', '1493087614', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('93', '1', '127.0.0.1', '退出', '退出成功', '1493088318', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('94', '2', '127.0.0.1', '退出', '退出成功', '1493088737', '李渝林123', '管理员组A', '0');
INSERT INTO `liyulin_admin_log` VALUES ('95', '2', '127.0.0.1', '登录', '登录成功', '1493088744', '李渝林123', '管理员组A', '0');
INSERT INTO `liyulin_admin_log` VALUES ('96', '2', '127.0.0.1', '退出', '退出成功', '1493093400', '李渝林123', '管理员组A', '0');
INSERT INTO `liyulin_admin_log` VALUES ('97', '1', '127.0.0.1', '登录', '登录成功', '1493093411', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('98', '1', '127.0.0.1', '退出', '退出成功', '1493093509', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('99', '2', '127.0.0.1', '登录', '登录成功', '1493093520', '李渝林123', '管理员组A', '0');
INSERT INTO `liyulin_admin_log` VALUES ('100', '2', '127.0.0.1', '退出', '退出成功', '1493094096', '李渝林123', '管理员组A', '0');
INSERT INTO `liyulin_admin_log` VALUES ('101', '1', '127.0.0.1', '登录', '登录成功', '1493094113', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('102', '1', '127.0.0.1', '退出', '退出成功', '1493094126', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('103', '2', '127.0.0.1', '登录', '登录成功', '1493094138', '李渝林123', '管理员组A', '0');
INSERT INTO `liyulin_admin_log` VALUES ('104', '2', '127.0.0.1', '退出', '退出成功', '1493104854', '李渝林123', '管理员组A', '0');
INSERT INTO `liyulin_admin_log` VALUES ('105', '1', '127.0.0.1', '登录', '登录成功', '1493104872', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('106', '1', '127.0.0.1', '退出', '退出成功', '1493107163', '超级管理员', '超级管理员', '0');
INSERT INTO `liyulin_admin_log` VALUES ('107', '2', '127.0.0.1', '登录', '登录成功', '1493107172', '李渝林123', '管理员组A', '0');
INSERT INTO `liyulin_admin_log` VALUES ('108', '2', '127.0.0.1', '登录', '登录成功', '1493170218', '李渝林123', '管理员组A', '0');

-- ----------------------------
-- Table structure for liyulin_auth_code
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_auth_code`;
CREATE TABLE `liyulin_auth_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tel` varchar(11) CHARACTER SET utf8 NOT NULL,
  `create_time` int(11) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auth_code` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_auth_code
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_auth_group`;
CREATE TABLE `liyulin_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of liyulin_auth_group
-- ----------------------------
INSERT INTO `liyulin_auth_group` VALUES ('1', '管理员组A', '1', '1,3,4,10,13,19,12,14,15,16,5,20,22,23,21,24,25,6,7,8,9,17,18', '0', '1493107161', '0');
INSERT INTO `liyulin_auth_group` VALUES ('5', '管理员组B', '1', '1,3,4,10,13,12,14,15,16,5,6,7,8,9,17,18', '1492165061', '1493088219', '0');

-- ----------------------------
-- Table structure for liyulin_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_auth_group_access`;
CREATE TABLE `liyulin_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of liyulin_auth_group_access
-- ----------------------------
INSERT INTO `liyulin_auth_group_access` VALUES ('1', '1');

-- ----------------------------
-- Table structure for liyulin_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_auth_rule`;
CREATE TABLE `liyulin_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pid` mediumint(8) NOT NULL COMMENT '父id,菜单分类用',
  `menutype` tinyint(1) NOT NULL DEFAULT '0' COMMENT '菜单级别',
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of liyulin_auth_rule
-- ----------------------------
INSERT INTO `liyulin_auth_rule` VALUES ('1', '0', '1', 'Index/index', '首页', '1', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('3', '0', '1', 'User', '用户管理', '0', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('4', '0', '1', 'Article', '文章管理', '0', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('5', '0', '1', 'Album', '图片管理', '0', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('6', '0', '1', 'Video', '视频管理', '0', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('7', '0', '1', 'Web', '网页设置', '0', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('8', '0', '1', 'Index', '首页设置', '0', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('9', '0', '1', 'Higher', '高级功能', '0', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('10', '4', '2', 'Article/index', '文章列表', '1', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('12', '4', '2', 'ArticleCate/index', '分类管理', '1', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('13', '10', '0', 'Article/add', '新增/编辑页面', '1', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('14', '12', '0', 'ArticleCate/get_lists', '获取类型', '2', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('15', '12', '0', 'ArticleCate/save_cate', '新增/修改', '2', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('16', '12', '0', 'ArticleCate/del_cate', '删除', '2', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('17', '0', '0', 'Upload', '上传功能', '0', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('18', '17', '0', 'Upload/upload_other', '上传附件', '1', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('19', '10', '0', 'Article/save', '新增/编辑文章', '2', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('20', '5', '2', 'Album/index', '相册', '1', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('21', '5', '2', 'Photo/index', '相片', '1', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('22', '20', '0', 'Album/Add', '新增/编辑相册', '2', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('23', '20', '0', 'Album/Del', '删除相册', '2', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('24', '21', '0', 'Photo/Add', '单张图片上传', '2', '1', '');
INSERT INTO `liyulin_auth_rule` VALUES ('25', '21', '0', 'Photo/add_more', '多张图片上传', '2', '1', '');

-- ----------------------------
-- Table structure for liyulin_content_type
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_content_type`;
CREATE TABLE `liyulin_content_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自定义首页内容类型表',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `version` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最低版本号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_content_type
-- ----------------------------
INSERT INTO `liyulin_content_type` VALUES ('1', '文章', '0');
INSERT INTO `liyulin_content_type` VALUES ('4', '人物', '0');
INSERT INTO `liyulin_content_type` VALUES ('2', '图片', '0');
INSERT INTO `liyulin_content_type` VALUES ('3', '视频', '1');

-- ----------------------------
-- Table structure for liyulin_pay_conf
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_pay_conf`;
CREATE TABLE `liyulin_pay_conf` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `web_id` int(11) unsigned NOT NULL,
  `zfb_account` varchar(255) CHARACTER SET utf8 NOT NULL,
  `zfb_pid` text CHARACTER SET utf8 NOT NULL,
  `zfb_key` text CHARACTER SET utf8 NOT NULL,
  `wechat_appid` varchar(255) CHARACTER SET utf8 NOT NULL,
  `wechat_appsecret` varchar(255) CHARACTER SET utf8 NOT NULL,
  `wechat_account` varchar(255) CHARACTER SET utf8 NOT NULL,
  `wechat_key` varchar(255) CHARACTER SET utf8 NOT NULL,
  `apiclient_cert` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '微信私钥文件的url地址',
  `apiclient_key` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '微信公钥文件的url地址',
  `apiclient_root` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '微信根证书文件地址',
  `zfb_conf` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 开启支付宝支付配置',
  `wechat_conf` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '1 开启微信支付配置',
  `update_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_pay_conf
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_region_conf
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_region_conf`;
CREATE TABLE `liyulin_region_conf` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL COMMENT '????????',
  `region_level` tinyint(4) NOT NULL COMMENT '1:?? 2:? 3:??(??) 4:??(??)',
  `py` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3421 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_region_conf
-- ----------------------------
INSERT INTO `liyulin_region_conf` VALUES ('3', '1', '安徽', '2', 'anhui');
INSERT INTO `liyulin_region_conf` VALUES ('4', '1', '福建', '2', 'fujian');
INSERT INTO `liyulin_region_conf` VALUES ('5', '1', '甘肃', '2', 'gansu');
INSERT INTO `liyulin_region_conf` VALUES ('6', '1', '广东', '2', 'guangdong');
INSERT INTO `liyulin_region_conf` VALUES ('7', '1', '广西', '2', 'guangxi');
INSERT INTO `liyulin_region_conf` VALUES ('8', '1', '贵州', '2', 'guizhou');
INSERT INTO `liyulin_region_conf` VALUES ('9', '1', '海南', '2', 'hainan');
INSERT INTO `liyulin_region_conf` VALUES ('10', '1', '河北', '2', 'hebei');
INSERT INTO `liyulin_region_conf` VALUES ('11', '1', '河南', '2', 'henan');
INSERT INTO `liyulin_region_conf` VALUES ('12', '1', '黑龙江', '2', 'heilongjiang');
INSERT INTO `liyulin_region_conf` VALUES ('13', '1', '湖北', '2', 'hubei');
INSERT INTO `liyulin_region_conf` VALUES ('14', '1', '湖南', '2', 'hunan');
INSERT INTO `liyulin_region_conf` VALUES ('15', '1', '吉林', '2', 'jilin');
INSERT INTO `liyulin_region_conf` VALUES ('16', '1', '江苏', '2', 'jiangsu');
INSERT INTO `liyulin_region_conf` VALUES ('17', '1', '江西', '2', 'jiangxi');
INSERT INTO `liyulin_region_conf` VALUES ('18', '1', '辽宁', '2', 'liaoning');
INSERT INTO `liyulin_region_conf` VALUES ('19', '1', '内蒙古', '2', 'neimenggu');
INSERT INTO `liyulin_region_conf` VALUES ('20', '1', '宁夏', '2', 'ningxia');
INSERT INTO `liyulin_region_conf` VALUES ('21', '1', '青海', '2', 'qinghai');
INSERT INTO `liyulin_region_conf` VALUES ('22', '1', '山东', '2', 'shandong');
INSERT INTO `liyulin_region_conf` VALUES ('23', '1', '山西', '2', 'shanxi');
INSERT INTO `liyulin_region_conf` VALUES ('24', '1', '陕西', '2', 'shanxi');
INSERT INTO `liyulin_region_conf` VALUES ('26', '1', '四川', '2', 'sichuan');
INSERT INTO `liyulin_region_conf` VALUES ('28', '1', '西藏', '2', 'xicang');
INSERT INTO `liyulin_region_conf` VALUES ('29', '1', '新疆', '2', 'xinjiang');
INSERT INTO `liyulin_region_conf` VALUES ('30', '1', '云南', '2', 'yunnan');
INSERT INTO `liyulin_region_conf` VALUES ('31', '1', '浙江', '2', 'zhejiang');
INSERT INTO `liyulin_region_conf` VALUES ('36', '3', '安庆', '3', 'anqing');
INSERT INTO `liyulin_region_conf` VALUES ('37', '3', '蚌埠', '3', 'bangbu');
INSERT INTO `liyulin_region_conf` VALUES ('38', '3', '巢湖', '3', 'chaohu');
INSERT INTO `liyulin_region_conf` VALUES ('39', '3', '池州', '3', 'chizhou');
INSERT INTO `liyulin_region_conf` VALUES ('40', '3', '滁州', '3', 'chuzhou');
INSERT INTO `liyulin_region_conf` VALUES ('41', '3', '阜阳', '3', 'fuyang');
INSERT INTO `liyulin_region_conf` VALUES ('42', '3', '淮北', '3', 'huaibei');
INSERT INTO `liyulin_region_conf` VALUES ('43', '3', '淮南', '3', 'huainan');
INSERT INTO `liyulin_region_conf` VALUES ('44', '3', '黄山', '3', 'huangshan');
INSERT INTO `liyulin_region_conf` VALUES ('45', '3', '六安', '3', 'liuan');
INSERT INTO `liyulin_region_conf` VALUES ('46', '3', '马鞍山', '3', 'maanshan');
INSERT INTO `liyulin_region_conf` VALUES ('47', '3', '宿州', '3', 'suzhou');
INSERT INTO `liyulin_region_conf` VALUES ('48', '3', '铜陵', '3', 'tongling');
INSERT INTO `liyulin_region_conf` VALUES ('49', '3', '芜湖', '3', 'wuhu');
INSERT INTO `liyulin_region_conf` VALUES ('50', '3', '宣城', '3', 'xuancheng');
INSERT INTO `liyulin_region_conf` VALUES ('51', '3', '亳州', '3', 'zhou');
INSERT INTO `liyulin_region_conf` VALUES ('52', '2', '北京', '2', 'beijing');
INSERT INTO `liyulin_region_conf` VALUES ('53', '4', '福州', '3', 'fuzhou');
INSERT INTO `liyulin_region_conf` VALUES ('54', '4', '龙岩', '3', 'longyan');
INSERT INTO `liyulin_region_conf` VALUES ('55', '4', '南平', '3', 'nanping');
INSERT INTO `liyulin_region_conf` VALUES ('56', '4', '宁德', '3', 'ningde');
INSERT INTO `liyulin_region_conf` VALUES ('57', '4', '莆田', '3', 'putian');
INSERT INTO `liyulin_region_conf` VALUES ('58', '4', '泉州', '3', 'quanzhou');
INSERT INTO `liyulin_region_conf` VALUES ('59', '4', '三明', '3', 'sanming');
INSERT INTO `liyulin_region_conf` VALUES ('60', '4', '厦门', '3', 'xiamen');
INSERT INTO `liyulin_region_conf` VALUES ('61', '4', '漳州', '3', 'zhangzhou');
INSERT INTO `liyulin_region_conf` VALUES ('62', '5', '兰州', '3', 'lanzhou');
INSERT INTO `liyulin_region_conf` VALUES ('63', '5', '白银', '3', 'baiyin');
INSERT INTO `liyulin_region_conf` VALUES ('64', '5', '定西', '3', 'dingxi');
INSERT INTO `liyulin_region_conf` VALUES ('65', '5', '甘南', '3', 'gannan');
INSERT INTO `liyulin_region_conf` VALUES ('66', '5', '嘉峪关', '3', 'jiayuguan');
INSERT INTO `liyulin_region_conf` VALUES ('67', '5', '金昌', '3', 'jinchang');
INSERT INTO `liyulin_region_conf` VALUES ('68', '5', '酒泉', '3', 'jiuquan');
INSERT INTO `liyulin_region_conf` VALUES ('69', '5', '临夏', '3', 'linxia');
INSERT INTO `liyulin_region_conf` VALUES ('70', '5', '陇南', '3', 'longnan');
INSERT INTO `liyulin_region_conf` VALUES ('71', '5', '平凉', '3', 'pingliang');
INSERT INTO `liyulin_region_conf` VALUES ('72', '5', '庆阳', '3', 'qingyang');
INSERT INTO `liyulin_region_conf` VALUES ('73', '5', '天水', '3', 'tianshui');
INSERT INTO `liyulin_region_conf` VALUES ('74', '5', '武威', '3', 'wuwei');
INSERT INTO `liyulin_region_conf` VALUES ('75', '5', '张掖', '3', 'zhangye');
INSERT INTO `liyulin_region_conf` VALUES ('76', '6', '广州', '3', 'guangzhou');
INSERT INTO `liyulin_region_conf` VALUES ('77', '6', '深圳', '3', 'shen');
INSERT INTO `liyulin_region_conf` VALUES ('78', '6', '潮州', '3', 'chaozhou');
INSERT INTO `liyulin_region_conf` VALUES ('79', '6', '东莞', '3', 'dong');
INSERT INTO `liyulin_region_conf` VALUES ('80', '6', '佛山', '3', 'foshan');
INSERT INTO `liyulin_region_conf` VALUES ('81', '6', '河源', '3', 'heyuan');
INSERT INTO `liyulin_region_conf` VALUES ('82', '6', '惠州', '3', 'huizhou');
INSERT INTO `liyulin_region_conf` VALUES ('83', '6', '江门', '3', 'jiangmen');
INSERT INTO `liyulin_region_conf` VALUES ('84', '6', '揭阳', '3', 'jieyang');
INSERT INTO `liyulin_region_conf` VALUES ('85', '6', '茂名', '3', 'maoming');
INSERT INTO `liyulin_region_conf` VALUES ('86', '6', '梅州', '3', 'meizhou');
INSERT INTO `liyulin_region_conf` VALUES ('87', '6', '清远', '3', 'qingyuan');
INSERT INTO `liyulin_region_conf` VALUES ('88', '6', '汕头', '3', 'shantou');
INSERT INTO `liyulin_region_conf` VALUES ('89', '6', '汕尾', '3', 'shanwei');
INSERT INTO `liyulin_region_conf` VALUES ('90', '6', '韶关', '3', 'shaoguan');
INSERT INTO `liyulin_region_conf` VALUES ('91', '6', '阳江', '3', 'yangjiang');
INSERT INTO `liyulin_region_conf` VALUES ('92', '6', '云浮', '3', 'yunfu');
INSERT INTO `liyulin_region_conf` VALUES ('93', '6', '湛江', '3', 'zhanjiang');
INSERT INTO `liyulin_region_conf` VALUES ('94', '6', '肇庆', '3', 'zhaoqing');
INSERT INTO `liyulin_region_conf` VALUES ('95', '6', '中山', '3', 'zhongshan');
INSERT INTO `liyulin_region_conf` VALUES ('96', '6', '珠海', '3', 'zhuhai');
INSERT INTO `liyulin_region_conf` VALUES ('97', '7', '南宁', '3', 'nanning');
INSERT INTO `liyulin_region_conf` VALUES ('98', '7', '桂林', '3', 'guilin');
INSERT INTO `liyulin_region_conf` VALUES ('99', '7', '百色', '3', 'baise');
INSERT INTO `liyulin_region_conf` VALUES ('100', '7', '北海', '3', 'beihai');
INSERT INTO `liyulin_region_conf` VALUES ('101', '7', '崇左', '3', 'chongzuo');
INSERT INTO `liyulin_region_conf` VALUES ('102', '7', '防城港', '3', 'fangchenggang');
INSERT INTO `liyulin_region_conf` VALUES ('103', '7', '贵港', '3', 'guigang');
INSERT INTO `liyulin_region_conf` VALUES ('104', '7', '河池', '3', 'hechi');
INSERT INTO `liyulin_region_conf` VALUES ('105', '7', '贺州', '3', 'hezhou');
INSERT INTO `liyulin_region_conf` VALUES ('106', '7', '来宾', '3', 'laibin');
INSERT INTO `liyulin_region_conf` VALUES ('107', '7', '柳州', '3', 'liuzhou');
INSERT INTO `liyulin_region_conf` VALUES ('108', '7', '钦州', '3', 'qinzhou');
INSERT INTO `liyulin_region_conf` VALUES ('109', '7', '梧州', '3', 'wuzhou');
INSERT INTO `liyulin_region_conf` VALUES ('110', '7', '玉林', '3', 'yulin');
INSERT INTO `liyulin_region_conf` VALUES ('111', '8', '贵阳', '3', 'guiyang');
INSERT INTO `liyulin_region_conf` VALUES ('112', '8', '安顺', '3', 'anshun');
INSERT INTO `liyulin_region_conf` VALUES ('113', '8', '毕节', '3', 'bijie');
INSERT INTO `liyulin_region_conf` VALUES ('114', '8', '六盘水', '3', 'liupanshui');
INSERT INTO `liyulin_region_conf` VALUES ('115', '8', '黔东南', '3', 'qiandongnan');
INSERT INTO `liyulin_region_conf` VALUES ('116', '8', '黔南', '3', 'qiannan');
INSERT INTO `liyulin_region_conf` VALUES ('117', '8', '黔西南', '3', 'qianxinan');
INSERT INTO `liyulin_region_conf` VALUES ('118', '8', '铜仁', '3', 'tongren');
INSERT INTO `liyulin_region_conf` VALUES ('119', '8', '遵义', '3', 'zunyi');
INSERT INTO `liyulin_region_conf` VALUES ('120', '9', '海口', '3', 'haikou');
INSERT INTO `liyulin_region_conf` VALUES ('121', '9', '三亚', '3', 'sanya');
INSERT INTO `liyulin_region_conf` VALUES ('122', '9', '白沙', '3', 'baisha');
INSERT INTO `liyulin_region_conf` VALUES ('123', '9', '保亭', '3', 'baoting');
INSERT INTO `liyulin_region_conf` VALUES ('124', '9', '昌江', '3', 'changjiang');
INSERT INTO `liyulin_region_conf` VALUES ('125', '9', '澄迈县', '3', 'chengmaixian');
INSERT INTO `liyulin_region_conf` VALUES ('126', '9', '定安县', '3', 'dinganxian');
INSERT INTO `liyulin_region_conf` VALUES ('127', '9', '东方', '3', 'dongfang');
INSERT INTO `liyulin_region_conf` VALUES ('128', '9', '乐东', '3', 'ledong');
INSERT INTO `liyulin_region_conf` VALUES ('129', '9', '临高县', '3', 'lingaoxian');
INSERT INTO `liyulin_region_conf` VALUES ('130', '9', '陵水', '3', 'lingshui');
INSERT INTO `liyulin_region_conf` VALUES ('131', '9', '琼海', '3', 'qionghai');
INSERT INTO `liyulin_region_conf` VALUES ('132', '9', '琼中', '3', 'qiongzhong');
INSERT INTO `liyulin_region_conf` VALUES ('133', '9', '屯昌县', '3', 'tunchangxian');
INSERT INTO `liyulin_region_conf` VALUES ('134', '9', '万宁', '3', 'wanning');
INSERT INTO `liyulin_region_conf` VALUES ('135', '9', '文昌', '3', 'wenchang');
INSERT INTO `liyulin_region_conf` VALUES ('136', '9', '五指山', '3', 'wuzhishan');
INSERT INTO `liyulin_region_conf` VALUES ('137', '9', '儋州', '3', 'zhou');
INSERT INTO `liyulin_region_conf` VALUES ('138', '10', '石家庄', '3', 'shijiazhuang');
INSERT INTO `liyulin_region_conf` VALUES ('139', '10', '保定', '3', 'baoding');
INSERT INTO `liyulin_region_conf` VALUES ('140', '10', '沧州', '3', 'cangzhou');
INSERT INTO `liyulin_region_conf` VALUES ('141', '10', '承德', '3', 'chengde');
INSERT INTO `liyulin_region_conf` VALUES ('142', '10', '邯郸', '3', 'handan');
INSERT INTO `liyulin_region_conf` VALUES ('143', '10', '衡水', '3', 'hengshui');
INSERT INTO `liyulin_region_conf` VALUES ('144', '10', '廊坊', '3', 'langfang');
INSERT INTO `liyulin_region_conf` VALUES ('145', '10', '秦皇岛', '3', 'qinhuangdao');
INSERT INTO `liyulin_region_conf` VALUES ('146', '10', '唐山', '3', 'tangshan');
INSERT INTO `liyulin_region_conf` VALUES ('147', '10', '邢台', '3', 'xingtai');
INSERT INTO `liyulin_region_conf` VALUES ('148', '10', '张家口', '3', 'zhangjiakou');
INSERT INTO `liyulin_region_conf` VALUES ('149', '11', '郑州', '3', 'zhengzhou');
INSERT INTO `liyulin_region_conf` VALUES ('150', '11', '洛阳', '3', 'luoyang');
INSERT INTO `liyulin_region_conf` VALUES ('151', '11', '开封', '3', 'kaifeng');
INSERT INTO `liyulin_region_conf` VALUES ('152', '11', '安阳', '3', 'anyang');
INSERT INTO `liyulin_region_conf` VALUES ('153', '11', '鹤壁', '3', 'hebi');
INSERT INTO `liyulin_region_conf` VALUES ('154', '11', '济源', '3', 'jiyuan');
INSERT INTO `liyulin_region_conf` VALUES ('155', '11', '焦作', '3', 'jiaozuo');
INSERT INTO `liyulin_region_conf` VALUES ('156', '11', '南阳', '3', 'nanyang');
INSERT INTO `liyulin_region_conf` VALUES ('157', '11', '平顶山', '3', 'pingdingshan');
INSERT INTO `liyulin_region_conf` VALUES ('158', '11', '三门峡', '3', 'sanmenxia');
INSERT INTO `liyulin_region_conf` VALUES ('159', '11', '商丘', '3', 'shangqiu');
INSERT INTO `liyulin_region_conf` VALUES ('160', '11', '新乡', '3', 'xinxiang');
INSERT INTO `liyulin_region_conf` VALUES ('161', '11', '信阳', '3', 'xinyang');
INSERT INTO `liyulin_region_conf` VALUES ('162', '11', '许昌', '3', 'xuchang');
INSERT INTO `liyulin_region_conf` VALUES ('163', '11', '周口', '3', 'zhoukou');
INSERT INTO `liyulin_region_conf` VALUES ('164', '11', '驻马店', '3', 'zhumadian');
INSERT INTO `liyulin_region_conf` VALUES ('165', '11', '漯河', '3', 'he');
INSERT INTO `liyulin_region_conf` VALUES ('166', '11', '濮阳', '3', 'yang');
INSERT INTO `liyulin_region_conf` VALUES ('167', '12', '哈尔滨', '3', 'haerbin');
INSERT INTO `liyulin_region_conf` VALUES ('168', '12', '大庆', '3', 'daqing');
INSERT INTO `liyulin_region_conf` VALUES ('169', '12', '大兴安岭', '3', 'daxinganling');
INSERT INTO `liyulin_region_conf` VALUES ('170', '12', '鹤岗', '3', 'hegang');
INSERT INTO `liyulin_region_conf` VALUES ('171', '12', '黑河', '3', 'heihe');
INSERT INTO `liyulin_region_conf` VALUES ('172', '12', '鸡西', '3', 'jixi');
INSERT INTO `liyulin_region_conf` VALUES ('173', '12', '佳木斯', '3', 'jiamusi');
INSERT INTO `liyulin_region_conf` VALUES ('174', '12', '牡丹江', '3', 'mudanjiang');
INSERT INTO `liyulin_region_conf` VALUES ('175', '12', '七台河', '3', 'qitaihe');
INSERT INTO `liyulin_region_conf` VALUES ('176', '12', '齐齐哈尔', '3', 'qiqihaer');
INSERT INTO `liyulin_region_conf` VALUES ('177', '12', '双鸭山', '3', 'shuangyashan');
INSERT INTO `liyulin_region_conf` VALUES ('178', '12', '绥化', '3', 'suihua');
INSERT INTO `liyulin_region_conf` VALUES ('179', '12', '伊春', '3', 'yichun');
INSERT INTO `liyulin_region_conf` VALUES ('180', '13', '武汉', '3', 'wuhan');
INSERT INTO `liyulin_region_conf` VALUES ('181', '13', '仙桃', '3', 'xiantao');
INSERT INTO `liyulin_region_conf` VALUES ('182', '13', '鄂州', '3', 'ezhou');
INSERT INTO `liyulin_region_conf` VALUES ('183', '13', '黄冈', '3', 'huanggang');
INSERT INTO `liyulin_region_conf` VALUES ('184', '13', '黄石', '3', 'huangshi');
INSERT INTO `liyulin_region_conf` VALUES ('185', '13', '荆门', '3', 'jingmen');
INSERT INTO `liyulin_region_conf` VALUES ('186', '13', '荆州', '3', 'jingzhou');
INSERT INTO `liyulin_region_conf` VALUES ('187', '13', '潜江', '3', 'qianjiang');
INSERT INTO `liyulin_region_conf` VALUES ('188', '13', '神农架林区', '3', 'shennongjialinqu');
INSERT INTO `liyulin_region_conf` VALUES ('189', '13', '十堰', '3', 'shiyan');
INSERT INTO `liyulin_region_conf` VALUES ('190', '13', '随州', '3', 'suizhou');
INSERT INTO `liyulin_region_conf` VALUES ('191', '13', '天门', '3', 'tianmen');
INSERT INTO `liyulin_region_conf` VALUES ('192', '13', '咸宁', '3', 'xianning');
INSERT INTO `liyulin_region_conf` VALUES ('193', '13', '襄阳', '3', 'xiangyang');
INSERT INTO `liyulin_region_conf` VALUES ('194', '13', '孝感', '3', 'xiaogan');
INSERT INTO `liyulin_region_conf` VALUES ('195', '13', '宜昌', '3', 'yichang');
INSERT INTO `liyulin_region_conf` VALUES ('196', '13', '恩施', '3', 'enshi');
INSERT INTO `liyulin_region_conf` VALUES ('197', '14', '长沙', '3', 'changsha');
INSERT INTO `liyulin_region_conf` VALUES ('198', '14', '张家界', '3', 'zhangjiajie');
INSERT INTO `liyulin_region_conf` VALUES ('199', '14', '常德', '3', 'changde');
INSERT INTO `liyulin_region_conf` VALUES ('200', '14', '郴州', '3', 'chenzhou');
INSERT INTO `liyulin_region_conf` VALUES ('201', '14', '衡阳', '3', 'hengyang');
INSERT INTO `liyulin_region_conf` VALUES ('202', '14', '怀化', '3', 'huaihua');
INSERT INTO `liyulin_region_conf` VALUES ('203', '14', '娄底', '3', 'loudi');
INSERT INTO `liyulin_region_conf` VALUES ('204', '14', '邵阳', '3', 'shaoyang');
INSERT INTO `liyulin_region_conf` VALUES ('205', '14', '湘潭', '3', 'xiangtan');
INSERT INTO `liyulin_region_conf` VALUES ('206', '14', '湘西', '3', 'xiangxi');
INSERT INTO `liyulin_region_conf` VALUES ('207', '14', '益阳', '3', 'yiyang');
INSERT INTO `liyulin_region_conf` VALUES ('208', '14', '永州', '3', 'yongzhou');
INSERT INTO `liyulin_region_conf` VALUES ('209', '14', '岳阳', '3', 'yueyang');
INSERT INTO `liyulin_region_conf` VALUES ('210', '14', '株洲', '3', 'zhuzhou');
INSERT INTO `liyulin_region_conf` VALUES ('211', '15', '长春', '3', 'changchun');
INSERT INTO `liyulin_region_conf` VALUES ('212', '15', '吉林', '3', 'jilin');
INSERT INTO `liyulin_region_conf` VALUES ('213', '15', '白城', '3', 'baicheng');
INSERT INTO `liyulin_region_conf` VALUES ('214', '15', '白山', '3', 'baishan');
INSERT INTO `liyulin_region_conf` VALUES ('215', '15', '辽源', '3', 'liaoyuan');
INSERT INTO `liyulin_region_conf` VALUES ('216', '15', '四平', '3', 'siping');
INSERT INTO `liyulin_region_conf` VALUES ('217', '15', '松原', '3', 'songyuan');
INSERT INTO `liyulin_region_conf` VALUES ('218', '15', '通化', '3', 'tonghua');
INSERT INTO `liyulin_region_conf` VALUES ('219', '15', '延边', '3', 'yanbian');
INSERT INTO `liyulin_region_conf` VALUES ('220', '16', '南京', '3', 'nanjing');
INSERT INTO `liyulin_region_conf` VALUES ('221', '16', '苏州', '3', 'suzhou');
INSERT INTO `liyulin_region_conf` VALUES ('222', '16', '无锡', '3', 'wuxi');
INSERT INTO `liyulin_region_conf` VALUES ('223', '16', '常州', '3', 'changzhou');
INSERT INTO `liyulin_region_conf` VALUES ('224', '16', '淮安', '3', 'huaian');
INSERT INTO `liyulin_region_conf` VALUES ('225', '16', '连云港', '3', 'lianyungang');
INSERT INTO `liyulin_region_conf` VALUES ('226', '16', '南通', '3', 'nantong');
INSERT INTO `liyulin_region_conf` VALUES ('227', '16', '宿迁', '3', 'suqian');
INSERT INTO `liyulin_region_conf` VALUES ('228', '16', '泰州', '3', 'taizhou');
INSERT INTO `liyulin_region_conf` VALUES ('229', '16', '徐州', '3', 'xuzhou');
INSERT INTO `liyulin_region_conf` VALUES ('230', '16', '盐城', '3', 'yancheng');
INSERT INTO `liyulin_region_conf` VALUES ('231', '16', '扬州', '3', 'yangzhou');
INSERT INTO `liyulin_region_conf` VALUES ('232', '16', '镇江', '3', 'zhenjiang');
INSERT INTO `liyulin_region_conf` VALUES ('233', '17', '南昌', '3', 'nanchang');
INSERT INTO `liyulin_region_conf` VALUES ('234', '17', '抚州', '3', 'fuzhou');
INSERT INTO `liyulin_region_conf` VALUES ('235', '17', '赣州', '3', 'ganzhou');
INSERT INTO `liyulin_region_conf` VALUES ('236', '17', '吉安', '3', 'jian');
INSERT INTO `liyulin_region_conf` VALUES ('237', '17', '景德镇', '3', 'jingdezhen');
INSERT INTO `liyulin_region_conf` VALUES ('238', '17', '九江', '3', 'jiujiang');
INSERT INTO `liyulin_region_conf` VALUES ('239', '17', '萍乡', '3', 'pingxiang');
INSERT INTO `liyulin_region_conf` VALUES ('240', '17', '上饶', '3', 'shangrao');
INSERT INTO `liyulin_region_conf` VALUES ('241', '17', '新余', '3', 'xinyu');
INSERT INTO `liyulin_region_conf` VALUES ('242', '17', '宜春', '3', 'yichun');
INSERT INTO `liyulin_region_conf` VALUES ('243', '17', '鹰潭', '3', 'yingtan');
INSERT INTO `liyulin_region_conf` VALUES ('244', '18', '沈阳', '3', 'shenyang');
INSERT INTO `liyulin_region_conf` VALUES ('245', '18', '大连', '3', 'dalian');
INSERT INTO `liyulin_region_conf` VALUES ('246', '18', '鞍山', '3', 'anshan');
INSERT INTO `liyulin_region_conf` VALUES ('247', '18', '本溪', '3', 'benxi');
INSERT INTO `liyulin_region_conf` VALUES ('248', '18', '朝阳', '3', 'chaoyang');
INSERT INTO `liyulin_region_conf` VALUES ('249', '18', '丹东', '3', 'dandong');
INSERT INTO `liyulin_region_conf` VALUES ('250', '18', '抚顺', '3', 'fushun');
INSERT INTO `liyulin_region_conf` VALUES ('251', '18', '阜新', '3', 'fuxin');
INSERT INTO `liyulin_region_conf` VALUES ('252', '18', '葫芦岛', '3', 'huludao');
INSERT INTO `liyulin_region_conf` VALUES ('253', '18', '锦州', '3', 'jinzhou');
INSERT INTO `liyulin_region_conf` VALUES ('254', '18', '辽阳', '3', 'liaoyang');
INSERT INTO `liyulin_region_conf` VALUES ('255', '18', '盘锦', '3', 'panjin');
INSERT INTO `liyulin_region_conf` VALUES ('256', '18', '铁岭', '3', 'tieling');
INSERT INTO `liyulin_region_conf` VALUES ('257', '18', '营口', '3', 'yingkou');
INSERT INTO `liyulin_region_conf` VALUES ('258', '19', '呼和浩特', '3', 'huhehaote');
INSERT INTO `liyulin_region_conf` VALUES ('259', '19', '阿拉善盟', '3', 'alashanmeng');
INSERT INTO `liyulin_region_conf` VALUES ('260', '19', '巴彦淖尔盟', '3', 'bayannaoermeng');
INSERT INTO `liyulin_region_conf` VALUES ('261', '19', '包头', '3', 'baotou');
INSERT INTO `liyulin_region_conf` VALUES ('262', '19', '赤峰', '3', 'chifeng');
INSERT INTO `liyulin_region_conf` VALUES ('263', '19', '鄂尔多斯', '3', 'eerduosi');
INSERT INTO `liyulin_region_conf` VALUES ('264', '19', '呼伦贝尔', '3', 'hulunbeier');
INSERT INTO `liyulin_region_conf` VALUES ('265', '19', '通辽', '3', 'tongliao');
INSERT INTO `liyulin_region_conf` VALUES ('266', '19', '乌海', '3', 'wuhai');
INSERT INTO `liyulin_region_conf` VALUES ('267', '19', '乌兰察布市', '3', 'wulanchabushi');
INSERT INTO `liyulin_region_conf` VALUES ('268', '19', '锡林郭勒盟', '3', 'xilinguolemeng');
INSERT INTO `liyulin_region_conf` VALUES ('269', '19', '兴安盟', '3', 'xinganmeng');
INSERT INTO `liyulin_region_conf` VALUES ('270', '20', '银川', '3', 'yinchuan');
INSERT INTO `liyulin_region_conf` VALUES ('271', '20', '固原', '3', 'guyuan');
INSERT INTO `liyulin_region_conf` VALUES ('272', '20', '石嘴山', '3', 'shizuishan');
INSERT INTO `liyulin_region_conf` VALUES ('273', '20', '吴忠', '3', 'wuzhong');
INSERT INTO `liyulin_region_conf` VALUES ('274', '20', '中卫', '3', 'zhongwei');
INSERT INTO `liyulin_region_conf` VALUES ('275', '21', '西宁', '3', 'xining');
INSERT INTO `liyulin_region_conf` VALUES ('276', '21', '果洛', '3', 'guoluo');
INSERT INTO `liyulin_region_conf` VALUES ('277', '21', '海北', '3', 'haibei');
INSERT INTO `liyulin_region_conf` VALUES ('278', '21', '海东', '3', 'haidong');
INSERT INTO `liyulin_region_conf` VALUES ('279', '21', '海南', '3', 'hainan');
INSERT INTO `liyulin_region_conf` VALUES ('280', '21', '海西', '3', 'haixi');
INSERT INTO `liyulin_region_conf` VALUES ('281', '21', '黄南', '3', 'huangnan');
INSERT INTO `liyulin_region_conf` VALUES ('282', '21', '玉树', '3', 'yushu');
INSERT INTO `liyulin_region_conf` VALUES ('283', '22', '济南', '3', 'jinan');
INSERT INTO `liyulin_region_conf` VALUES ('284', '22', '青岛', '3', 'qingdao');
INSERT INTO `liyulin_region_conf` VALUES ('285', '22', '滨州', '3', 'binzhou');
INSERT INTO `liyulin_region_conf` VALUES ('286', '22', '德州', '3', 'dezhou');
INSERT INTO `liyulin_region_conf` VALUES ('287', '22', '东营', '3', 'dongying');
INSERT INTO `liyulin_region_conf` VALUES ('288', '22', '菏泽', '3', 'heze');
INSERT INTO `liyulin_region_conf` VALUES ('289', '22', '济宁', '3', 'jining');
INSERT INTO `liyulin_region_conf` VALUES ('290', '22', '莱芜', '3', 'laiwu');
INSERT INTO `liyulin_region_conf` VALUES ('291', '22', '聊城', '3', 'liaocheng');
INSERT INTO `liyulin_region_conf` VALUES ('292', '22', '临沂', '3', 'linyi');
INSERT INTO `liyulin_region_conf` VALUES ('293', '22', '日照', '3', 'rizhao');
INSERT INTO `liyulin_region_conf` VALUES ('294', '22', '泰安', '3', 'taian');
INSERT INTO `liyulin_region_conf` VALUES ('295', '22', '威海', '3', 'weihai');
INSERT INTO `liyulin_region_conf` VALUES ('296', '22', '潍坊', '3', 'weifang');
INSERT INTO `liyulin_region_conf` VALUES ('297', '22', '烟台', '3', 'yantai');
INSERT INTO `liyulin_region_conf` VALUES ('298', '22', '枣庄', '3', 'zaozhuang');
INSERT INTO `liyulin_region_conf` VALUES ('299', '22', '淄博', '3', 'zibo');
INSERT INTO `liyulin_region_conf` VALUES ('300', '23', '太原', '3', 'taiyuan');
INSERT INTO `liyulin_region_conf` VALUES ('301', '23', '长治', '3', 'changzhi');
INSERT INTO `liyulin_region_conf` VALUES ('302', '23', '大同', '3', 'datong');
INSERT INTO `liyulin_region_conf` VALUES ('303', '23', '晋城', '3', 'jincheng');
INSERT INTO `liyulin_region_conf` VALUES ('304', '23', '晋中', '3', 'jinzhong');
INSERT INTO `liyulin_region_conf` VALUES ('305', '23', '临汾', '3', 'linfen');
INSERT INTO `liyulin_region_conf` VALUES ('306', '23', '吕梁', '3', 'lvliang');
INSERT INTO `liyulin_region_conf` VALUES ('307', '23', '朔州', '3', 'shuozhou');
INSERT INTO `liyulin_region_conf` VALUES ('308', '23', '忻州', '3', 'xinzhou');
INSERT INTO `liyulin_region_conf` VALUES ('309', '23', '阳泉', '3', 'yangquan');
INSERT INTO `liyulin_region_conf` VALUES ('310', '23', '运城', '3', 'yuncheng');
INSERT INTO `liyulin_region_conf` VALUES ('311', '24', '西安', '3', 'xian');
INSERT INTO `liyulin_region_conf` VALUES ('312', '24', '安康', '3', 'ankang');
INSERT INTO `liyulin_region_conf` VALUES ('313', '24', '宝鸡', '3', 'baoji');
INSERT INTO `liyulin_region_conf` VALUES ('314', '24', '汉中', '3', 'hanzhong');
INSERT INTO `liyulin_region_conf` VALUES ('315', '24', '商洛', '3', 'shangluo');
INSERT INTO `liyulin_region_conf` VALUES ('316', '24', '铜川', '3', 'tongchuan');
INSERT INTO `liyulin_region_conf` VALUES ('317', '24', '渭南', '3', 'weinan');
INSERT INTO `liyulin_region_conf` VALUES ('318', '24', '咸阳', '3', 'xianyang');
INSERT INTO `liyulin_region_conf` VALUES ('319', '24', '延安', '3', 'yanan');
INSERT INTO `liyulin_region_conf` VALUES ('320', '24', '榆林', '3', 'yulin');
INSERT INTO `liyulin_region_conf` VALUES ('321', '25', '上海', '2', 'shanghai');
INSERT INTO `liyulin_region_conf` VALUES ('322', '26', '成都', '3', 'chengdu');
INSERT INTO `liyulin_region_conf` VALUES ('323', '26', '绵阳', '3', 'mianyang');
INSERT INTO `liyulin_region_conf` VALUES ('324', '26', '阿坝', '3', 'aba');
INSERT INTO `liyulin_region_conf` VALUES ('325', '26', '巴中', '3', 'bazhong');
INSERT INTO `liyulin_region_conf` VALUES ('326', '26', '达州', '3', 'dazhou');
INSERT INTO `liyulin_region_conf` VALUES ('327', '26', '德阳', '3', 'deyang');
INSERT INTO `liyulin_region_conf` VALUES ('328', '26', '甘孜', '3', 'ganzi');
INSERT INTO `liyulin_region_conf` VALUES ('329', '26', '广安', '3', 'guangan');
INSERT INTO `liyulin_region_conf` VALUES ('330', '26', '广元', '3', 'guangyuan');
INSERT INTO `liyulin_region_conf` VALUES ('331', '26', '乐山', '3', 'leshan');
INSERT INTO `liyulin_region_conf` VALUES ('332', '26', '凉山', '3', 'liangshan');
INSERT INTO `liyulin_region_conf` VALUES ('333', '26', '眉山', '3', 'meishan');
INSERT INTO `liyulin_region_conf` VALUES ('334', '26', '南充', '3', 'nanchong');
INSERT INTO `liyulin_region_conf` VALUES ('335', '26', '内江', '3', 'neijiang');
INSERT INTO `liyulin_region_conf` VALUES ('336', '26', '攀枝花', '3', 'panzhihua');
INSERT INTO `liyulin_region_conf` VALUES ('337', '26', '遂宁', '3', 'suining');
INSERT INTO `liyulin_region_conf` VALUES ('338', '26', '雅安', '3', 'yaan');
INSERT INTO `liyulin_region_conf` VALUES ('339', '26', '宜宾', '3', 'yibin');
INSERT INTO `liyulin_region_conf` VALUES ('340', '26', '资阳', '3', 'ziyang');
INSERT INTO `liyulin_region_conf` VALUES ('341', '26', '自贡', '3', 'zigong');
INSERT INTO `liyulin_region_conf` VALUES ('342', '26', '泸州', '3', 'zhou');
INSERT INTO `liyulin_region_conf` VALUES ('343', '27', '天津', '2', 'tianjin');
INSERT INTO `liyulin_region_conf` VALUES ('344', '28', '拉萨', '3', 'lasa');
INSERT INTO `liyulin_region_conf` VALUES ('345', '28', '阿里', '3', 'ali');
INSERT INTO `liyulin_region_conf` VALUES ('346', '28', '昌都', '3', 'changdu');
INSERT INTO `liyulin_region_conf` VALUES ('347', '28', '林芝', '3', 'linzhi');
INSERT INTO `liyulin_region_conf` VALUES ('348', '28', '那曲', '3', 'naqu');
INSERT INTO `liyulin_region_conf` VALUES ('349', '28', '日喀则', '3', 'rikaze');
INSERT INTO `liyulin_region_conf` VALUES ('350', '28', '山南', '3', 'shannan');
INSERT INTO `liyulin_region_conf` VALUES ('351', '29', '乌鲁木齐', '3', 'wulumuqi');
INSERT INTO `liyulin_region_conf` VALUES ('352', '29', '阿克苏', '3', 'akesu');
INSERT INTO `liyulin_region_conf` VALUES ('353', '29', '阿拉尔', '3', 'alaer');
INSERT INTO `liyulin_region_conf` VALUES ('354', '29', '巴音郭楞', '3', 'bayinguoleng');
INSERT INTO `liyulin_region_conf` VALUES ('355', '29', '博尔塔拉', '3', 'boertala');
INSERT INTO `liyulin_region_conf` VALUES ('356', '29', '昌吉', '3', 'changji');
INSERT INTO `liyulin_region_conf` VALUES ('357', '29', '哈密', '3', 'hami');
INSERT INTO `liyulin_region_conf` VALUES ('358', '29', '和田', '3', 'hetian');
INSERT INTO `liyulin_region_conf` VALUES ('359', '29', '喀什', '3', 'kashi');
INSERT INTO `liyulin_region_conf` VALUES ('360', '29', '克拉玛依', '3', 'kelamayi');
INSERT INTO `liyulin_region_conf` VALUES ('361', '29', '克孜勒苏', '3', 'kezilesu');
INSERT INTO `liyulin_region_conf` VALUES ('362', '29', '石河子', '3', 'shihezi');
INSERT INTO `liyulin_region_conf` VALUES ('363', '29', '图木舒克', '3', 'tumushuke');
INSERT INTO `liyulin_region_conf` VALUES ('364', '29', '吐鲁番', '3', 'tulufan');
INSERT INTO `liyulin_region_conf` VALUES ('365', '29', '五家渠', '3', 'wujiaqu');
INSERT INTO `liyulin_region_conf` VALUES ('366', '29', '伊犁', '3', 'yili');
INSERT INTO `liyulin_region_conf` VALUES ('367', '30', '昆明', '3', 'kunming');
INSERT INTO `liyulin_region_conf` VALUES ('368', '30', '怒江', '3', 'nujiang');
INSERT INTO `liyulin_region_conf` VALUES ('369', '30', '普洱', '3', 'puer');
INSERT INTO `liyulin_region_conf` VALUES ('370', '30', '丽江', '3', 'lijiang');
INSERT INTO `liyulin_region_conf` VALUES ('371', '30', '保山', '3', 'baoshan');
INSERT INTO `liyulin_region_conf` VALUES ('372', '30', '楚雄', '3', 'chuxiong');
INSERT INTO `liyulin_region_conf` VALUES ('373', '30', '大理', '3', 'dali');
INSERT INTO `liyulin_region_conf` VALUES ('374', '30', '德宏', '3', 'dehong');
INSERT INTO `liyulin_region_conf` VALUES ('375', '30', '迪庆', '3', 'diqing');
INSERT INTO `liyulin_region_conf` VALUES ('376', '30', '红河', '3', 'honghe');
INSERT INTO `liyulin_region_conf` VALUES ('377', '30', '临沧', '3', 'lincang');
INSERT INTO `liyulin_region_conf` VALUES ('378', '30', '曲靖', '3', 'qujing');
INSERT INTO `liyulin_region_conf` VALUES ('379', '30', '文山', '3', 'wenshan');
INSERT INTO `liyulin_region_conf` VALUES ('380', '30', '西双版纳', '3', 'xishuangbanna');
INSERT INTO `liyulin_region_conf` VALUES ('381', '30', '玉溪', '3', 'yuxi');
INSERT INTO `liyulin_region_conf` VALUES ('382', '30', '昭通', '3', 'zhaotong');
INSERT INTO `liyulin_region_conf` VALUES ('383', '31', '杭州', '3', 'hangzhou');
INSERT INTO `liyulin_region_conf` VALUES ('384', '31', '湖州', '3', 'huzhou');
INSERT INTO `liyulin_region_conf` VALUES ('385', '31', '嘉兴', '3', 'jiaxing');
INSERT INTO `liyulin_region_conf` VALUES ('386', '31', '金华', '3', 'jinhua');
INSERT INTO `liyulin_region_conf` VALUES ('387', '31', '丽水', '3', 'lishui');
INSERT INTO `liyulin_region_conf` VALUES ('388', '31', '宁波', '3', 'ningbo');
INSERT INTO `liyulin_region_conf` VALUES ('389', '31', '绍兴', '3', 'shaoxing');
INSERT INTO `liyulin_region_conf` VALUES ('390', '31', '台州', '3', 'taizhou');
INSERT INTO `liyulin_region_conf` VALUES ('391', '31', '温州', '3', 'wenzhou');
INSERT INTO `liyulin_region_conf` VALUES ('392', '31', '舟山', '3', 'zhoushan');
INSERT INTO `liyulin_region_conf` VALUES ('393', '31', '衢州', '3', 'zhou');
INSERT INTO `liyulin_region_conf` VALUES ('394', '32', '重庆', '2', 'chongqing');
INSERT INTO `liyulin_region_conf` VALUES ('395', '33', '香港', '2', 'xianggang');
INSERT INTO `liyulin_region_conf` VALUES ('396', '34', '澳门', '2', 'aomen');
INSERT INTO `liyulin_region_conf` VALUES ('397', '35', '台湾', '2', 'taiwan');
INSERT INTO `liyulin_region_conf` VALUES ('500', '52', '东城区', '3', 'dongchengqu');
INSERT INTO `liyulin_region_conf` VALUES ('501', '52', '西城区', '3', 'xichengqu');
INSERT INTO `liyulin_region_conf` VALUES ('502', '52', '海淀区', '3', 'haidianqu');
INSERT INTO `liyulin_region_conf` VALUES ('503', '52', '朝阳区', '3', 'chaoyangqu');
INSERT INTO `liyulin_region_conf` VALUES ('504', '52', '崇文区', '3', 'chongwenqu');
INSERT INTO `liyulin_region_conf` VALUES ('505', '52', '宣武区', '3', 'xuanwuqu');
INSERT INTO `liyulin_region_conf` VALUES ('506', '52', '丰台区', '3', 'fengtaiqu');
INSERT INTO `liyulin_region_conf` VALUES ('507', '52', '石景山区', '3', 'shijingshanqu');
INSERT INTO `liyulin_region_conf` VALUES ('508', '52', '房山区', '3', 'fangshanqu');
INSERT INTO `liyulin_region_conf` VALUES ('509', '52', '门头沟区', '3', 'mentougouqu');
INSERT INTO `liyulin_region_conf` VALUES ('510', '52', '通州区', '3', 'tongzhouqu');
INSERT INTO `liyulin_region_conf` VALUES ('511', '52', '顺义区', '3', 'shunyiqu');
INSERT INTO `liyulin_region_conf` VALUES ('512', '52', '昌平区', '3', 'changpingqu');
INSERT INTO `liyulin_region_conf` VALUES ('513', '52', '怀柔区', '3', 'huairouqu');
INSERT INTO `liyulin_region_conf` VALUES ('514', '52', '平谷区', '3', 'pingguqu');
INSERT INTO `liyulin_region_conf` VALUES ('515', '52', '大兴区', '3', 'daxingqu');
INSERT INTO `liyulin_region_conf` VALUES ('516', '52', '密云县', '3', 'miyunxian');
INSERT INTO `liyulin_region_conf` VALUES ('517', '52', '延庆县', '3', 'yanqingxian');
INSERT INTO `liyulin_region_conf` VALUES ('2703', '321', '长宁区', '3', 'changningqu');
INSERT INTO `liyulin_region_conf` VALUES ('2704', '321', '闸北区', '3', 'zhabeiqu');
INSERT INTO `liyulin_region_conf` VALUES ('2705', '321', '闵行区', '3', 'xingqu');
INSERT INTO `liyulin_region_conf` VALUES ('2706', '321', '徐汇区', '3', 'xuhuiqu');
INSERT INTO `liyulin_region_conf` VALUES ('2707', '321', '浦东新区', '3', 'pudongxinqu');
INSERT INTO `liyulin_region_conf` VALUES ('2708', '321', '杨浦区', '3', 'yangpuqu');
INSERT INTO `liyulin_region_conf` VALUES ('2709', '321', '普陀区', '3', 'putuoqu');
INSERT INTO `liyulin_region_conf` VALUES ('2710', '321', '静安区', '3', 'jinganqu');
INSERT INTO `liyulin_region_conf` VALUES ('2711', '321', '卢湾区', '3', 'luwanqu');
INSERT INTO `liyulin_region_conf` VALUES ('2712', '321', '虹口区', '3', 'hongkouqu');
INSERT INTO `liyulin_region_conf` VALUES ('2713', '321', '黄浦区', '3', 'huangpuqu');
INSERT INTO `liyulin_region_conf` VALUES ('2714', '321', '南汇区', '3', 'nanhuiqu');
INSERT INTO `liyulin_region_conf` VALUES ('2715', '321', '松江区', '3', 'songjiangqu');
INSERT INTO `liyulin_region_conf` VALUES ('2716', '321', '嘉定区', '3', 'jiadingqu');
INSERT INTO `liyulin_region_conf` VALUES ('2717', '321', '宝山区', '3', 'baoshanqu');
INSERT INTO `liyulin_region_conf` VALUES ('2718', '321', '青浦区', '3', 'qingpuqu');
INSERT INTO `liyulin_region_conf` VALUES ('2719', '321', '金山区', '3', 'jinshanqu');
INSERT INTO `liyulin_region_conf` VALUES ('2720', '321', '奉贤区', '3', 'fengxianqu');
INSERT INTO `liyulin_region_conf` VALUES ('2721', '321', '崇明县', '3', 'chongmingxian');
INSERT INTO `liyulin_region_conf` VALUES ('2912', '343', '和平区', '3', 'hepingqu');
INSERT INTO `liyulin_region_conf` VALUES ('2913', '343', '河西区', '3', 'hexiqu');
INSERT INTO `liyulin_region_conf` VALUES ('2914', '343', '南开区', '3', 'nankaiqu');
INSERT INTO `liyulin_region_conf` VALUES ('2915', '343', '河北区', '3', 'hebeiqu');
INSERT INTO `liyulin_region_conf` VALUES ('2916', '343', '河东区', '3', 'hedongqu');
INSERT INTO `liyulin_region_conf` VALUES ('2917', '343', '红桥区', '3', 'hongqiaoqu');
INSERT INTO `liyulin_region_conf` VALUES ('2918', '343', '东丽区', '3', 'dongliqu');
INSERT INTO `liyulin_region_conf` VALUES ('2919', '343', '津南区', '3', 'jinnanqu');
INSERT INTO `liyulin_region_conf` VALUES ('2920', '343', '西青区', '3', 'xiqingqu');
INSERT INTO `liyulin_region_conf` VALUES ('2921', '343', '北辰区', '3', 'beichenqu');
INSERT INTO `liyulin_region_conf` VALUES ('2922', '343', '塘沽区', '3', 'tangguqu');
INSERT INTO `liyulin_region_conf` VALUES ('2923', '343', '汉沽区', '3', 'hanguqu');
INSERT INTO `liyulin_region_conf` VALUES ('2924', '343', '大港区', '3', 'dagangqu');
INSERT INTO `liyulin_region_conf` VALUES ('2925', '343', '武清区', '3', 'wuqingqu');
INSERT INTO `liyulin_region_conf` VALUES ('2926', '343', '宝坻区', '3', 'baoqu');
INSERT INTO `liyulin_region_conf` VALUES ('2927', '343', '经济开发区', '3', 'jingjikaifaqu');
INSERT INTO `liyulin_region_conf` VALUES ('2928', '343', '宁河县', '3', 'ninghexian');
INSERT INTO `liyulin_region_conf` VALUES ('2929', '343', '静海县', '3', 'jinghaixian');
INSERT INTO `liyulin_region_conf` VALUES ('2930', '343', '蓟县', '3', 'jixian');
INSERT INTO `liyulin_region_conf` VALUES ('3325', '394', '合川区', '3', 'hechuanqu');
INSERT INTO `liyulin_region_conf` VALUES ('3326', '394', '江津区', '3', 'jiangjinqu');
INSERT INTO `liyulin_region_conf` VALUES ('3327', '394', '南川区', '3', 'nanchuanqu');
INSERT INTO `liyulin_region_conf` VALUES ('3328', '394', '永川区', '3', 'yongchuanqu');
INSERT INTO `liyulin_region_conf` VALUES ('3329', '394', '南岸区', '3', 'nananqu');
INSERT INTO `liyulin_region_conf` VALUES ('3330', '394', '渝北区', '3', 'yubeiqu');
INSERT INTO `liyulin_region_conf` VALUES ('3331', '394', '万盛区', '3', 'wanshengqu');
INSERT INTO `liyulin_region_conf` VALUES ('3332', '394', '大渡口区', '3', 'dadukouqu');
INSERT INTO `liyulin_region_conf` VALUES ('3333', '394', '万州区', '3', 'wanzhouqu');
INSERT INTO `liyulin_region_conf` VALUES ('3334', '394', '北碚区', '3', 'beiqu');
INSERT INTO `liyulin_region_conf` VALUES ('3335', '394', '沙坪坝区', '3', 'shapingbaqu');
INSERT INTO `liyulin_region_conf` VALUES ('3336', '394', '巴南区', '3', 'bananqu');
INSERT INTO `liyulin_region_conf` VALUES ('3337', '394', '涪陵区', '3', 'fulingqu');
INSERT INTO `liyulin_region_conf` VALUES ('3338', '394', '江北区', '3', 'jiangbeiqu');
INSERT INTO `liyulin_region_conf` VALUES ('3339', '394', '九龙坡区', '3', 'jiulongpoqu');
INSERT INTO `liyulin_region_conf` VALUES ('3340', '394', '渝中区', '3', 'yuzhongqu');
INSERT INTO `liyulin_region_conf` VALUES ('3341', '394', '黔江开发区', '3', 'qianjiangkaifaqu');
INSERT INTO `liyulin_region_conf` VALUES ('3342', '394', '长寿区', '3', 'changshouqu');
INSERT INTO `liyulin_region_conf` VALUES ('3343', '394', '双桥区', '3', 'shuangqiaoqu');
INSERT INTO `liyulin_region_conf` VALUES ('3344', '394', '綦江县', '3', 'jiangxian');
INSERT INTO `liyulin_region_conf` VALUES ('3345', '394', '潼南县', '3', 'nanxian');
INSERT INTO `liyulin_region_conf` VALUES ('3346', '394', '铜梁县', '3', 'tongliangxian');
INSERT INTO `liyulin_region_conf` VALUES ('3347', '394', '大足县', '3', 'dazuxian');
INSERT INTO `liyulin_region_conf` VALUES ('3348', '394', '荣昌县', '3', 'rongchangxian');
INSERT INTO `liyulin_region_conf` VALUES ('3349', '394', '璧山县', '3', 'shanxian');
INSERT INTO `liyulin_region_conf` VALUES ('3350', '394', '垫江县', '3', 'dianjiangxian');
INSERT INTO `liyulin_region_conf` VALUES ('3351', '394', '武隆县', '3', 'wulongxian');
INSERT INTO `liyulin_region_conf` VALUES ('3352', '394', '丰都县', '3', 'fengduxian');
INSERT INTO `liyulin_region_conf` VALUES ('3353', '394', '城口县', '3', 'chengkouxian');
INSERT INTO `liyulin_region_conf` VALUES ('3354', '394', '梁平县', '3', 'liangpingxian');
INSERT INTO `liyulin_region_conf` VALUES ('3355', '394', '开县', '3', 'kaixian');
INSERT INTO `liyulin_region_conf` VALUES ('3356', '394', '巫溪县', '3', 'wuxixian');
INSERT INTO `liyulin_region_conf` VALUES ('3357', '394', '巫山县', '3', 'wushanxian');
INSERT INTO `liyulin_region_conf` VALUES ('3358', '394', '奉节县', '3', 'fengjiexian');
INSERT INTO `liyulin_region_conf` VALUES ('3359', '394', '云阳县', '3', 'yunyangxian');
INSERT INTO `liyulin_region_conf` VALUES ('3360', '394', '忠县', '3', 'zhongxian');
INSERT INTO `liyulin_region_conf` VALUES ('3361', '394', '石柱', '3', 'shizhu');
INSERT INTO `liyulin_region_conf` VALUES ('3362', '394', '彭水', '3', 'pengshui');
INSERT INTO `liyulin_region_conf` VALUES ('3363', '394', '酉阳', '3', 'youyang');
INSERT INTO `liyulin_region_conf` VALUES ('3364', '394', '秀山', '3', 'xiushan');
INSERT INTO `liyulin_region_conf` VALUES ('3365', '395', '沙田区', '3', 'shatianqu');
INSERT INTO `liyulin_region_conf` VALUES ('3366', '395', '东区', '3', 'dongqu');
INSERT INTO `liyulin_region_conf` VALUES ('3367', '395', '观塘区', '3', 'guantangqu');
INSERT INTO `liyulin_region_conf` VALUES ('3368', '395', '黄大仙区', '3', 'huangdaxianqu');
INSERT INTO `liyulin_region_conf` VALUES ('3369', '395', '九龙城区', '3', 'jiulongchengqu');
INSERT INTO `liyulin_region_conf` VALUES ('3370', '395', '屯门区', '3', 'tunmenqu');
INSERT INTO `liyulin_region_conf` VALUES ('3371', '395', '葵青区', '3', 'kuiqingqu');
INSERT INTO `liyulin_region_conf` VALUES ('3372', '395', '元朗区', '3', 'yuanlangqu');
INSERT INTO `liyulin_region_conf` VALUES ('3373', '395', '深水埗区', '3', 'shenshui');
INSERT INTO `liyulin_region_conf` VALUES ('3374', '395', '西贡区', '3', 'xigongqu');
INSERT INTO `liyulin_region_conf` VALUES ('3375', '395', '大埔区', '3', 'dapuqu');
INSERT INTO `liyulin_region_conf` VALUES ('3376', '395', '湾仔区', '3', 'wanziqu');
INSERT INTO `liyulin_region_conf` VALUES ('3377', '395', '油尖旺区', '3', 'youjianwangqu');
INSERT INTO `liyulin_region_conf` VALUES ('3378', '395', '北区', '3', 'beiqu');
INSERT INTO `liyulin_region_conf` VALUES ('3379', '395', '南区', '3', 'nanqu');
INSERT INTO `liyulin_region_conf` VALUES ('3380', '395', '荃湾区', '3', 'wanqu');
INSERT INTO `liyulin_region_conf` VALUES ('3381', '395', '中西区', '3', 'zhongxiqu');
INSERT INTO `liyulin_region_conf` VALUES ('3382', '395', '离岛区', '3', 'lidaoqu');
INSERT INTO `liyulin_region_conf` VALUES ('3383', '396', '澳门', '3', 'aomen');
INSERT INTO `liyulin_region_conf` VALUES ('3384', '397', '台北', '3', 'taibei');
INSERT INTO `liyulin_region_conf` VALUES ('3385', '397', '高雄', '3', 'gaoxiong');
INSERT INTO `liyulin_region_conf` VALUES ('3386', '397', '基隆', '3', 'jilong');
INSERT INTO `liyulin_region_conf` VALUES ('3387', '397', '台中', '3', 'taizhong');
INSERT INTO `liyulin_region_conf` VALUES ('3388', '397', '台南', '3', 'tainan');
INSERT INTO `liyulin_region_conf` VALUES ('3389', '397', '新竹', '3', 'xinzhu');
INSERT INTO `liyulin_region_conf` VALUES ('3390', '397', '嘉义', '3', 'jiayi');
INSERT INTO `liyulin_region_conf` VALUES ('3391', '397', '宜兰县', '3', 'yilanxian');
INSERT INTO `liyulin_region_conf` VALUES ('3392', '397', '桃园县', '3', 'taoyuanxian');
INSERT INTO `liyulin_region_conf` VALUES ('3393', '397', '苗栗县', '3', 'miaolixian');
INSERT INTO `liyulin_region_conf` VALUES ('3394', '397', '彰化县', '3', 'zhanghuaxian');
INSERT INTO `liyulin_region_conf` VALUES ('3395', '397', '南投县', '3', 'nantouxian');
INSERT INTO `liyulin_region_conf` VALUES ('3396', '397', '云林县', '3', 'yunlinxian');
INSERT INTO `liyulin_region_conf` VALUES ('3397', '397', '屏东县', '3', 'pingdongxian');
INSERT INTO `liyulin_region_conf` VALUES ('3398', '397', '台东县', '3', 'taidongxian');
INSERT INTO `liyulin_region_conf` VALUES ('3399', '397', '花莲县', '3', 'hualianxian');
INSERT INTO `liyulin_region_conf` VALUES ('3400', '397', '澎湖县', '3', 'penghuxian');
INSERT INTO `liyulin_region_conf` VALUES ('2', '3', '合肥', '3', 'hefei');
INSERT INTO `liyulin_region_conf` VALUES ('3401', '8', '赤水', '3', 'chishui');
INSERT INTO `liyulin_region_conf` VALUES ('3402', '1', '国外', '2', 'guowai');
INSERT INTO `liyulin_region_conf` VALUES ('3403', '3402', '新加坡', '3', 'xinjiapo');
INSERT INTO `liyulin_region_conf` VALUES ('3404', '29', '阿勒泰', '3', 'aletai');
INSERT INTO `liyulin_region_conf` VALUES ('3405', '3402', '加拿大', '3', 'jianada');
INSERT INTO `liyulin_region_conf` VALUES ('3406', '3402', '法国', '3', 'faguo');
INSERT INTO `liyulin_region_conf` VALUES ('3407', '3402', '韩国', '3', 'hanguo');
INSERT INTO `liyulin_region_conf` VALUES ('3408', '3402', '澳大利亚', '3', 'aodaliya');
INSERT INTO `liyulin_region_conf` VALUES ('3409', '3402', '柬埔寨', '3', 'jianpuzhai');
INSERT INTO `liyulin_region_conf` VALUES ('3410', '3402', '泰国', '3', 'taiguo');
INSERT INTO `liyulin_region_conf` VALUES ('3411', '3402', '印度', '3', 'yindu');
INSERT INTO `liyulin_region_conf` VALUES ('3412', '3402', '日本', '3', 'riben');
INSERT INTO `liyulin_region_conf` VALUES ('3413', '3402', '芬兰', '3', 'fenlan');
INSERT INTO `liyulin_region_conf` VALUES ('3414', '3402', '美国', '3', 'meiguo');
INSERT INTO `liyulin_region_conf` VALUES ('3415', '3402', '德国', '3', 'deguo');
INSERT INTO `liyulin_region_conf` VALUES ('3416', '3402', '希腊', '3', 'xila');
INSERT INTO `liyulin_region_conf` VALUES ('3417', '3402', '越南', '3', 'yuenan');
INSERT INTO `liyulin_region_conf` VALUES ('3418', '3402', '印度尼西亚', '3', 'yindunixiya');
INSERT INTO `liyulin_region_conf` VALUES ('3419', '3402', '俄罗斯', '3', 'eluosi');
INSERT INTO `liyulin_region_conf` VALUES ('3420', '3402', '新西兰', '3', 'xinxilan');

-- ----------------------------
-- Table structure for liyulin_user
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_user`;
CREATE TABLE `liyulin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cell` varchar(11) CHARACTER SET utf8 NOT NULL,
  `user_pwd` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `card_num` varchar(255) CHARACTER SET utf8 NOT NULL,
  `card_type` tinyint(1) NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `other_info` varchar(255) CHARACTER SET utf8 NOT NULL,
  `login_time` int(11) NOT NULL,
  `login_ip` varchar(255) CHARACTER SET utf8 NOT NULL,
  `create_time` int(11) NOT NULL,
  `create_type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `login_type` varchar(20) CHARACTER SET utf8 NOT NULL,
  `birthday` varchar(20) CHARACTER SET utf8 NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `is_effect` tinyint(1) NOT NULL DEFAULT '1',
  `sex` varchar(2) CHARACTER SET utf8 NOT NULL DEFAULT '2',
  `province` varchar(20) CHARACTER SET utf8 NOT NULL,
  `city` varchar(20) CHARACTER SET utf8 NOT NULL,
  `intro` varchar(25) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_user
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_web
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_web`;
CREATE TABLE `liyulin_web` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '网站名称',
  `url` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '网站域名',
  `cname_url` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'cname域名（预留）',
  `tenant_id` int(11) NOT NULL COMMENT '主办方id-与tanant表对应',
  `logo` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'logo地址',
  `slogan` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '宣传语',
  `seo_title` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '宣传语',
  `seo_keyword` varchar(255) CHARACTER SET utf8 NOT NULL,
  `seo_description` text NOT NULL,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `update_time` int(11) NOT NULL DEFAULT '0',
  `is_effect` tinyint(1) NOT NULL DEFAULT '1',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `themes_m_id` int(11) NOT NULL DEFAULT '0' COMMENT '手机主题id',
  `themes_w_id` int(11) NOT NULL DEFAULT '0' COMMENT '网页主题id',
  `layout_index` tinyint(1) NOT NULL DEFAULT '0' COMMENT '首页布局',
  `layout_other` tinyint(1) NOT NULL DEFAULT '0' COMMENT '其它布局',
  `is_create_db` tinyint(1) NOT NULL COMMENT '是否创建了该网站版本的数据库表',
  `version` int(11) NOT NULL COMMENT '网站版本',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_web
-- ----------------------------
INSERT INTO `liyulin_web` VALUES ('1', '', 'liyulin.51sai.com', '', '1', '', '', '', '', '', '0', '0', '1', '0', '0', '0', '0', '0', '1', '1');

-- ----------------------------
-- Table structure for liyulin_zh1_album
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_album`;
CREATE TABLE `liyulin_zh1_album` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `index_id` int(11) NOT NULL DEFAULT '0' COMMENT '封面图id，为0则是默认图',
  `create_time` int(11) unsigned NOT NULL,
  `is_comment` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否支持评论',
  `is_upload` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否支持用户上传',
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `display` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_album
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_zh1_album_comment
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_album_comment`;
CREATE TABLE `liyulin_zh1_album_comment` (
  `id` int(11) NOT NULL,
  `photo_id` int(11) unsigned NOT NULL,
  `album_id` int(11) unsigned NOT NULL COMMENT '方便统计',
  `content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `reply_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '回复的id',
  `reply_user_id` int(11) unsigned NOT NULL,
  `reply_user_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_album_comment
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_zh1_album_photo
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_album_photo`;
CREATE TABLE `liyulin_zh1_album_photo` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '0为公共相册,系统默认的',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image_small` varchar(255) CHARACTER SET utf8 NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `is_recommend` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '推荐',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(1) unsigned NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `view_count` int(11) unsigned NOT NULL,
  `focus_count` int(11) unsigned NOT NULL COMMENT '关注',
  `favor_count` int(11) NOT NULL COMMENT '点赞',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_album_photo
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_zh1_article
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_article`;
CREATE TABLE `liyulin_zh1_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort` smallint(3) NOT NULL,
  `title` varchar(64) CHARACTER SET utf8 NOT NULL,
  `brief` text CHARACTER SET utf8 NOT NULL,
  `content` longtext CHARACTER SET utf8 NOT NULL,
  `thumb_image` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '缩略图',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `is_recommend` tinyint(1) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  `is_comment` tinyint(1) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `file` text CHARACTER SET utf8 NOT NULL,
  `view_count` int(7) unsigned NOT NULL,
  `focus_count` int(11) unsigned NOT NULL COMMENT '关注',
  `favor_count` int(11) NOT NULL COMMENT '点赞',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_article
-- ----------------------------
INSERT INTO `liyulin_zh1_article` VALUES ('1', '0', '木木测试', '简要内容', '<p><img src=\"/ueditor/php/upload/image/20170425/1493103589754605.png\" title=\"1493103589754605.png\" alt=\"header-bg.png\"/><br/></p>', ' ', '0', '1493103909', '0', '0', '0', '0', '', '[{\"name\":\"上海需求整理.xlsx\",\"type\":\"xlsx\",\"url\":\"/public/upload/1/other/58fef522c2688.xlsx\",\"size\":\"10.942K\"}]', '0', '0', '0');
INSERT INTO `liyulin_zh1_article` VALUES ('2', '1', '测试文章', '无', '<p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; box-sizing: border-box; font-family: 微软雅黑; outline: none; word-wrap: break-word; word-break: break-all; max-width: 860px; color: rgb(51, 51, 51); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); line-height: 1.75em;\"><span style=\"padding: 0px; margin: 0px; box-sizing: border-box; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; outline: none;\">1、参赛选手须独立跑或走完全部赛程，不得乘坐马匹、不得携带和使用医用氧气，违规者将被取消参赛成绩。</span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; box-sizing: border-box; font-family: 微软雅黑; outline: none; word-wrap: break-word; word-break: break-all; max-width: 860px; color: rgb(51, 51, 51); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); line-height: 1.75em;\"><span style=\"padding: 0px; margin: 0px; box-sizing: border-box; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; outline: none;\">2、参赛选手须全程严格按照组委会官方公布赛道线路进行比赛，严禁抄近道，违规者将被取消参赛成绩。</span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; box-sizing: border-box; font-family: 微软雅黑; outline: none; word-wrap: break-word; word-break: break-all; max-width: 860px; color: rgb(51, 51, 51); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); line-height: 1.75em;\"><span style=\"padding: 0px; margin: 0px; box-sizing: border-box; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; outline: none;\">3、参赛选手严禁私自转让参赛资格或其他任何形式的替跑，由此引发的一切医疗救援、保险索赔及其他相关法律责任，均由私自转让参赛资格的双方自行承担。违规者将被取消参赛成绩，三年内禁止报名参加本赛事。</span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; box-sizing: border-box; font-family: 微软雅黑; outline: none; word-wrap: break-word; word-break: break-all; max-width: 860px; color: rgb(51, 51, 51); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); line-height: 1.75em;\"><span style=\"padding: 0px; margin: 0px; box-sizing: border-box; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; outline: none;\">4、主办方在部分检查站安排医务人员为参赛选手进行血氧浓度监测，参赛选手进入站点后，须配合工作人员和医务人员进行相关检测。</span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; box-sizing: border-box; font-family: 微软雅黑; outline: none; word-wrap: break-word; word-break: break-all; max-width: 860px; color: rgb(51, 51, 51); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); line-height: 1.75em;\"><span style=\"padding: 0px; margin: 0px; box-sizing: border-box; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; outline: none;\">5、所有检查站站长拥有部分赛事管理权，包括但不限于对违规选手进行强制退赛处理。</span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; box-sizing: border-box; font-family: 微软雅黑; outline: none; word-wrap: break-word; word-break: break-all; max-width: 860px; color: rgb(51, 51, 51); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); line-height: 1.75em;\"><span style=\"padding: 0px; margin: 0px; box-sizing: border-box; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; outline: none;\">6、退赛或被关门选手由站点医务人员判定不具备自行回到起终点能力的，将由工作人员安排马匹免费运送回起终点；其他退赛或被关门选手如需使用马匹回到起终点则需要额外支付300元人民币或50美元的救援马匹使用费。</span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; box-sizing: border-box; font-family: 微软雅黑; outline: none; word-wrap: break-word; word-break: break-all; max-width: 860px; color: rgb(51, 51, 51); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); line-height: 1.75em;\"><span style=\"padding: 0px; margin: 0px; box-sizing: border-box; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; outline: none;\">7、本次赛事积极响应并倡导“Leave No Trace”理念，敬请参赛选手切勿随意丢弃垃圾。</span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 0px; box-sizing: border-box; font-family: 微软雅黑; outline: none; word-wrap: break-word; word-break: break-all; max-width: 860px; color: rgb(51, 51, 51); font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255); line-height: 1.75em;\"><span style=\"padding: 0px; margin: 0px; box-sizing: border-box; font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; outline: none;\">8、凯乐石环四姑娘山超级越野跑比赛倡导“享受属于自己的比赛，不与他人盲目攀比”的赛事理念。</span></p><p><br/></p>', ' ', '1493103272', '1493103929', '0', '0', '0', '2', '李渝林123', '[{\"name\":\"服务器升级建议.docx\",\"type\":\"docx\",\"url\":\"/public/upload/1/other/58fef5380b8b5.docx\",\"size\":\"130.848K\"}]', '0', '0', '0');

-- ----------------------------
-- Table structure for liyulin_zh1_article_cate
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_article_cate`;
CREATE TABLE `liyulin_zh1_article_cate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_article_cate
-- ----------------------------
INSERT INTO `liyulin_zh1_article_cate` VALUES ('15', '9', '1');
INSERT INTO `liyulin_zh1_article_cate` VALUES ('14', '4', '1');
INSERT INTO `liyulin_zh1_article_cate` VALUES ('16', '4', '2');
INSERT INTO `liyulin_zh1_article_cate` VALUES ('13', '5', '1');

-- ----------------------------
-- Table structure for liyulin_zh1_article_comment
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_article_comment`;
CREATE TABLE `liyulin_zh1_article_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `create_time` int(11) NOT NULL,
  `article_auth_id` int(11) NOT NULL,
  `article_auth_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_sex` tinyint(1) NOT NULL DEFAULT '0',
  `user_birthday` int(11) NOT NULL DEFAULT '0',
  `reply_id` int(11) NOT NULL,
  `reply_user_id` int(11) NOT NULL,
  `reply_user_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_article_comment
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_zh1_article_type
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_article_type`;
CREATE TABLE `liyulin_zh1_article_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_article_type
-- ----------------------------
INSERT INTO `liyulin_zh1_article_type` VALUES ('5', '0', '文章资讯', '1492683662', '0');
INSERT INTO `liyulin_zh1_article_type` VALUES ('4', '0', '新闻公告', '1492427401', '1492596869');
INSERT INTO `liyulin_zh1_article_type` VALUES ('9', '0', '分类测试', '1493083769', '0');

-- ----------------------------
-- Table structure for liyulin_zh1_banner
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_banner`;
CREATE TABLE `liyulin_zh1_banner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image_small` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sort` tinyint(2) NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_banner
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_zh1_contacts
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_contacts`;
CREATE TABLE `liyulin_zh1_contacts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contact` varchar(16) CHARACTER SET utf8 NOT NULL,
  `qrcode` varchar(255) CHARACTER SET utf8 NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '0为电话客服，1qq客服，2微信客服',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_contacts
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_zh1_figures
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_figures`;
CREATE TABLE `liyulin_zh1_figures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sort` int(11) NOT NULL,
  `name` varchar(15) CHARACTER SET utf8 NOT NULL,
  `avatar_url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `birthday` int(11) NOT NULL,
  `province` varchar(50) CHARACTER SET utf8 NOT NULL,
  `city` varchar(50) CHARACTER SET utf8 NOT NULL,
  `height` int(3) NOT NULL,
  `weight` int(3) NOT NULL,
  `good_at` varchar(150) CHARACTER SET utf8 NOT NULL,
  `awards` text CHARACTER SET utf8 NOT NULL,
  `images` text CHARACTER SET utf8 NOT NULL,
  `intro` longtext CHARACTER SET utf8 NOT NULL,
  `is_recommend` tinyint(1) NOT NULL,
  `create_time` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_figures
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_zh1_index
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_index`;
CREATE TABLE `liyulin_zh1_index` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '内容模块名称',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT '内容模块的id',
  `ids` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '内容模块里面的内容id，以英文逗号分割',
  `sort` int(11) unsigned NOT NULL COMMENT '排序',
  `layout` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '首页布局的模块位置，0左、中，1右',
  `other_form` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '私有属性',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_index
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_zh1_nav
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_nav`;
CREATE TABLE `liyulin_zh1_nav` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `controller` varchar(255) CHARACTER SET utf8 NOT NULL,
  `action` varchar(255) NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  `parent` int(11) unsigned NOT NULL,
  `sort` int(11) unsigned NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0是网站nav，1是手机nav',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_nav
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_zh1_partner
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_partner`;
CREATE TABLE `liyulin_zh1_partner` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image_small` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '0',
  `create_time` int(11) unsigned NOT NULL,
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_partner
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_zh1_partner_type
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_partner_type`;
CREATE TABLE `liyulin_zh1_partner_type` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_effect` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_partner_type
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_zh1_sitelinks
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_sitelinks`;
CREATE TABLE `liyulin_zh1_sitelinks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `sort` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_sitelinks
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_zh1_video
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_video`;
CREATE TABLE `liyulin_zh1_video` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `source` varchar(255) CHARACTER SET utf8 NOT NULL,
  `images` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_recommend` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `create_time` int(11) unsigned NOT NULL,
  `is_delete` int(11) unsigned NOT NULL DEFAULT '0',
  `view_count` int(11) unsigned NOT NULL,
  `focus_count` int(11) unsigned NOT NULL COMMENT '关注',
  `favor_count` int(11) NOT NULL COMMENT '点赞',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_video
-- ----------------------------

-- ----------------------------
-- Table structure for liyulin_zh1_video_comment
-- ----------------------------
DROP TABLE IF EXISTS `liyulin_zh1_video_comment`;
CREATE TABLE `liyulin_zh1_video_comment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `reply_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '回复的id',
  `reply_user_id` int(11) unsigned NOT NULL,
  `reply_user_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `is_delete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of liyulin_zh1_video_comment
-- ----------------------------
