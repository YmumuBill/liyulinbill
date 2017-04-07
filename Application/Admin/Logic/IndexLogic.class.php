<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-03-23
 * Time: 19:10
 */
namespace Admin\Logic;
use Think\Controller;
class IndexLogic extends Controller{
    public function check_version(){
        $webInfo = session("webInfo");
        //给不同的租户新建表
        if($webInfo['is_create_db']==0){
            $web_id = $webInfo['id'];
            switch(intval($webInfo['version'])){
                case 0:
                    $this->version0($web_id);
                    break;
                case 1:
                    $this->version1($web_id);
                    break;
                default:
                    break;
            }

            M("web")->where(array("id"=>$webInfo['id']))->setField("is_create_db",1);
        }
    }
    //各个版本
    private function version0($id = ""){
        if($id=="")return;
        $this->create_banner($id);
        $this->create_index($id);
        $this->create_nav($id);
        $this->create_article($id);
        $this->create_article_cate($id);
        $this->create_article_type($id);
        $this->create_article_comment($id);
        $this->create_album($id);
        $this->create_album_photo($id);
        $this->create_album_comment($id);
        $this->create_contacts($id);
        $this->create_figures($id);
    }
    private function version1($id = ""){
        if($id=="")return;
        $this->version0($id);
        $this->create_video($id);
        $this->create_video_comment($id);
        $this->create_partner($id);
        $this->create_partner_type($id);
        $this->create_sitelinks($id);
    }
    //banner
    private function create_banner($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_banner";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
                `name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `url`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `image`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `image_small`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `sort`  tinyint(2) NOT NULL DEFAULT 0 ,
                `is_delete`  tinyint(1) NOT NULL DEFAULT 0 ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    //文章
    private function create_article($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_article";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) NOT NULL AUTO_INCREMENT ,
                `sort`  smallint(3) NOT NULL ,
                `title`  varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `brief`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `content`  longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `thumb_image`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '缩略图' ,
                `create_time`  int(11) NOT NULL ,
                `update_time`  int(11) NOT NULL ,
                `is_recommend`  tinyint(1) NOT NULL ,
                `is_delete`  tinyint(1) NOT NULL ,
                `is_comment`  tinyint(1) NOT NULL ,
                `admin_id`  int(11) NOT NULL ,
                `admin_name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `file`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `view_count`  int(7) UNSIGNED NOT NULL ,
                `focus_count`  int(11) UNSIGNED NOT NULL COMMENT '关注' ,
                `favor_count`  int(11) NOT NULL COMMENT '点赞' ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    private function create_article_type($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_article_type";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) NOT NULL AUTO_INCREMENT ,
                `sort`  int(11) NOT NULL ,
                `name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `create_time`  int(11) NOT NULL ,
                `update_time`  int(11) NOT NULL ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    private function create_article_cate($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_article_cate";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
                `type_id`  int(11) NOT NULL ,
                `article_id`  int(11) NOT NULL ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    private function create_article_comment($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_article_comment";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
                `article_id`  int(11) NOT NULL ,
                `content`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `create_time`  int(11) NOT NULL ,
                `article_auth_id`  int(11) NOT NULL ,
                `article_auth_name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `user_id`  int(11) NOT NULL ,
                `user_name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `user_sex`  tinyint(1) NOT NULL DEFAULT 0 ,
                `user_birthday`  int(11) NOT NULL DEFAULT 0 ,
                `reply_id`  int(11) NOT NULL ,
                `reply_user_id`  int(11) NOT NULL ,
                `reply_user_name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `is_delete`  tinyint(1) NOT NULL DEFAULT 0 ,
                `status`  tinyint(1) UNSIGNED NOT NULL DEFAULT 0 ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    //图片
    private function create_album($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_album";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
                `name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `index_id`  int(11) NOT NULL DEFAULT 0 COMMENT '封面图id，为0则是默认图' ,
                `create_time`  int(11) UNSIGNED NOT NULL ,
                `is_comment`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否支持评论' ,
                `is_upload`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否支持用户上传' ,
                `is_delete`  tinyint(1) UNSIGNED NOT NULL DEFAULT 0 ,
                `display`  tinyint(1) UNSIGNED NOT NULL DEFAULT 0 ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    private function create_album_comment($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_album_comment";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) NOT NULL ,
                `photo_id`  int(11) UNSIGNED NOT NULL ,
                `album_id`  int(11) UNSIGNED NOT NULL COMMENT '方便统计' ,
                `content`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `user_id`  int(11) NOT NULL ,
                `user_name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `reply_id`  int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '回复的id' ,
                `reply_user_id`  int(11) UNSIGNED NOT NULL ,
                `reply_user_name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `is_delete`  tinyint(1) UNSIGNED NOT NULL DEFAULT 0 ,
                `create_time`  int(11) NOT NULL ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    private function create_album_photo($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_album_photo";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
                `album_id`  int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0为公共相册,系统默认的' ,
                `name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `image`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `image_small`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `create_time`  int(11) UNSIGNED NOT NULL ,
                `is_recommend`  tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '推荐' ,
                `is_delete`  tinyint(1) NOT NULL DEFAULT 0 ,
                `user_id`  int(1) UNSIGNED NOT NULL ,
                `user_name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `view_count`  int(11) UNSIGNED NOT NULL ,
                `focus_count`  int(11) UNSIGNED NOT NULL COMMENT '关注' ,
                `favor_count`  int(11) NOT NULL COMMENT '点赞' ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    //视频
    private function create_video($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_video";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
                `name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `description`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `source`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `images`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `is_recommend`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否推荐' ,
                `create_time`  int(11) UNSIGNED NOT NULL ,
                `is_delete`  int(11) UNSIGNED NOT NULL DEFAULT 0 ,
                `view_count`  int(11) UNSIGNED NOT NULL ,
                `focus_count`  int(11) UNSIGNED NOT NULL COMMENT '关注' ,
                `favor_count`  int(11) NOT NULL COMMENT '点赞' ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    private function create_video_comment($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_video_comment";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
                `video_id`  int(11) NOT NULL ,
                `content`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `user_id`  int(11) NOT NULL ,
                `user_name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `reply_id`  int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '回复的id' ,
                `reply_user_id`  int(11) UNSIGNED NOT NULL ,
                `reply_user_name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `is_delete`  tinyint(1) UNSIGNED NOT NULL DEFAULT 0 ,
                `create_time`  int(11) NOT NULL ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    //联系方式
    private function create_contacts($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_contacts";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
                `name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `contact`  varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `qrcode`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `create_time`  int(11) UNSIGNED NOT NULL ,
                `type`  tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0为电话客服，1qq客服，2微信客服' ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    //人物
    private function create_figures($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_figures";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) NOT NULL AUTO_INCREMENT ,
                `sort`  int(11) NOT NULL ,
                `name`  varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `avatar_url`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `sex`  tinyint(1) NOT NULL ,
                `birthday`  int(11) NOT NULL ,
                `province`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `city`  varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `height`  int(3) NOT NULL ,
                `weight`  int(3) NOT NULL ,
                `good_at`  varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `awards`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `images`  text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `intro`  longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `is_recommend`  tinyint(1) NOT NULL ,
                `create_time`  int(11) NOT NULL ,
                `is_delete`  tinyint(1) NOT NULL ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    //首页
    private function create_index($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_index";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
                `name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '内容模块名称' ,
                `type`  int(11) NOT NULL DEFAULT 0 COMMENT '内容模块的id' ,
                `ids`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '内容模块里面的内容id，以英文逗号分割' ,
                `sort`  int(11) UNSIGNED NOT NULL COMMENT '排序' ,
                `layout`  tinyint(1) UNSIGNED NOT NULL DEFAULT 0 COMMENT '首页布局的模块位置，0左、中，1右' ,
                `other_form`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '私有属性' ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    //菜单导航
    private function create_nav($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_nav";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
                `name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `url`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `controller`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `action`  varchar(255) NOT NULL ,
                `level`  tinyint(1) UNSIGNED NOT NULL ,
                `parent`  int(11) UNSIGNED NOT NULL,
                `sort`  int(11) UNSIGNED NOT NULL ,
                `type`  tinyint(1) NOT NULL DEFAULT 0 COMMENT '0是网站nav，1是手机nav' ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    //合作单位
    private function create_partner($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_partner";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
                `name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `url`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `image`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `image_small`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `type`  tinyint(2) NOT NULL DEFAULT 0 ,
                `create_time`  int(11) UNSIGNED NOT NULL ,
                `sort`  int(11) NOT NULL ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    private function create_partner_type($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_partner_type";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
                `name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `is_effect`  tinyint(1) UNSIGNED NOT NULL ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }
    //友情链接
    private function create_sitelinks($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_sitelinks";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                `id`  int(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
                `name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `url`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
                `create_time`  int(11) UNSIGNED NOT NULL ,
                `sort`  int(11) UNSIGNED NOT NULL ,
                PRIMARY KEY (`id`)
                )";
        M()->execute($sql);
    }


    private function create_table($id=""){
        if($id=="") return;
        $table = "liyulin_zh".$id."_table";
        $sql = "CREATE TABLE IF NOT EXISTS `$table`(
                )";
        M()->execute($sql);
    }


    //权限认证
    public function Create_auth_table(){
        $sql = "CREATE TABLE IF NOT EXISTS `liyulin_auth_rule` (
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    `name` char(80) NOT NULL DEFAULT '',
    `title` char(20) NOT NULL DEFAULT '',
    `type` tinyint(1) NOT NULL DEFAULT '1',
    `status` tinyint(1) NOT NULL DEFAULT '1',
    `condition` char(100) NOT NULL DEFAULT '',  # 规则附件条件,满足附加条件的规则,才认为是有效的规则
    PRIMARY KEY (`id`),
    UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
        M()->execute($sql);

        $sql2 = "CREATE TABLE IF NOT EXISTS `liyulin_auth_group` (
    `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
    `title` char(100) NOT NULL DEFAULT '',
    `status` tinyint(1) NOT NULL DEFAULT '1',
    `rules` char(80) NOT NULL DEFAULT '',
    PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;";
        M()->execute($sql2);

        $sql3 = "CREATE TABLE IF NOT EXISTS `liyulin_auth_group_access` (
    `uid` mediumint(8) unsigned NOT NULL,
    `group_id` mediumint(8) unsigned NOT NULL,
    UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
    KEY `uid` (`uid`),
    KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
        M()->execute($sql3);

        $sql4 = "CREATE TABLE IF NOT EXISTS `liyulin_admin` (
`id`  int(11) NOT NULL AUTO_INCREMENT ,
`adm_name`  varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`adm_pwd`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`name`  varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`create_time`  int(11) NOT NULL ,
`login_time`  int(11) NOT NULL ,
`login_ip`  varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL ,
`is_effect`  tinyint(1) NOT NULL DEFAULT 1 ,
`is_delete`  tinyint(1) NOT NULL ,
`role_id`  int(11) NOT NULL ,
PRIMARY KEY (`id`)
)ENGINE=MyISAM DEFAULT CHARSET=utf8;";
        M()->execute($sql4);

    }

}