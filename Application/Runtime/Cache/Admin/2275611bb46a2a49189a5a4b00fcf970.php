<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta name="renderer" content="webkit">
    <title>后台管理登录</title>

    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="/public/common/popup/css/popup.css">
    <link rel="stylesheet" href="/public/admin/css/login.css"/>
</head>

<body>

<div class="login_box">
    <div rel="head">
        <span >欢迎使用</span>
    </div>
    <div rel="form">
        <input type="text" placeholder="填写用户名" id="username" />
        <input type="password" placeholder="填写密码" id="pwd"/>
        <div rel="auth_code">
            <input id="yzm" type="text" placeholder="验证码" value="">
            <img id="verify" src="/m.php?m=Admin&c=Admin&a=verify"  >
        </div>
        <div rel="bottom">
            <input type="button" name="submit_form" class="btn_do_login" id="btn_do_login" value="登录"/>
        </div>
    </div>

</div>
</body>
<script type="text/javascript" src="/public/common/jquery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/public/common/popup/popup.js"></script>
<script>
    $(function(){
        $("#verify").click(function(){
            $(this).attr("src","<?php echo U('Admin/verify');?>");
        });
        $("#btn_do_login").click(function(){
            var username = $("#username").val();
            var password = $("#pwd").val();
            var yzm = $("#yzm").val();
            if(username==""){
                show_error("用户名不能为空!");
                $("#username").focus();
                return;
            }
            if(password==""){
                show_error("密码不能为空!");
                $("#pwd").focus();
                return;
            }
            if(yzm==""){
                show_error("验证码不能为空!");
                $("#yzm").focus();
                return;
            }

            $.ajax({
                url: "<?php echo U('Admin/do_login');?>",
                dataType: "json",
                data:{"username":username,"pwd":password,"yzm":yzm},
                type: "POST",
                success: function(obj){
                    if(obj.status==1)
                    {
                        location.reload();
                    }
                    else {
                        show_error(obj.info);
                        $("#verify").attr("src","<?php echo U('Admin/verify');?>");
                    }
                },
                error:function()
                {
                    $("#verify").attr("src","<?php echo U('Admin/verify');?>");
                    show_error("异常，请刷新重试！");
                }
            });
        })
    })
</script>
</html>