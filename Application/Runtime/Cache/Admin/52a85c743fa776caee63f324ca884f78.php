<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <style>
        #body .col-sm-10{width: 400px;}
        ul{list-style: none;}
        .quxian{list-style: none;padding: 0;}
        .quxian li{min-height: 30px;line-height: 30px;}
        .quxian li label{margin: 0;}
        .quxian li label input{width: 16px;height: 16px;float: left; margin-top:7px;margin-right: 5px;;-webkit-appearance: none; outline: none !important;border-radius: 10px;  box-sizing: border-box;  -moz-box-sizing: border-box;border: 1px solid #b3b3b3;}
        .quxian li label input:checked{ background: url("/public/admin/image/radio_checked.png") no-repeat;  background-size: 16px 16px;  border: none;outline: none;}
        .second{padding-left: 30px;}
        .third{padding-left: 30px;}
        .third:after{display: block;content: "";clear: both;}
        .third li{float: left;width: 50%;}
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
            <?php if(is_array($menu)): foreach($menu as $key=>$item): if($item["show"] == 1): ?><li class="<?php echo ($item["class"]); ?>">
                        <?php if($item['level'] == 1): ?><a href="/m.php?m=Admin&c=<?php echo ($item["m"]); ?>&a=<?php echo ($item["a"]); ?>"><i class="fa <?php echo ($item["iclass"]); ?>"></i><?php echo ($item["name"]); ?></a>
                            <?php else: ?>
                            <a href="javascript:void(0)" class="mm-left-toggle-ul"><i class="fa <?php echo ($item["iclass"]); ?>"></i><?php echo ($item["name"]); ?><i class="icon-angle-left"></i></a>
                            <ul class="nav nav-second-level">
                                <?php if(is_array($item["group"])): foreach($item["group"] as $key1=>$item1): if($item1["show"] == 1): ?><li class="<?php echo ($item1["class"]); ?>"><a href="/m.php?m=Admin&c=<?php echo ($item1["m"]); ?>&a=<?php echo ($item1["a"]); ?>"><i class="icon-angle-right"></i> <?php echo ($item1["name"]); ?></a></li><?php endif; endforeach; endif; ?>
                            </ul><?php endif; ?>
                    </li><?php endif; endforeach; endif; ?>
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
            <h2>管理员分组设置</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo U('index/index');?>">主页</a>
                </li>
                <li>
                    <a>权限管理</a>
                </li>
                <li>
                    <strong>权限分配</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="content animated fadeInRight">
        <div class="ui-panel bordered">
            <h5 style="line-height: 40px;padding-left: 10px;margin: 0;height: 40px;border-bottom: 1px solid #e7eaec;">编辑管理员分组</h5>
            <div style="padding: 5px 10px;">
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">组别名称</label>
                    <div class="col-sm-10">
                        <input type="hidden" id="id" value="<?php echo ($role["id"]); ?>">
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo ($role["name"]); ?>">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group" style="display: table;width: 100%;">
                    <label class="col-sm-2 control-label">权限分配</label>
                    <div class="col-sm-10">
                        <ul class="quxian">
                            <?php if(is_array($lists)): foreach($lists as $key1=>$item1): ?><li class="first">
                                    <label><input type="checkbox" class="first" <?php if($item1['checked']): ?>checked<?php endif; ?> ><?php echo ($item1["name"]); ?></label>
                                    <ul class="second">
                                        <?php if(is_array($item1["group"])): foreach($item1["group"] as $key2=>$item2): ?><li>
                                                <label><input type="checkbox" class="second" <?php if($item2['checked']): ?>checked<?php endif; ?>><?php echo ($item2["name"]); ?></label>
                                                <ul class="third">
                                                    <?php if(is_array($item2["nodes"])): foreach($item2["nodes"] as $key3=>$item3): ?><li> <label><input type="checkbox" class="third" value="<?php echo ($item3["id"]); ?>" <?php if($item3['checked']): ?>checked<?php endif; ?>><?php echo ($item3["name"]); ?></label></li><?php endforeach; endif; ?>
                                                </ul>
                                            </li><?php endforeach; endif; ?>
                                    </ul>
                                </li><?php endforeach; endif; ?>
                        </ul>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>

                <div class="form-group">
                    <div class="col-m-4 col-sm-offset-2">
                        <button class="btn btn-primary submit" type="button" id="save-conf">保存内容</button>
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
        $("input[type='checkbox'].first").click(function(){
            var obj = this.parentElement.parentElement;

            if($(this).is(':checked')){
                $(obj).find("input.second").prop("checked", "true");
                $(obj).find("input.third").prop("checked", true);
            }
            else{
                $(obj).find("input.second").prop("checked",false);
                $(obj).find("input.third").prop("checked",false);
            }
        });

        $("input[type='checkbox'].second").click(function(){
            var obj = this.parentElement.parentElement;
            if($(this).is(':checked')){
                $(obj).find("input.third").prop("checked", true);
                obj = obj.parentElement.parentElement;
                if ( $(obj).find("input.second:checked").length == $(obj).find("input.second").length ){
                    $(obj).find("input.first").prop("checked", true);
                }
            }
            else{
                $(obj).find("input.third").prop("checked", false);
                obj = obj.parentElement.parentElement;
                $(obj).find("input.first").prop("checked", false);
            }
        });

        $("input[type='checkbox'].third").click(function(){
            var obj = this.parentElement.parentElement;
            if($(this).is(':checked')){
                obj = obj.parentElement.parentElement;
                if ( $(obj).find("input.third:checked").length == $(obj).find("input.third").length ){
                    $(obj).find("input.second").prop("checked", true);
                    obj = obj.parentElement.parentElement;
                    if ( $(obj).find("input.second:checked").length == $(obj).find("input.second").length ){
                        $(obj).find("input.first").prop("checked", true);
                    }
                }
            }
            else{
                $(obj).find("input.third").prop("checked", false);
                obj = obj.parentElement.parentElement;
                $(obj).find("input.second").prop("checked", false)
                obj = obj.parentElement.parentElement;
                $(obj).find("input.first").prop("checked", false);
            }
        });

        $("#save-conf").click(function(){
            var id = $("#id").val();
            var name = $.trim( $("#name").val() );
            if(name == ""){
                alert("请输入部门名称！");
                return;
            }
            var roles = "";
            var checks = $("input[type='checkbox'].third:checked");
            if( checks.length == 0 ){
                alert("请选择对应权限！");
                return;
            }
            checks.each(function(index){
                roles += index == 0 ? $(this).val() : (";" + $(this).val());
            });
            $.ajax({
                url : "<?php echo U('Role/do_edit');?>",
                data: {"name":name,"roles":roles,"ajax":1 , "id":id },
                type:"POST",
                dataType: "json",
                success: function(obj){
                    if(obj.status==1){
                        alert(obj.info);
                        location.href = "<?php echo U('Role/index');?>";
                    }
                    else{
                        alert(obj.info);
                        location.reload();
                    }
                },
                error:function(data){
                    alert("程序出错了！");
                }
            });
        });
    })
</script>
</body>
</html>