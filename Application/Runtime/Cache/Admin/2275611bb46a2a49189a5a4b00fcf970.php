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
        <form  id="login_form" method="post">
            <input type="text" placeholder="填写用户名" id="username" />
            <input type="password" placeholder="填写密码" id="pwd"/>
            <div rel="auth_code">
                <input id="yzm" type="text" placeholder="验证码" value="">
                <img id="verify" src="/m.php?m=Admin&c=Admin&a=verify"  >
            </div>
            <div rel="bottom">
                <input type="submit" name="submit_form" class="btn_do_login" id="btn_do_login" value="登录"/>
            </div>
        </form>
    </div>
</div>
</body>
<script type="text/javascript" src="/public/common/jquery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/public/common/popup/popup.js"></script>
<script>
    $(function(){
        $("#verify").click(function(){
            $(this).attr("src", "<?php echo U('Admin/verify');?>");
        });

        $("#login_form").submit(function(){
            var data = {
                adm_name: $('#username').val(),
                adm_pwd: $('#pwd').val(),
                yzm: $('#yzm').val()
            };
            $.post("<?php echo U('Admin/login');?>", data, function(r) {
                if (r.statusCode == 300) {
                    show_error(r.message);
                    $("#verify").attr("src", "<?php echo U('Admin/verify');?>");
                } else {
                    console.log(r);
                    window.location.href = r.url;
                }
            },'json');

            return false;
        });
    })
</script>
</html>