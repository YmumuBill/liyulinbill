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
            <li ><a href="<?php echo U('Article/index');?>">文章管理</a></li>
            <li class="active" ><a href="javascript:void(0);">分类管理</a></li>
        </ul>
    </div>
    <div class="ibox animated fadeInRight">
        <div class="ibox-title">
            <div>
                <button class="btn btn-success " id="add-cate">+新增</button>
            </div>
        </div>
        <div class="ibox-content">
            <table class="table table-striped table-bordered table-hover dataTables-example">
                <thead>
                <tr>
                    <th >#</th>
                    <th >名字</th>
                    <th >文章总数</th>
                    <th >创建时间</th>
                    <th >操作</th>
                </tr>
                </thead>
            </table>
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
                <input type="hidden" id="cate-id" value=""/>
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
        get_cate_lists();
        function get_cate_lists(){
            $('.dataTables-example').dataTable().fnClearTable();
            $('.dataTables-example').dataTable().fnDestroy();
            $('.dataTables-example').dataTable({
                "serverSide": true,
                "ajax": {
                    url:"<?php echo U('ArticleCate/get_lists');?>",
                    type:"POST",
                    data:function(d){
                        d.ajax = 1;
                    }
                },
                "bPaginate": true, //翻页功能
                "bLengthChange": true, //改变每页显示数据数量
                "bFilter": true, //过滤功能
                "bSort": false, //排序功能
                "bInfo": true,//页脚信息
                "bAutoWidth": true,
                "columns": [
                    {"data": "data1"},
                    {"data": "data2"},
                    {"data": "data3"},
                    {"data": "data4"},
                    {"data": "data5"}
                ],
                "initComplete":function(){
                    //编辑
                    $("button[action='edit']").click(function(){
                        var id = $(this).attr("data-id");
                        $("#cate-id").val(id);
                        var name = $(this).parents("tr").find("td:nth-of-type(2)").text();
                        $("#input-cate").val(name);
                        $("#add-cate").click();
                    });
                    //删除
                    $("button[action='del']").click(function(){
                        var id = $(this).attr("data-id");
                        $.ajax({
                            url:"<?php echo U('ArticleCate/del_cate');?>",
                            data: {"id":id, "ajax":1},
                            type:"POST",
                            dataType: "json",
                            success:function(msg){
                                if(msg.status){
                                    get_cate_lists();
                                }
                            },
                            error:function(msg){
                                show_error("网络异常！请刷新重试");
                            }
                        })
                    });
                }
            });
            $("table:eq(0) th").removeClass("sorting_asc");


        }
        //新增
        $("#add-cate").click(function(){
            $("#myModal").addClass("in");
            $("#myModal").css("display","block");
        });


        $("#myModal .btn-success").click(function(){
            var name_input = $("#input-cate");
            var id = $("#cate-id").val();
            if(name_input.val()==""){
                show_error("请输入类型,例.新闻、公告。");
                name_input.focus();
                return;
            }
            $.ajax({
                url:"<?php echo U('ArticleCate/save_cate');?>",
                data: {"name":name_input.val(),"id":id, "ajax":1},
                type:"POST",
                dataType: "json",
                success:function(msg){
                    if(msg.statusCode==200){
                        name_input.val("");
                        $("#myModal").fadeOut(300);
                        get_cate_lists();
                    }else{
                        show_error(msg.message);
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