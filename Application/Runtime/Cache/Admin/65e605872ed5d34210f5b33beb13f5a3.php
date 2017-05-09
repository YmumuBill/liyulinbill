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
            <h2>首页</h2>
        </div>
    </div>
    <div class="tab-nav">
        <ul class="nav nav-tabs">
            <li class="active"><a href="javascript:void(0);">用户列表</a></li>
            <li><a href="<?php echo U('User/black');?>">黑名单</a></li>
        </ul>
    </div>
    <div class="ibox animated fadeInRight">
        <div class="ibox-title">
            <div>
                <input type="text" name="name" value="" placeholder="请输入姓名" class="mm-input-text">
                <button class="btn btn-success " id="search">查询</button>
            </div>
        </div>
        <div class="ibox-content">
            <table class="table table-striped table-bordered table-hover dataTables-example">
                <thead>
                <tr>
                    <th >id</th>
                    <th >昵称</th>
                    <th >姓名</th>
                    <th >性别</th>
                    <th >手机号</th>
                    <th >邮箱</th>
                    <th>证件号</th>
                    <th >注册时间</th>
                    <th>操作</th>
                </tr>
                </thead>
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
    $(function(){
        $("#search").click(function(){
            get_lists();
        });

        get_lists();
        function get_lists(){
            var jsonRe;
            jsonRe = [
                {"data": "data1"},
                {"data": "data2"},
                {"data": "data3"},
                {"data": "data4"},
                {"data": "data5"},
                {"data": "data6"},
                {"data": "data7"},
                {"data": "data8"},
                {"data": "data9"},
            ];
            $('.dataTables-example').dataTable().fnDestroy();
            $('.dataTables-example').dataTable({
                "serverSide": true,
                "bPaginate": true, //翻页功能
                "bLengthChange": false, //改变每页显示数据数量
                "iDisplayLength":50,
                "bFilter": false, //过滤功能
                "bSort": false, //排序功能
                "bInfo": true,//页脚信息
                "sPaginationType" : "full_numbers",//分页
                "bProcessing" : true,
                "bAutoWidth": true,
                "columns": jsonRe,
                "sAjaxSource":"<?php echo U('User/get_lists');?>",
                "fnServerData":receiveDataCallback,
            });
            $("table:eq(0) th").removeClass("sorting_asc");
        }
        function receiveDataCallback(sSource, aoData, fnCallback){
            $.ajax({
                'type':"POST",
                "url":sSource,
                "dataType":"json",
                "data":{"aoData":aoData,"ajax":1,"name":$(".ibox-title input[name='name']").val()},
                "success":function(resp){
                    if(resp.statusCode == 300){
                        show_error(resp.message);
                    }
                    fnCallback(resp);
                },
                "complete":initComplete,
            })
        }
        function initComplete(){
            $(".dataTables-example .mm-del").click(function(){
                var id = $(this).attr("data-id");
                var action = $(this).attr("action");
                var obj = this;
                $.ajax({
                    'type':"POST",
                    'url':'<?php echo U("User/del");?>',
                    'dataType':"json",
                    'data':{'id':id,'action':action,"ajax":1},
                    "success":function(msg){
                        if(msg.statusCode==200){
                            if(action == 1){
                                show_error("已加入黑名单！");
                                $(obj).html("已拉黑");
                            }else{
                                show_error("已加入白名单！");
                                $(obj).html("已正常");
                            }
                            $(obj).prop("disabled",true);
                        }else{
                            show_error(msg.message);
                        }
                    },
                    "error":function(msg){
                        console.log(msg);
                        show_error("网络异常，请刷新重试！");
                    }
                })
            })
        }
    })

</script>

</body>
</html>