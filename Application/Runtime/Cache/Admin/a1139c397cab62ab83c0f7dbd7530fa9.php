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
<link rel="stylesheet" href="/public/admin/css/photo_index.css">
<div id="body">
    <div class="row wrapper mm-head-nav">
        <div class="col-lg-10">
            <h2>视频管理</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo U('Index/index');?>">主页</a>
                </li>
                <li>
                    <small>视频管理</small>
                </li>
                <li>
                    <strong>视频列表</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="tab-nav">
        <ul class="nav nav-tabs">
            <li class="active"><a href="javascript:void(0);">视频列表</a></li>
            <li><a href="javascript:void(0);">评论管理</a></li>
            <li><a href="javascript:void(0);">设置</a></li>
        </ul>
    </div>
    <div class="ibox animated fadeInRight">
        <div class="ibox-title">
            <input type="text" id="kw" class="mm-input-text" style="margin: 0px;" name="keyword"
                   value="<?php echo ($search_kw); ?>" placeholder="视频名字关键字"/>
            <span class="input-group-btn">
                <button class="btn btn-white" id="search">搜索</button>
            </span>
        </div>
        <div class="ibox-content" id="tableview">
            <ul class="collection gallery-collection" id="collection-view">
                <?php if(is_array($lists)): foreach($lists as $key=>$item): ?><li>
                        <div class="collection-item photo-item" data-id="<?php echo ($item["id"]); ?>" >
                            <div class="item-wrapper">
                                <div class="item-thumbnail">
                                    <a href="javascript:;" action="select"><img src="<?php echo ($item["images"]); ?>"></a>
                                    <div class="item-actions">
                                        <?php if($item["is_recommend"] == 0): ?><a href="javascript:void(0);" action="recommend" data-type="1"><i class="icon-thumbs-up"></i> 推荐</a>
                                            <?php else: ?>
                                            <a href="javascript:void(0);" action="recommend" data-type="0"><i class="icon-undo"></i> 取消</a><?php endif; ?>
                                        <a href="<?php echo U('Video/edit',array('id'=>$item['id']));?>" action="edit"> <i class="icon-edit"></i> 编辑</a>
                                        <a href="javascript:void(0);" action="del"><i class="icon-trash"></i> 删除</a>
                                    </div>
                                </div>
                                <div class="item-info clearfix">
                                    <div class="title"><i class="icon-film"></i>  <?php echo ($item["name"]); ?></div>
                                    <div>
                                        <a href="" class="username">
                                            <?php echo ($item["user_name"]); ?>
                                        </a>
                                        <small>(评论: <?php echo ($item["comment_count"]); ?>)</small>
                                    </div>
                                </div>
                                <?php if($item["is_recommend"] == 1): ?><div class="ribbon">
                                        <div class="ribbon-inner">推荐</div>
                                    </div><?php endif; ?>
                            </div>
                        </div>
                    </li><?php endforeach; endif; ?>
            </ul>
            <div class="clearfix table-footer">
                <div class="pull-left">
                    <a href="<?php echo U('Video/add_qiniu');?>" class="btn btn-success" id="goUploadBtn">
                        <i class="fa fa-plus"></i> 上传视频
                    </a>
                    <button class="btn btn-danger" id="deleteAllPhotosButton">
                        <i class="fa fa-trash-o"></i> 批量删除视频
                    </button>
                </div>
                <div class="pull-right">
                    <input type="hidden" id="page" value="1">
                    <div class="pages" id="pages"><?php echo ($pages); ?>
                    </div>
                </div>
            </div>
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
<script>
    $(function(){
        //推荐
        $("#tableview li .item-actions a[action='recommend']").click(function(){
            var recommend = parseInt($(this).attr("data-type"));
            var pli = $(this).parents("li");
            var id = pli.find('.photo-item').attr('data-id');
            $.ajax({
                url:'<?php echo U("Video/save_info");?>',
                dataType: "json",
                data:{ "action":"recommend","id":id,"recommend":recommend,"ajax":1},
                type:"POST",
                success:function( msg ){
                    show_error(msg.message);
                    if(msg.statusCode==200){
                        var mA = pli.find("a[action='recommend']");
                        if(recommend==1){
                            mA.html("<i class='fa fa-star'></i> 取消");
                            mA.attr("data-type",0);
                            var item = pli.find(".item-wrapper");
                            item.append("<div class='ribbon'><div class='ribbon-inner'>推荐</div></div>");
                        }else {
                            mA.html("<i class='fa fa-star-o'></i> 推荐");
                            mA.attr("data-type",1);
                            pli.find(".ribbon").remove();
                        }
                    }
                },
                error:function(msg){
                    console.log(msg);
                    show_error(msg.message);
                }
            });
        });
        //删除
        $("#tableview li .item-actions a[action='del']").click(function(){
            var pli = $(this).parents("li");
            var id = pli.find('.photo-item').attr('data-id');
            $.ajax({
                url:'<?php echo U("Video/del");?>',
                dataType: "json",
                data:{ "action":"del","id":id,"ajax":1},
                type:"POST",
                success:function( msg ){
                    show_error(msg.message);
                    if(msg.statusCode==200){
                        pli.remove();
                    }
                },
                error:function(msg){
                    console.log(msg);
                    show_error(msg.message);
                }
            });
        });

        //批量删除
        $("#deleteAllPhotosButton").click(function(){
            var lists = $("#tableview li .selected");
            if(lists.length == 0 ){
                alert("请点击要删除的视频！");
                return;
            }
            if(confirm("确定批量删除选定的视频？")){
                var ids = "";
                lists.each(function(){
                    var id = $(this).attr("data-id");
                    ids += ids==""?id:(","+id);
                });
                $.ajax({
                    url:'<?php echo U("Video/del");?>',
                    dataType: "json",
                    data:{ "id":ids,"ajax":1},
                    type:"POST",
                    success:function( msg ){
                        if(msg.statusCode==300) {
                            show_error(msg.message);
                        }else {
                            location.reload();
                        }
                    },
                    error:function(msg){
                        console.log(msg);
                        show_error(msg.message);
                    }
                });
            }
        });

        //点击相片
        $("#tableview li  a[action='select']").click(function(){
            var item = $(this).parents('.collection-item');
            if(item.hasClass("selected")){
                item.removeClass("selected");
            }else {
                item.addClass("selected");
            }
        });



        //搜索
        $("#search").click(function(){
            var kw = $("#kw").val();
            if(kw != ""){
                location.href = "/m.php?m=Admin&c=Video&a=index&p=1&kw="+kw;
            }else {
                location.href = "/m.php?m=Admin&c=Photo&a=index";
            }
        });
        //翻页
        $("#pages a").click(function(){
            var page = $(this).attr("data-id");
            var kw = $("#kw").val();
            if(kw != ""){
                location.href = "/m.php?m=Admin&c=Photo&a=index&p="+page+"&kw="+kw;
            }else {
                location.href = "/m.php?m=Admin&c=Photo&a=index&p="+page;
            }
        });
    })
</script>
</body>
</html>