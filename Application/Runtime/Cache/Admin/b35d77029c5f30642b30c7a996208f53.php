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
                    <strong>管理员分组列表</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="content animated fadeInRight">
        <div class="ui-panel bordered">
            <div style="height: 60px;border-bottom: 1px solid #e7eaec;margin-bottom: 15px;padding: 15px">
                <button onclick="location.href='/m.php?m=Admin&c=Role&a=group_role'" type="button" class="btn btn-w-m btn-success"
                        style="float: left;height: 30px;box-sizing: border-box;-moz-box-sizing: border-box;padding: 0;min-width: 100px;margin-right: 20px;">+新增</button>
            </div>
            <div class="tables">
                <table class="table table-bordered dataTable table-striped table-hover dataTables-example" id="tableview">
                    <thead>
                    <tr>
                        <th width="5%">序号</th>
                        <th width="25%">分组名称</th>
                        <th width="25%">创建时间</th>
                        <th width="25%">修改时间</th>
                        <th width="20%">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($lists)): foreach($lists as $key=>$item): ?><tr>
                            <td><?php echo ($item["id"]); ?></td>
                            <td><?php echo ($item["title"]); ?></td>
                            <td><?php echo (date('Y-m-d H:i',$item["create_time"])); ?></td>
                            <td><?php echo (date('Y-m-d H:i',$item["update_time"])); ?></td>
                            <td><a href="<?php echo U('Role/group_role',array('id'=>$item['id']));?>">编辑</a><a href="javascript:void(0);" class="del">删除</a></td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                </table>
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
    $(document).ready(function () {
        $('.dataTables-example').dataTable({
            "bPaginate": true, //翻页功能
            "bLengthChange": true, //改变每页显示数据数量
            "bFilter": true, //过滤功能
            "bSort": true, //排序功能
            "bInfo": true,//页脚信息
            "bAutoWidth": true,
        });
        $("table:eq(0) th").removeClass("sorting_asc");
    });
</script>
</body>
</html>