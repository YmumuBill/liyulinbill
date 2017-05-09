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
    <div class="content animated fadeInRight">

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
</body>
</html>