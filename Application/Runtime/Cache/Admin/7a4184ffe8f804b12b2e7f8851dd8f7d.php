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
            </ol>
        </div>
    </div>
    <div class="tab-nav">
        <ul class="nav nav-tabs">
            <li class="active"><a href="javascript:void(0);">文章管理</a></li>
            <li><a href="<?php echo U('ArticleCate/index');?>">分类管理</a></li>
        </ul>
    </div>
    <div class="ibox animated fadeInRight">
        <div class="ibox-title">
            <div>
                <a class="btn btn-success" href="<?php echo U('Article/add');?>">+新增</a>
            </div>
        </div>
        <div class="ibox-content">
            <table class="table table-striped table-bordered table-hover dataTables-example">
                <thead>
                <tr>
                    <th width="6%">#</th>
                    <th width="16%">标题</th>
                    <th width="11%">创建时间</th>
                    <th width="11%">修改时间</th>
                    <th width="7%">发布状态</th>
                    <th width="13%">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($lists)): foreach($lists as $key=>$item): ?><tr>
                        <td><?php echo ($item["id"]); ?></td>
                        <td><?php echo ($item["title"]); ?></td>
                        <td><?php echo (date("Y-m-d H:i:s",$item["create_time"])); ?></td>
                        <td><?php echo (date("Y-m-d H:i:s",$item["create_time"])); ?></td>
                        <td><?php if($item['is_effect'] == 0): ?>未发布<?php else: ?>已发布<?php endif; ?></td>
                        <td><a href="<?php echo U('News/edit',array('id'=>$item.id));?>">编辑</a><button onclick="change_effect(this,<?php echo ($item["id"]); ?>)" class="btn btn-outline btn-success" style="float: none;border: 1px solid #18a689;"><?php if($item['is_effect'] == 0): ?>发布<?php else: ?>取消发布<?php endif; ?></button></td>
                    </tr><?php endforeach; endif; ?>

                </tbody>

            </table>
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
    });
</script>
</body>
</html>