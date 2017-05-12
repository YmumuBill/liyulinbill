<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>后台管理系统</title>
</head>
<body>
<link rel="stylesheet" href="/public/common/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/public/common/bootstrap/css/font-awesome.min.css">
<link rel="stylesheet" href="/public/common/popup/css/popup.css">
<link rel="stylesheet" href="/public/admin/css/style.css">
<link rel="stylesheet" href="/public/admin/css/animate.css">
<link rel="stylesheet" href="/public/admin/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="/public/admin/css/common.css">
<script src="/public/common/jquery/jquery-1.8.2.min.js" type="application/javascript"></script>
<header>
    <nav class="header navbar navbar-static-top ">
        <div class="navbar-header">
            <a href="javascript:void(0);" class=" btn btn-success mm-nav-toggle show">
                <i class="icon-align-justify"></i>
            </a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="javascript:void(0);"><i class="icon-user"></i> <?php echo ($adminInfo["name"]); ?></a>
            </li>
            <li>
                <a href="<?php echo U('Admin/logout');?>">
                    <i class="icon-signout"></i> 退出
                </a>
            </li>
        </ul>
    </nav>
</header>
<script>
    $(function(){
        adjust();
        $("header .mm-nav-toggle").click(function(){
            if($(this).hasClass("show")){
                $(this).removeClass("show");
                $("#left").animate({
                    left:"-220px",
                    opacity:0,
                },"slow");
                $("#body").animate({
                    paddingLeft:"0px",
                },400);
            }
            else {
                $(this).addClass("show");
                $("#left").animate({
                    left:"0px",
                    opacity:1,
                },"slow");
                $("#body").animate({
                    paddingLeft:"220px",
                },400);
            }
        })

        window.onresize = function(){
            adjust();
        }

        function adjust(){
            var w  = document.body.clientWidth;
            if(w<=800){
                $("header .mm-nav-toggle").removeClass("show");
                $("#left").animate({
                    left:"-220px",
                    opacity:0,
                },"slow");
                $("#body").animate({
                    paddingLeft:"0px",
                },400);
            }
            else {
                $("header .mm-nav-toggle").addClass("show");
                $("#left").animate({
                    left:"0px",
                    opacity:1,
                },"slow");
                $("#body").animate({
                    paddingLeft:"220px",
                },400);
            }
        }
    })
</script>
<div id="left">
    <nav class="navbar-default navbar-static-side">
        <ul class="nav">
            <?php if(is_array($menu)): foreach($menu as $key=>$item): ?><li class="<?php echo ($item["class"]); ?>">
                    <?php if($item['level'] == 1): ?><a href="<?php echo ($item["url"]); ?>"><i class="fa <?php echo ($item["iclass"]); ?>"></i><?php echo ($item["title"]); ?></a>
                        <?php else: ?>
                        <a href="javascript:void(0)" class="mm-left-toggle-ul"><i class="fa <?php echo ($item["iclass"]); ?>"></i><?php echo ($item["title"]); ?><i class="icon-angle-left"></i></a>
                        <ul class="nav nav-second-level">
                            <?php if(is_array($item["group"])): foreach($item["group"] as $key1=>$item1): ?><li class="<?php echo ($item1["class"]); ?>"><a href="<?php echo ($item1["url"]); ?>"><i class="icon-angle-right"></i> <?php echo ($item1["title"]); ?></a></li><?php endforeach; endif; ?>
                        </ul><?php endif; ?>
                </li><?php endforeach; endif; ?>
        </ul>
    </nav>
</div>
<script>
    $(function(){
        $("#left .mm-left-toggle-ul").click(function(){
            var par = $(this).parents("li");
            if( $(par).hasClass("on") ){
                $(par).find("ul").slideUp(300);
                $(par).removeClass("on");

            }
            else{
                $(par).find("ul").slideDown(300);
                $(par).addClass("on");

            }
        });
    })
</script>
<style>
    .award-item{   position: relative;  padding-right: 20px;  margin-bottom: 10px;  }
    .award-item .award_action{      position: absolute;  right: 0;  top: 0;  font-size: 20px;  cursor: pointer;  color: #888;  }
</style>
<link rel="stylesheet" href="/public/common/date/css/laydate.css">
<div id="body">
    <div class="row wrapper mm-head-nav">
        <div class="col-lg-10">
            <h2>人物简历</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo U('Index/index');?>">主页</a>
                </li>
                <li>
                    <strong>人物简历</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="ibox animated fadeInRight">
        <div class="ibox-content">
            <form class="form-horizontal form-row-border" action="" method="post" proxy="auto" novalidate="">
                <div class="row">
                    <div class="col-md-9 form-fieldset">
                        <div class="form-group has-feedback">
                            <label class="col-md-3 control-label">姓名: </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="name" title="姓名" value="<?php echo ($figures_info["name"]); ?>" placeholder="输入姓名" validator="required|maxLength(15)" maxlength="15">
                                <span class="form-control-feedback" id="inputFeedbackOfName">0/15</span>
                                <input type="hidden" name="id" value="<?php echo ($figures_info["id"]); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">性别: </label>
                            <div class="col-md-9">
                                <label class="radio-inline">
                                    <input type="radio" name="sex" value="0" <?php if($figures_info['sex'] == 0): ?>checked=""<?php endif; ?>>男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" value="1" <?php if($figures_info['sex'] == 1): ?>checked=""<?php endif; ?>>女
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">出生年月: </label>
                            <div class="col-md-9 form-inline" id="birthdaySelect" role="date-select">
                                <input type="text" class="laydate-icon mm-input-text" value="" name="birthday" id="birthday" style="width: 242px;"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">籍贯: </label>
                            <div class="col-md-9 form-inline" id="districtSelect">
                                <select class="form-control" id="province" name="province" title="地区">
                                    <option value="">--请选择--</option>
                                    <?php if(is_array($region_v2)): foreach($region_v2 as $key=>$region): ?><option value="<?php echo ($region["name"]); ?>" rel="<?php echo ($region["id"]); ?>" <?php if($region["selected"] == 1): ?>selected="selected"<?php endif; ?>><?php echo ($region["name"]); ?></option><?php endforeach; endif; ?>
                                </select>　
                                <select class="form-control" name="city" id="city" title="城市">
                                    <option value="">--请选择--</option>
                                    <?php if(is_array($region_v3)): foreach($region_v3 as $key=>$region): ?><option value="<?php echo ($region["name"]); ?>" rel="<?php echo ($region["id"]); ?>" <?php if($region["selected"] == 1): ?>selected="selected"<?php endif; ?>><?php echo ($region["name"]); ?></option><?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">职业</label>
                            <div class="col-md-9 form-inline" id="occupationSelect">
                                <input type="hidden" name="industry" id="industry" value=""/>
                                <input type="hidden" name="occupation" id="occupation" value=""/>
                                <select name="industry" title="行业" class="form-control">
                                    <option value="">--请选择--</option>
                                </select>
                                <select name="occupation" class="form-control">
                                    <option value="">--请选择--</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">身高体重: </label>
                            <div class="col-md-9 form-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control input-width-mini" name="height" value="<?php echo ($figures_info["height"]); ?>" title="身高" placeholder="输入身高" validator="number|max(300)">
                                    <span class="input-group-addon">厘米</span>
                                </div>　
                                <div class="input-group">
                                    <input type="text" class="form-control input-width-mini" name="weight" value="<?php echo ($figures_info["weight"]); ?>" title="体重" placeholder="输入体重" validator="number|max(500)">
                                    <span class="input-group-addon">千克</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 avatar-control">
                        <div id="avatarUploader">
                            <img src="<?php echo ($figures_info["avatar_url"]); ?>" style="width: 198px;height: 198px;">
                            <div id="avatarImage"></div>
                            <input type="hidden" name="avatarUrl" value="<?php echo ($figures_info["avatar_url"]); ?>" title="头像" view-delegate="#avatarPickup" validator="required">
                        </div>
                        <label class="btn btn-white btn-block webuploader-container" type="button" id="avatarPickup" style="width: 200px;position: relative;">
                            <div class="webuploader-pick">更换头像</div>
                            <input type="file" id="avatar"  name="file" class="uploader-avatar" style="display: none;">
                        </label>
                        <small style="margin-left:55px;line-height:30px;">最佳尺寸200*200</small>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label class="col-md-2 control-label">擅长项目: <small>50个字以内</small></label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" name="specialty" value="<?php echo ($figures_info["good_at"]); ?>"
                               placeholder="擅长项目" validator="maxLength(150)" maxlength="50">
                        <span class="form-control-feedback" id="inputFeedbackOfSpecialty">0/50</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">获奖荣誉: <small>最多20项</small></label>
                    <div class="col-md-10">
                        <div class="" id="awardContainer">
                            <?php if(is_array($figures_info["awards"])): foreach($figures_info["awards"] as $key=>$child): ?><div class="award-item">
                                    <input type="text" class="form-control" name="awards" title="获奖荣誉" placeholder="输入获奖荣誉" value="<?php echo ($child); ?>">
                                    <span class="award_action" title="删除">×</span>
                                </div><?php endforeach; endif; ?>
                        </div>
                        <button class="btn btn-white" type="button" id="addAwardButton">
                            <i class="icon-plus"> 添加一项</i>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">个人风采: <small>最多5张</small></label>
                    <div class="col-md-10" id="photoUploader">
                        <button class="btn btn-white " type="button" id="addPhotoButton">
                            <i class="icon-plus"> 照片选择</i>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">个人简介: <small>5000个字以内</small></label>
                    <div class="col-md-10">
                        <script id="editor" type="text/plain" style="max-width:100%;width:880px;height:350px;"></script>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="form-group">
                    <div class="col-m-4 col-sm-offset-2">
                        <button class="btn btn-success btn-lg" type="button" id="submit">保存内容</button>
                        <a href="<?php echo U('Figures/index');?>" class="btn btn-white btn-lg">取消</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/public/admin/datatables/jquery.dataTables.js" type="application/javascript"></script>
<script src="/public/admin/datatables/dataTables.bootstrap.js" type="application/javascript"></script>
<script src="/public/common/popup/popup.js" type="text/javascript"></script>
<div class="footer" style="position: absolute;bottom: 0px;width: auto;min-width: 300px;right: 30px;z-index: 1;">
    <div class="pull-right">
        By：<a href="http://www.liyulinbill.com/" target="_blank">李渝林</a>
    </div>
    <div>
        <strong>Copyright</strong> liyulinbill © 2017
    </div>
</div>
<script type="text/javascript" charset="utf-8" src="/public/common/jquery/jquery-2.1.1.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/admin/js/ajaxupload.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/common/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/common/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/public/common/ueditor/lang/zh-cn/zh-cn.js"></script>
<!--时间-->
<script type="text/javascript" charset="utf-8" src="/public/common/date/laydate.js"></script>
<!--地域-->
<script type="text/javascript" charset="utf-8" src="/public/common/switch_city.js"></script>
<!--职业-->
<script type="text/javascript" charset="utf-8" src="/public/common/switch_jobs.js"></script>

<script>
    $(function(){
        laydate({
            elem:"#birthday",
            event:"focus",
            istime: true, format: 'YYYY-MM-DD',
        });
        var ue = UE.getEditor('editor');
        UE.getEditor('editor').ready(function(){
            this.setContent('<?php echo ($info["content"]); ?>');
        });


        //奖励荣誉
        award_bind_click();
        $('#addAwardButton').click(function(){
            if($('.award-item').length >= 20){
                alert('最多20项！');return false;
            }
            var content='<div class="award-item"> <input type="text" class="form-control" name="awards" title="获奖荣誉" placeholder="输入获奖荣誉" value=""> <span class="award_action" title="删除">×</span> </div>'
            $('#awardContainer').append(content);
            award_bind_click();
        });

        function award_bind_click(){
            $('.award_action').unbind('click');
            $('.award_action').bind('click',function(){
                $(this).parent().remove();
            });
        }
    })
</script>
</body>
</html>