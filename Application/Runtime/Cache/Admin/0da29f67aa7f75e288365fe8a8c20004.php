<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <style>
        #body .col-sm-10{width: 400px;}
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
                    <strong>管理员编辑</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="content animated fadeInRight">
        <div class="ui-panel bordered">
            <h5 style="line-height: 40px;padding-left: 10px;margin: 0;height: 40px;border-bottom: 1px solid #e7eaec;">管理员详情</h5>
            <div style="padding: 5px 10px;">
                <input type="hidden" id="info-id" value="<?php echo ($info["id"]); ?>">
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">登录名</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="adm_name" value="<?php echo ($info["adm_name"]); ?>">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">登录密码</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="name" id="adm_password" value="" placeholder="已有密码，输入新密码">
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">管理员分组</label>
                    <div class="col-sm-10">
                        <select name="role-select" id="role_id" style="height: 35px;width: 370px;">
                            <?php if(is_array($lists)): foreach($lists as $key=>$item): if($item["selected"] == 1): ?><option value="<?php echo ($item["id"]); ?>" selected="selected"><?php echo ($item["title"]); ?></option>
                                    <?php else: ?>
                                    <option value="<?php echo ($item["id"]); ?>"><?php echo ($item["title"]); ?></option><?php endif; endforeach; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">姓名</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo ($info["name"]); ?>">
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
        $("#save-conf").click(function(){
            var id = $("#info-id").val();
            var adm_name = $("#adm_name").val();
            if( adm_name == ""){
                alert("请输入登录名！");
                return;
            }
            var adm_password = $("#adm_password").val();
            var role_id = $("#role_id").val();
            var name = $("#name").val();
            if( name == ""){
                alert("请输入名字！");
                return;
            }

            $.ajax({
                url : "<?php echo U('Role/save_admin');?>",
                data: { "id":id,"adm_name" : adm_name , "adm_pwd" : adm_password , "name" : name ,
                    "role_id": role_id , "ajax":1},
                type:"POST",
                dataType: "json",
                success: function(obj){
                    if(obj.statusCode==200){
                        show_error(obj.message);
                        location.href = "<?php echo U('Role/admins');?>";
                    }
                    else{
                        show_error(obj.message);
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