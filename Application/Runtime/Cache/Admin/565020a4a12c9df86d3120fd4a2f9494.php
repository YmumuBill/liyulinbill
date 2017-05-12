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
                <a href="javascript:void(0);"><i class="icon-user"></i> 李渝林123</a>
            </li>
            <li>
                <a href="/m.php?m=Admin&c=Admin&a=logout">
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
            <li class="">
                    <a href="/m.php?m=Admin&c=Index&a=index"><i class="fa "></i>首页</a>
                                        </li><li class="">
                                            <a href="javascript:void(0)" class="mm-left-toggle-ul"><i class="fa "></i>用户管理<i class="icon-angle-left"></i></a>
                        <ul class="nav nav-second-level">
                            <li class=""><a href="/m.php?m=Admin&c=User&a=index"><i class="icon-angle-right"></i> 用户列表</a></li>                        </ul>                </li><li class="">
                                            <a href="javascript:void(0)" class="mm-left-toggle-ul"><i class="fa "></i>文章管理<i class="icon-angle-left"></i></a>
                        <ul class="nav nav-second-level">
                            <li class=""><a href="/m.php?m=Admin&c=Article&a=index"><i class="icon-angle-right"></i> 文章列表</a></li><li class=""><a href="/m.php?m=Admin&c=ArticleCate&a=index"><i class="icon-angle-right"></i> 分类管理</a></li>                        </ul>                </li><li class="">
                                            <a href="javascript:void(0)" class="mm-left-toggle-ul"><i class="fa "></i>图片管理<i class="icon-angle-left"></i></a>
                        <ul class="nav nav-second-level">
                            <li class=""><a href="/m.php?m=Admin&c=Album&a=index"><i class="icon-angle-right"></i> 相册</a></li><li class=""><a href="/m.php?m=Admin&c=Photo&a=index"><i class="icon-angle-right"></i> 相片</a></li>                        </ul>                </li><li class="">
                    <a href="/m.php?m=Admin&c=Video&a=index"><i class="fa "></i>视频管理</a>
                                        </li><li class="">
                    <a href="/m.php?m=Admin&c=Figures&a=index"><i class="fa "></i>人物简历</a>
                                        </li>        </ul>
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
<link rel="stylesheet" href="/public/common/date/css/laydate.css">
<div id="body">
    <div class="row wrapper mm-head-nav">
        <div class="col-lg-10">
            <h2>人物简历</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/m.php?m=Admin&c=Index&a=index">主页</a>
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
                                <input type="text" class="form-control" name="name" title="姓名" value="" placeholder="输入姓名" validator="required|maxLength(15)" maxlength="15">
                                <span class="form-control-feedback" id="inputFeedbackOfName">0/15</span>
                                <input type="hidden" name="id" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">性别: </label>
                            <div class="col-md-9">
                                <label class="radio-inline">
                                    <input type="radio" name="sex" value="0" checked="">男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" value="1" >女
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">出生年月: </label>
                            <div class="col-md-9 form-inline" id="birthdaySelect" role="date-select">
                                <input type="text" class="laydate-icon" value="" name="birthday" id="birthday"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">籍贯: </label>
                            <div class="col-md-9 form-inline" id="districtSelect">
                                <select class="form-control" onchange="get_city()" id="province" name="province" title="地区">
                                    <option value="">-请选择-</option>
                                                                    </select>　
                                <select class="form-control" name="city" id="city" title="城市">
                                    <option value="">-请选择-</option>
                                                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">身高体重: </label>
                            <div class="col-md-9 form-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control input-width-mini" name="height" value="" title="身高" placeholder="输入身高" validator="number|max(300)">
                                    <span class="input-group-addon">厘米</span>
                                </div>　
                                <div class="input-group">
                                    <input type="text" class="form-control input-width-mini" name="weight" value="" title="体重" placeholder="输入体重" validator="number|max(500)">
                                    <span class="input-group-addon">千克</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 avatar-control">
                        <div id="avatarUploader">
                            <img src="" style="width: 198px;height: 198px;">
                            <div id="avatarImage"></div>
                            <input type="hidden" name="avatarUrl" value="" title="头像" view-delegate="#avatarPickup" validator="required">
                        </div>
                        <a class="btn btn-default btn-block webuploader-container" type="button" id="avatarPickup" style="width: 200px;position: relative;">
                            <div class="webuploader-pick">更换头像</div>
                            <div id="" style="position: absolute; top: 5px; left: 9px; width: 180px; height: 18px; overflow: hidden; bottom: auto; right: auto;">
                                <input type="file"  name="file" class="uploader-avatar">
                            </div>
                        </a>
                        <small style="margin-left:55px;line-height:30px;">最佳尺寸200*200</small>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label class="col-md-2 control-label">擅长项目: <small>150个字以内</small></label>
                    <div class="col-md-10">
                        <textarea class="form-control" name="specialty"  cols="50" rows="3" placeholder="擅长项目" validator="maxLength(150)" maxlength="150">
                                                    </textarea>
                        <span class="form-control-feedback" id="inputFeedbackOfSpecialty">0/150</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">获奖荣誉: <small>最多20项</small></label>
                    <div class="col-md-10">
                        <div class="" id="awardContainer">
                                                    </div>
                        <button class="btn btn-white" type="button" id="addAwardButton">
                            <i class="icon-plus"> 添加一项</i>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">个人风采: <small>最多5张</small></label>
                    <div class="col-md-10" id="photoUploader">
                        
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
                        <a href="/m.php?m=Admin&c=Figures&a=index" class="btn btn-white btn-lg">取消</a>
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
<script>
    $(function(){
        laydate({
            elem:"#birthday",
            event:"focus",
            istime: true, format: 'YYYY-MM-DD',
        });
        var ue = UE.getEditor('editor');
        UE.getEditor('editor').ready(function(){
            this.setContent('');
        })
    })
</script>
</body>
</html>