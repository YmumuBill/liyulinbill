<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>后台管理系统</title>
    <script src="/public/common/jquery/jquery-1.8.2.min.js" type="application/javascript"></script>
</head>
<body>
<link rel="stylesheet" href="/public/common/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="/public/common/bootstrap/css/font-awesome.min.css">
<link rel="stylesheet" href="/public/admin/css/header.css">
<header>
    <nav class="header navbar navbar-static-top">
        <div class="navbar-header">
            <a href="javascript:void(0);" class=" btn btn-primary mm-nav-toggle show">
                <i class="icon-align-justify"></i>
            </a>
        </div>

        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a href="javascript:void(0);"><i class="icon-user"></i> <?php echo ($adminInfo["name"]); ?></a>
            </li>
            <li>
                <a href="<?php echo U('Admin/do_logout');?>">
                    <i class="icon-signout"></i> 退出
                </a>
            </li>
        </ul>
    </nav>
</header>
<script>
    $(function(){
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
            }else {
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
    })
</script>
<link rel="stylesheet" href="/public/admin/css/left.css">
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

</div>
</body>
</html>