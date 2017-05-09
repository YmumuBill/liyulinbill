<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <style>
        input[type="file"] {  opacity: 0; display: none;height: 0;width: 0;}
    </style>
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
<div id="body">
    <div class="row wrapper mm-head-nav">
        <div class="col-lg-10">
            <h2>视频编辑</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo U('Index/index');?>">主页</a>
                </li>
                <li>
                    <small>视频管理</small>
                </li>
                <li>
                    <strong>视频编辑</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="ibox animated fadeInRight">
        <div class="form-horizontal" proxy="auto">
                    <input type="hidden" id="id" value="<?php echo ($info["id"]); ?>">
                    <div class="form-group">
                        <label class="col-md-1 control-label">视频: </label>
                        <div class="col-md-11">
                            <div class="videoPane">
                                <div class="videoPane-pending" id="videoPendingBox">
                                    <div class="videoPane-picker" id="videoPickerBox" style="position: relative;">
                                    </div>
                                </div>
                            </div>
                            <div id="output" >
                                <video src="<?php echo ($info["source"]); ?>" controls  style="max-height: 600px;"></video>
                            </div>
                        </div>
                    </div>
                    <div class="form-group" >
                        <label class="col-md-1 control-label">上传视频截图:</label>
                        <div class="col-md-11">
                            <input type="hidden" value="<?php echo ($info["images"]); ?>" id="thumb_image">
                            <input type="file" id="video_thumb" name="video_thumb">
                            <img src="<?php echo ($info["images"]); ?>" alt="<?php echo ($info["name"]); ?>" id="image"/>
                            <label for="video_thumb" class="btn btn-success mm-upload-thumb">上传</label>
                        </div>
                    </div>
                    <div class="form-group has-feedback">
                        <label class="col-md-1 control-label">标题: </label>
                        <div class="col-md-11">
                            <input type="text" class="form-control" name="title" id="video-title" title="标题"
                                   placeholder="请输入视频标题" value="<?php echo ($info["name"]); ?>" validator="required|maxLength(50)"
                                   maxlength="50">
                            <span class="form-control-feedback" >0/50</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-1 control-label">简介: </label>
                        <div class="col-md-11">
                            <script id="editor" type="text/plain" style="min-height:400px;"></script>
                        </div>
                    </div>
                    <div class="form-actions" id="formActions" style="margin-bottom: 20px;">
                        <div class="col-md-offset-1 col-md-11">
                            <button class="btn btn-lg btn-success" id="submitButton" >
                                <i class="icon-edit"></i> 保存视频
                            </button>
                            <a href="<?php echo U('Video/index');?>" class="btn btn-lg btn-white" id="submitButton2" style="margin-left:20px;">
                                <i class="icon-undo"></i> 取消
                            </a>
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
<script type="text/javascript" charset="utf-8" src="/public/common/jquery/jquery-2.1.1.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/admin/js/ajaxupload.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/common/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/common/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/public/common/ueditor/lang/zh-cn/zh-cn.js"></script>
</body>
<script>
    $(function(){
        var user_editor = UE.getEditor('editor',{
            toolbars: [
                ['fullscreen', 'source', '|','undo', 'redo', '|' ,'bold','italic', 'underline','strikethrough','|','forecolor',
                    'removeformat','formatmatch','|','fontfamily','fontsize','|','justifyleft','justifyright','justifycenter','justifyjustify',
                    'link'
                ]
            ],
        });
        UE.getEditor('editor').ready(function() {
            //this是当前创建的编辑器实例
            this.setContent('<?php echo ($info["description"]); ?>');
        });

        //上传缩略图
        $("#video_thumb").on("change",function(){
            $(".mm-upload-thumb").html("上传中...");
            $.ajaxFileUpload({
                url:"<?php echo U('Upload/video_thumb');?>",
                secureuri:false,
                fileElementId:"video_thumb",
                dataType: 'json',
                success: function (data) {
                    if(data.statusCode==200) {
                        console.log(data);
                        $("#thumb_image").val(data.info);
                        $("#image").attr("src",data.info+"?r="+Math.random());
                        show_error("上传成功");
                    }
                    else
                    {
                        show_error(msg.message);
                    }
                    $(".mm-upload-thumb").text("重新上传");
                },
                error: function (data) {
                    console.log(data);
                    if(data.statusCode==300){
                        show_error(data.message);
                    }else{
                        show_error('请重试!!');
                    }
                    $(".mm-upload-thumb").text("重新上传");
                }
            });

        })

        $("#submitButton").click(function(){
            var name = $("#video-title").val();
            var description = (UE.getEditor('editor').getContent()).toString();
            var id = $("#id").val();
            var thumb = $("#thumb_image").val();
//            if(thumb==""){
//                alert("请上传视频的缩略图。");
//                return;
//            }
            $.ajax({
                url:"<?php echo U('Video/save_info');?>",
                dataType: "json",
                data:{ "action":"save","id":id,"name":name,"ajax":1,
                    "description":description,"images":thumb},
                type:"POST",
                success:function( msg ){
                    if(msg.statusCode==200){
                        show_error(msg.message);
                        location.href = "<?php echo U('Video/index');?>";
                    }else{
                        show_error(msg.message);
                    }
                },
                error:function(data){
                    show_error('出错了！');
                }
            });

        });
    })
</script>
</html>