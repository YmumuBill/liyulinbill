<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <style>
        .modal .modal-dialog .modal-body .control-label{height: 45px;line-height: 33px;}
        .modal .modal-dialog .modal-body .form-group{margin: 5px 0;height: 45px;}
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
    <div class="ibox animated fadeInRight">
        <div class="ibox-content">
            <table class="table table-striped table-bordered table-hover dataTables-example">
                <thead>
                <tr>
                    <th >#</th>
                    <th >父级</th>
                    <th >菜单级别</th>
                    <th>规则</th>
                    <th >名称</th>
                    <th >权限级别</th>
                    <th>操作</th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="ibox-bottom" style="padding-left: 20px;">
            <div>
                <button class="btn btn-success " id="add-cate">+新增</button>
            </div>
        </div>
    </div>
</div>

<div class="modal " id="myModal" tabindex="1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInDown">
            <div class="modal-header">
                <button type="button" class="close mm-close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">添加/编辑</h4>
            </div>
            <div class="modal-body" style="height: 270px;">
                <div class="form-group">
                    <label class="col-md-2 control-label">父级</label>
                    <div class="col-md-10 ">
                        <select name="rule-pid" id="rule-pid" class="form-control">
                            <option value="0">无</option>
                            <?php if(is_array($mFirst)): foreach($mFirst as $key=>$item): ?><option value="<?php echo ($item["id"]); ?>"><?php echo ($item["title"]); ?></option><?php endforeach; endif; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">菜单级别</label>
                    <div class="col-md-10">
                        <select name="rule-menutype" id="rule-menutype" class="form-control">
                            <option value="0">非菜单</option>
                            <option value="1">1级菜单</option>
                            <option value="2">2级菜单</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">规则</label>
                    <div class="col-md-10">
                        <input type="text" id="rule-name" placeholder="url规则，例如:Index/index" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">名称</label>
                    <div class="col-md-10">
                        <input type="text" id="rule-title" placeholder="名称" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">权限级别</label>
                    <div class="col-md-10 ">
                        <select name="rule-type" id="rule-type" class="col-md-9 form-control">
                            <option value="0">无</option>
                            <option value="1">url</option>
                            <option value="2">异步请求</option>
                        </select>
                    </div>
                </div>
                <input type="hidden" id="conf-id" value=""/>
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
        get_lists();
        function get_lists(){
            $('.dataTables-example').dataTable().fnClearTable();
            $('.dataTables-example').dataTable().fnDestroy();
            var table = $('.dataTables-example').dataTable({
                "ajax": "<?php echo U('Role/get_conf');?>",
                "bPaginate": true, //翻页功能
                "bLengthChange": true, //改变每页显示数据数量
                "bFilter": true, //过滤功能
                "bSort": true, //排序功能
                "bInfo": true,//页脚信息
                "bAutoWidth": true,
                "iDisplayLength" : 100, //默认显示的记录数
                "columns": [
                    {"data": "data1"},
                    {"data": "data2"},
                    {"data": "data3"},
                    {"data": "data4"},
                    {"data": "data5"},
                    {"data": "data6"},
                    {"data": "data7"},
                ],
                "initComplete":function(){
                    //编辑
                    $("button[action='edit']").click(function(){
                        var id = $(this).attr("data-id");
                        $("#conf-id").val(id);

                        var pid = $(this).parents("tr").find("td:nth-of-type(2)").text();
                        var menutype = $(this).parents("tr").find("td:nth-of-type(3)").text();
                        var name = $(this).parents("tr").find("td:nth-of-type(4)").text();
                        var title = $(this).parents("tr").find("td:nth-of-type(5)").text();
                        var typeName = $(this).parents("tr").find("td:nth-of-type(6)").text();
                        var type = typeName=="无"?0:(typeName=="url"?1:2);
                        $("#rule-pid option[value='"+pid+"']").attr("selected",true);
                        $("#rule-menutype option[value='"+menutype+"']").attr("selected",true);
                        $("#rule-type option[value='"+type+"']").attr("selected",true);
                        $("#rule-name").val(name);
                        $("#rule-title").val(title);

                        $("#myModal").addClass("in");
                        $("#myModal").css("display","block");
                    });
                    //删除
                    $("button[action='del']").click(function(){
                        var id = $(this).attr("data-id");
                        if(confirm("你正在进行删除操作，确定？")){
                            $.ajax({
                                url:"<?php echo U('Role/del_conf');?>",
                                data: {"id":id, "ajax":1},
                                type:"POST",
                                dataType: "json",
                                success:function(msg){
                                    if(msg.statusCode==200){
                                        get_lists();
                                    }else {
                                        show_error(msg.message);
                                    }
                                },
                                error:function(msg){
                                    show_error("网络异常！请刷新重试");
                                }
                            })
                        }
                    });
                }
            });
            $("table:eq(0) th").removeClass("sorting_asc");
        }
        //新增
        $("#add-cate").click(function(){
            $("#myModal").addClass("in");
            $("#myModal").css("display","block");
            $("#conf-id").val("");
            $("#rule-name").val("");
            $("#rule-title").val("");
        });


        $("#myModal .btn-success").click(function(){
            var pid = $("#rule-pid option:selected").val();
            var menutype = $("#rule-menutype option:selected").val();
            var type = $("#rule-type option:selected").val();
            var name = $("#rule-name");
            var title = $("#rule-title");
            var id = $("#conf-id").val();
            if(name.val()==""&&type!=0){
                show_error("请输入url规则，例如Index/index");
                name.focus();
                return;
            }
            if(title.val()==""&&menutype!=1){
                show_error("请输入规则名称！");
                title.focus();
                return;
            }
            if(type==2&&menutype!=0){
                show_error("异步请求规则不能作为菜单栏");
                return;
            }
            if(pid==0&&menutype!=1){
                show_error("非一级菜单需要父级");
                return;
            }
            if(pid==id&&id){
                show_error("父级与自身不能相同");
                return;
            }
            $.ajax({
                url:"<?php echo U('Role/save_conf');?>",
                data: {"id":id, "ajax":1,"pid":pid,"menutype":menutype,"type":type,"name":name.val(),"title":title.val()},
                type:"POST",
                dataType: "json",
                success:function(msg){
                    if(msg.statusCode==200){
                        $("#myModal").fadeOut(300);
                        get_lists();
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