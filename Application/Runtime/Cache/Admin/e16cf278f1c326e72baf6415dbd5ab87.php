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
    input[type='file']{display: none!important;}
    #body .form-group{}

    .attachmentlist{overflow:hidden}
    .attachment-item {  float: left;  margin: 0 10px 10px 0;  padding: 6px;  width: 100%;  background: #ededed;  color: #666;  border-radius: 2px;  }
    .attachment-item .inner {  position: relative;  line-height: 17px;  padding-left: 58px;  height: 32px;  }
    .attachment-item .fileicon {  position: absolute;  left: 0;  top: 0;  width: 32px;  height: 32px;  }
    .fileicon-lg {  width: 32px;  height: 32px;  background: url(/public/admin/image/file.png) no-repeat;  }
    .attachment-item .filename {  width: 90%;  overflow: hidden; white-space: nowrap;  text-overflow: ellipsis; }
    .attachment-item .delete-other {  position: absolute;  right: -2px;  top: -4px;  font-size: 16px;  color: #999;  cursor: pointer;  }
    #categoryList{ margin-bottom: 15px;}
</style>
<link rel="stylesheet" href="/public/common/css/file_bg.css" rel="stylesheet">
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
        <div class="form-horizontal info">
            <input type="hidden" id="article_id" value="<?php echo ($info["id"]); ?>" name="id">
            <div class="form-group">
                <label class="col-md-2 control-label">名称</label>
                <div class="col-md-10">
                    <input type="text" class="form-control"  id="title" value="<?php echo ($info["title"]); ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">分类</label>
                <div class="col-md-10">
                    <div id="categoryList">
                        <?php if(is_array($cate_lists)): foreach($cate_lists as $key=>$child): ?><label class="checkbox-inline">
                                <?php if($child['checked'] == 1): ?><input type="checkbox" name="categoryIds" value="<?php echo ($child["id"]); ?>" checked="checked"><?php echo ($child["name"]); ?>
                                    <?php else: ?>
                                    <input type="checkbox" name="categoryIds" value="<?php echo ($child["id"]); ?>"><?php echo ($child["name"]); endif; ?>
                            </label><?php endforeach; endif; ?>
                    </div>
                    <button class="btn btn-white" type="button" id="addCatButton">
                        <i class="fa fa-plus"></i> 添加分类</button>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">上传缩略图</label>
                <div class="col-md-10">
                    <input type="hidden" id="article_image" name="article_image" value="<?php echo ($info["thumb_image"]); ?>">
                    <img src="<?php echo ($info["thumb_image"]); ?>" alt="" id="image"/>
                    <input type="file" name="article_thumb" id="article_thumb" />
                    <label for="article_thumb" class="btn btn-success article-upload-label">
                        上传
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">简要内容</label>
                <div class="col-md-10">
                    <textarea type="text" class="form-control" id="brief" rows="5"><?php echo ($info["brief"]); ?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">详细内容</label>
                <div class="col-md-10">
                    <script id="editor" type="text/plain" style="min-width:700px;max-width:100%;height:450px;"></script>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label">附件(最多10个)</label>
                <div class="col-md-10">
                    <div class="control">
                        <div class="attachmentlist">
                            <?php if(is_array($info["file"])): foreach($info["file"] as $key3=>$t_child): ?><div class="attachment-item">
                                    <div class="inner">
                                        <span class="fileicon fileicon-lg fileicon-<?php echo ($t_child["type"]); ?>"></span>
                                        <div class="filename"><?php echo ($t_child["name"]); ?></div>
                                        <input type="hidden" name="other-file" value="<?php echo ($t_child["url"]); ?>">
                                        <div class="filestatus">
                                            <span class="progress-value">
                                                <i style="color: #77cc32;">上传成功</i>
                                            </span>
                                            <span class="filesize" style="display: inline;"><?php echo ($t_child["size"]); ?></span>
                                        </div>
                                        <span class="delete-other" title="移除">×</span>
                                    </div>
                                </div><?php endforeach; endif; ?>
                        </div>
                        <label class="btn btn-white mm-upload-other-label">
                            <i class="icon-link"></i>上传附件
                            <input type="file" id="other_file" name="file" class="uploader-invisible">
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-m-4 col-sm-offset-2">
                    <button class="btn btn-success submit" type="button" id="submit">保存内容</button>
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
<script type="text/javascript" charset="utf-8" src="/public/common/jquery/jquery-2.1.1.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/admin/js/ajaxupload.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/common/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/common/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/public/common/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
    $(function(){
        var ue = UE.getEditor('editor');
        UE.getEditor('editor').ready(function(){
            this.setContent('<?php echo ($info["content"]); ?>');
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
                    if(msg.statusCode==200){
                        var  content='<label class="checkbox-inline"> <input type="checkbox" name="categoryIds" checked="checked" value="'+msg.contentId+'">'+msg.contentName+'</label>';
                        $('#categoryList').append(content);
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
        })

        bind_delete_other();
        bind_add_other();
        //附件子目录移除
        function bind_delete_other(){
            $('.delete-other').unbind('click');
            $('.delete-other').bind('click',function(){
                $(this).unbind('click');
                $(this).parent().parent().remove();
            });
        }

        //附件子目录上传
        function bind_add_other(){
            $('.mm-upload-other-label').unbind('click');
            $('.mm-upload-other-label').bind('click',function(){
                var obj = this;
                var item_long = $('.attachmentlist').find('.attachment-item').length;
                if(item_long >= 10){
                    show_error('附件最多上传10个');
                    return false;
                }
                $("#other_file").unbind("change");
                $("#other_file").bind("change",function(){
                    //其他文件上传
                    var files = this.files[0];
                    var name = files['name'];
                    var fileExt=(/[.]/.exec(name)) ? /[^.]+$/.exec(name.toLowerCase()) : '';
                    var size = files['size'];
                    if((size/1024)>1024)
                    {size = (size/1024/1024).toFixed(3)+'M';}
                    else{size = (size/1024).toFixed(3)+'K';}
                    var content = '<div class="attachment-item"><div class="inner">'+
                            '<span class="fileicon fileicon-lg fileicon-'+fileExt[0]+'"></span>'+
                            '<div class="filename">' + name +
                            '</div><input type="hidden" name="other-file"><div class="filestatus"><span class="progress-value"><i style="color: red;">文件上传中</i>' +
                            '</span><span class="filesize" style="display: inline;">' + size +
                            '</span></div><span class="delete-other" title="移除">×</span></div></div>';
                    $('.attachmentlist').append(content);
                    bind_delete_other();
                    $.ajaxFileUpload({
                        url:"/m.php?m=Admin&c=Upload&a=upload_other",
                        secureuri : false ,
                        fileElementId : $(this).attr("id") ,
                        dataType : 'json' ,
                        success : function (data) {
                            var other_item = $('.attachmentlist').find('.attachment-item:last');
                            if(data.statusCode==200) {
                                other_item.find('.progress-value').html('<i style="color: #77cc32;">上传成功</i>');
                                other_item.find('input[name="other-file"]').val(data.info);
                            } else {
                                show_error(data.message);
                                other_item.remove();
                            }
                        },
                        error: function (data, status, e)
                        {
                            show_error('请重试!!');
                        }
                    });

                    $(obj).find('input[type="file"]').unbind("change");
                });
                $(obj).parent().find('input[type="file"]').click();
            });
        }

        $("#submit").click(function(){
            var id = $("#article_id").val();
            var type_ids = "";
            $('#categoryList').find('input[name="categoryIds"]:checked').each(function(){
                type_ids += type_ids==""?$(this).val():","+$(this).val();
            });
            var title = $("#title").val();
            if(title==""){
                $("#title").focus();
                show_error("请填写标题");return;
            }
            var brief = $("#brief").val();
            if(brief==""){
                show_error("请填写简要内容");return;
            }
            var thumb = $("#article_image").val();
            if(thumb==""){
                show_error("您没有上传缩略图,系统会主动获取文章第一张图片为缩略图。");
            }
            var content = (UE.getEditor('editor').getContent()).toString();
            var file = [];
            $('.attachmentlist').find('.attachment-item').each(function(){
                var i_c = {};
                i_c.name = $(this).find('.filename').text();
                i_c.type = (/[.]/.exec(i_c.name)) ? /[^.]+$/.exec(i_c.name.toLowerCase()) : '';
                i_c.type = i_c.type[0];
                i_c.url = $(this).find('input[name="other-file"]').val();
                i_c.size = $(this).find('.filesize').text();
                file.push(i_c);
            });
            var data = {};
            data.id = id;
            data.type = type_ids;
            data.title = title;
            data.brief = brief;
            data.content = content;
            data.file = JSON.stringify(file);
            data.thumb_image = thumb;
            data.ajax = 1;
            console.log(data);
            var url = "<?php echo U('Article/save');?>";
            $.ajax({
                url: url,
                data: data,
                dataType: "json",
                type: "POST",
                success: function(obj){
                    if(obj.statusCode == 200) {
                        show_error("修改成功!");
                        window.location.href = obj.closeCurrent;
                    }
                    else {
                        show_error(obj.message);
                    }
                },
                error:function(data){
                    show_error('网络错误，请重试！');
                }
            });
        })
    })
</script>
</body>
</html>