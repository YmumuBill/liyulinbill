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
    #gallery-container{    border: 1px solid #ccc;  box-shadow: 0 1px 0 #e5e5e5;  background: #ffffff;  margin-top: 20px;}
    #gallery-container #collection-view{    padding-left: 22px; display: table;}
    #gallery-container .collection > li{padding-right: 22px;    float: left;  box-sizing: border-box;  display: inline-block;  padding:15px 15px 15px 0px;}
    #gallery-container .collection-item{padding: 0;    position: relative;  padding: 5px;  border: 1px solid #ccc;  font-size: 13px;  list-style: none;  color: #888;  transition: border-color ease-in-out .25s,box-shadow ease-in-out .15s;}
    #gallery-container .item-wrapper{    position: relative;  padding: 5px 5px 6px;}
    #gallery-container .item-thumbnail{    position: relative;  overflow: hidden;}
    #gallery-container .item-info{    margin-top: 5px;  line-height: 2;}
    #gallery-container .item-info a{    font-size: 14px;  font-weight: 700;  color: #333;}
    #gallery-container .item-info .comments{float: right;}
    #gallery-container .item-actions{    position: absolute;  right: -50px;  top: 0;  width: 50px;  background: #fff;  background: rgba(255,255,255,.9);  text-align: center;  transition: right ease-in-out .25s;  line-height: 25px;  font-size: 13px;  color: #666;}
    #gallery-container .collection-item:hover .item-actions{right: 0;}
    #gallery-container .item-actions a{    display: block;  text-decoration: none;  color: #333;}
    #gallery-container .gallery-collection img{    width: 240px;  height: 160px;}
    #gallery-container .table-footer{    padding: 12px 15px;  background: #f8f8f8;  text-align: right;  line-height: 1;  border-top: 1px solid #ddd;}
</style>
<div id="body">
    <div class="row wrapper mm-head-nav">
        <div class="col-lg-10">
            <h2>相册列表</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo U('Index/index');?>">主页</a>
                </li>
                <li>
                    <strong>图片管理</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="tab-nav">
        <ul class="nav nav-tabs">
            <li class="active"><a href="javascript:void(0);">相册管理</a></li>
            <li><a href="<?php echo U('Photo/index');?>">相片管理</a></li>
            <li><a href="javascript:void(0);">评论管理</a></li>
        </ul>
    </div>
    <div class="content animated fadeInRight">
        <div id="gallery-container">
            <ul class="collection gallery-collection" id="collection-view">
                <!--系统相册 id为0（不记录数据库的）-->
                <li>
                    <div class="collection-item album-item">
                        <div class="item-wrapper">
                            <div class="item-thumbnail">
                                <a href="<?php echo U('Photo/index');?>">
                                    <img src="/public/admin/image/placeholder.jpg"/>
                                </a>
                                <div class="item-actions">
                                    <a href="javascript:void(0);" action="show"><i class="icon-eye-open"></i>显示</a>
                                </div>
                            </div>
                            <div class="item-info">
                                <div>
                                    <a href="<?php echo U('Photo/index');?>" class="name">系统默认相册</a>
                                    <span>(<span class="photo-count"><?php echo ($ap_count); ?><span>)<span></span></span></span></span>
                                </div>
                                <div class="clearfix">
                                    <span class="create-time">创建于<span>2017-02-15</span></span>
                                    <span class="comments">评论(<span><?php echo ($ac_count); ?></span>)</span>
                                </div>
                            </div>
                        </div>
                        <div class="item-stroke"><div></div></div>
                    </div>
                </li>
                <!--自建相册-->
                <?php if(is_array($lists)): foreach($lists as $key=>$item): ?><li data-id="<?php echo ($item["id"]); ?>">
                        <div class="collection-item album-item">
                            <div class="item-wrapper">
                                <div class="item-thumbnail">
                                    <a href="<?php echo U('Photo/index',array('id'=>$item['id']));?>">
                                        <?php if($item["index_id"] == 0): ?><img src="/public/admin/image/placeholder.jpg" alt="">
                                            <?php else: ?>
                                            <img src="<?php echo ($item["index_image"]); ?>"/><?php endif; ?>
                                    </a>
                                    <div class="item-actions">
                                        <input type="hidden" class="name" value="<?php echo ($item["name"]); ?>">
                                        <input type="hidden" class="is_comment" value="<?php echo ($item["is_comment"]); ?>">
                                        <a href="javascript:void(0);" action="edit" data-id="<?php echo ($item["id"]); ?>"><i class="icon-edit"></i> 编辑</i></a>
                                        <a href="javascript:void(0);" action="del" data-id="<?php echo ($item["id"]); ?>"><i class="icon-trash"></i> 删除</i></a>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div>
                                        <a href="<?php echo U('Album/index',array('id'=>$item['id']));?>" class="name"><?php echo ($item["name"]); ?></a>
                                        <span>(<span class="photo-count"><?php echo ($item["photo_count"]); ?><span>)<span></span></span></span></span>
                                    </div>
                                    <div class="clearfix">
                                        <span class="create-time">创建于<span><?php echo ($item["create_time"]); ?></span></span>
                                        <span class="comments">评论(<span><?php echo ($item["comment_count"]); ?></span>)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item-stroke"><div></div></div>
                        </div>
                    </li><?php endforeach; endif; ?>
            </ul>
            <div class="clearfix table-footer" id="table-data-view">
                <div class="pull-left">
                    <button class="btn btn-success" id="addAlbum">
                        <i class="icon-plus"></i> 添加相册
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal " id="myModal" tabindex="1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close mm-close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">添加/编辑相册</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>相册名称</label>
                    <input type="text" placeholder="请输入相册名称" name="name" class="form-control" id="album-name">
                </div>
                <div class="form-group">
                    <label >评论权限</label>
                    <div class="mm-comment">
                        <label class="radio-inline"><input type="radio" name="comment" value="0" checked="checked">禁止用户评论单张照片</label>
                        <label class="radio-inline"><input type="radio" name="comment" value="1">允许用户评论单张照片</label>
                    </div>
                </div>
                <input type="hidden" id="album-id" value=""/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white mm-close" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-success">保存</button>
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
        //新增
        $("#addAlbum").click(function(){
            $("#myModal").addClass("in");
            $("#myModal").css("display","block");
        });
        bind_action();

        $("#myModal .btn-success").click(function(){
            var name_input = $("#album-name");
            var id = $("#album-id").val();
            if(name_input.val()==""){
                show_error("请输入相册名称！");
                name_input.focus();
                return;
            }
            var is_comment = $("input[name='comment']:checked").val();
            $.ajax({
                url:"<?php echo U('Album/save');?>",
                data: {"name":name_input.val(),"id":id,"is_comment":is_comment, "ajax":1},
                type:"POST",
                dataType: "json",
                success:function(msg){
                    if(msg.statusCode==200){
                        if(!msg.insert){
                            $("#collection-view li[data-id='"+id+"']").remove();
                        }
                        var contentHtml = "";
                        contentHtml = "<li>" +
                                        "<div class='collection-item album-item'>" +
                                            "<div class='item-wrapper'>" +
                                "<div class='item-thumbnail'>" +
                                    "<a href='/m.php?m=Admin&c=Photo&a=index&id="+id+"'><img src='/public/admin/image/placeholder.jpg' alt=''></a>" +
                                "</div>" +
                                "<div class='item-info'>" +
                                    "<div><a href='javascript:void(0);' class='name'>"+name_input.val()+"</a></div>" +
                                    "<div class='clearfix'><span class='create-time'>刚才</span><span class='comments'>评论(0)</span></div>" +
                                "</div>" +
                                            "</div>" +
                                        "</div>" +
                                    "</li>";
                        $("#collection-view").append(contentHtml);
                        name_input.val("");
                        $("#myModal").fadeOut(300);
                    }else{
                        show_error(msg.message);
                    }
                },
                error:function(msg){
                    show_error("网络异常！请刷新重试");
                }
            })
        });


    })
    function bind_action(){
        $(".item-actions a[action='del']").click(function(){
            var id = $(this).attr("data-id");
            var obj = this;
            $.ajax({
                url:"<?php echo U('Album/del');?>",
                data: {"id":id, "ajax":1},
                type:"POST",
                dataType: "json",
                success:function(msg){
                    if(msg.statusCode==200){
                        $(obj).parents("li").remove();
                    }else{
                        show_error(msg.message);
                    }
                },
                error:function(msg){
                    show_error("网络异常！请刷新重试");
                }
            })

        });

        $(".item-actions a[action='edit']").click(function(){
            var id = $(this).attr("data-id");
            var name = $(this).parents(".item-actions").find(".name");
            var is_comment = $(this).parents(".item-actions").find(".is_comment");
            $("#album-id").val(id);
            $("#album-name").val(name.val());
            $(".mm-comment input[value='"+is_comment.val()+"']").prop("checked",true);
            $("#addAlbum").click();
        });
    }
</script>
</body>
</html>