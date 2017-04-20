<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <style>
        input[type='file']{display: none!important;}
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
    <div class="row  wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>文章列表</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo U('Index/index');?>">主页</a>
                </li>
                <li>
                    <strong>文章管理</strong>
                </li>
                <li>
                    新增
                </li>
            </ol>
        </div>
    </div>
    <div class="content animated fadeInRight">
        <form method="POST" class="form-horizontal info" >
            <input type="hidden" id="article_id" value="0" name="id">
            <div class="form-group">
                <label class="col-md-2 control-label">名称</label>
                <div class="col-md-10">
                    <input type="text" class="form-control"  id="title"/>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-md-2 control-label">分类</label>
                <div class="col-md-10">
                    <div id="categoryList">
                        <?php if(is_array($cate_list)): foreach($cate_list as $key=>$child): ?><label class="checkbox-inline">
                                <input type="checkbox" name="categoryIds" value="<?php echo ($child["id"]); ?>"><?php echo ($child["name"]); ?>
                            </label><?php endforeach; endif; ?>
                    </div>
                    <button class="btn btn-white" type="button" id="addCatButton">
                        <i class="fa fa-plus"></i> 添加分类</button>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-md-2 control-label">上传缩略图</label>
                <div class="col-md-10">
                    <input type="hidden" id="article_image">
                    <img src="" alt="" id="image"/>
                    <input type="file" name="article_thumb" id="article_thumb" />
                    <label for="article_thumb" class="btn btn-primary article-upload-label">
                        上传
                    </label>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-md-2 control-label">简要内容</label>
                <div class="col-md-10">
                    <textarea type="text" class="form-control" id="brief"></textarea>
                </div>
            </div>


            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-md-2 control-label">详细内容</label>
                <div class="col-md-10">
                    <script id="editor" type="text/plain" style="min-width:700px;max-width:100%;height:350px;"></script>
                </div>
            </div>

            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <label class="col-md-2 control-label">附件(最多10个)</label>
                <div class="col-md-10">
                    <div class="control">
                        <div class="attachmentlist"></div>
                        <button type="button" class="btn btn-white webuploader-container">
                            <div class="other-pick">
                                <i class="fa fa-paperclip"> 上传附件</i>
                            </div>
                            <div  style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; bottom: auto; right: auto;">
                                <input type="file" id="other_file" name="file" class="uploader-invisible">
                                <label class="other-click" style="opacity: 0; width: 100%; height: 100%; display: block; cursor: pointer; background: rgb(255, 255, 255);"></label>
                            </div>
                        </button>
                    </div>
                </div>
            </div>

            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-m-4 col-sm-offset-2">
                    <button class="btn btn-primary submit" type="button">保存内容</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal " id="myModal" tabindex="1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close mm-close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">添加/编辑文章分类</h4>
            </div>
            <div class="modal-body">
                <div class="form-group"><label>分类名称</label> <input type="text" placeholder="请输入类型,例.新闻、公告。" class="form-control" id="input-cate"></div>
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
<script type="text/javascript" charset="utf-8" src="/public/common/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/common/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/public/common/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
    $(function(){
        var ue = UE.getEditor('editor');
        UE.getEditor('editor').ready(function(){
            this.setContent('请编辑您的内容');
        })
        //新增
        $("#addCatButton").click(function(){
            $("#myModal").addClass("in");
            $("#myModal").css("display","block");
        });
        $("#myModal .btn-success").click(function(){
            var name_input = $("#input-cate");
            if(name_input.val()==""){
                show_error("请输入类型,例.新闻、公告。");
                name_input.focus();
                return;
            }
            $.ajax({
                url:"<?php echo U('ArticleCate/save_cate');?>",
                data: {"name":name_input.val(), "ajax":1},
                type:"POST",
                dataType: "json",
                success:function(msg){
                    if(msg.status){
                        name_input.val("");
                        $("#myModal").fadeOut(300);
                    }
                },
                error:function(msg){
                    show_error("网络异常！请刷新重试");
                }
            })
        })

    })
</script>
</body>
</html>