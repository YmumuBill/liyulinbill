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
                <a href="javascript:void(0);"><i class="icon-user"></i> 李渝林123</a>
            </li>
            <li>
                <a href="/m.php?m=Admin&c=Admin&a=logout">
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
            <li class="">
                    <a href="/m.php?m=Admin&c=Index&a=index"><i class="fa "></i>首页</a>
                                        </li><li class="">
                                            <a href="javascript:void(0)" class="mm-left-toggle-ul"><i class="fa "></i>用户管理<i class="icon-angle-left"></i></a>
                        <ul class="nav nav-second-level">
                            <li class=""><a href="/m.php?m=Admin&c=User&a=index"><i class="icon-angle-right"></i> 用户列表</a></li>                        </ul>                </li><li class="">
                                            <a href="javascript:void(0)" class="mm-left-toggle-ul"><i class="fa "></i>文章管理<i class="icon-angle-left"></i></a>
                        <ul class="nav nav-second-level">
                            <li class=""><a href="/m.php?m=Admin&c=Article&a=index"><i class="icon-angle-right"></i> 文章列表</a></li><li class=""><a href="/m.php?m=Admin&c=ArticleCate&a=index"><i class="icon-angle-right"></i> 分类管理</a></li>                        </ul>                </li><li class="">
                                            <a href="javascript:void(0)" class="mm-left-toggle-ul"><i class="fa "></i>图片管理<i class="icon-angle-left"></i></a>
                        <ul class="nav nav-second-level">
                            <li class=""><a href="/m.php?m=Admin&c=Album&a=index"><i class="icon-angle-right"></i> 相册</a></li><li class=""><a href="/m.php?m=Admin&c=Photo&a=index"><i class="icon-angle-right"></i> 相片</a></li>                        </ul>                </li><li class="">
                    <a href="/m.php?m=Admin&c=Video&a=index"><i class="fa "></i>视频管理</a>
                                        </li><li class="">
                    <a href="/m.php?m=Admin&c=Figures&a=index"><i class="fa "></i>人物简历</a>
                                        </li>        </ul>
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
<style>
    .award-item{   position: relative;  padding-right: 20px;  margin-bottom: 10px;  }
    .award-item .award_action{      position: absolute;  right: 0;  top: 0;  font-size: 20px;  cursor: pointer;  color: #888;  }
</style>
<link rel="stylesheet" href="/public/common/date/css/laydate.css">
<div id="body">
    <div class="row wrapper mm-head-nav">
        <div class="col-lg-10">
            <h2>人物简历</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="/m.php?m=Admin&c=Index&a=index">主页</a>
                </li>
                <li>
                    <strong>人物简历</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="ibox animated fadeInRight">
        <div class="ibox-content">
            <form class="form-horizontal form-row-border" action="" method="post" proxy="auto" novalidate="">
                <div class="row">
                    <div class="col-md-9 form-fieldset">
                        <div class="form-group has-feedback">
                            <label class="col-md-3 control-label">姓名: </label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="name" title="姓名" value="" placeholder="输入姓名" validator="required|maxLength(15)" maxlength="15">
                                <span class="form-control-feedback" id="inputFeedbackOfName">0/15</span>
                                <input type="hidden" name="id" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">性别: </label>
                            <div class="col-md-9">
                                <label class="radio-inline">
                                    <input type="radio" name="sex" value="0" checked="">男
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="sex" value="1" >女
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">出生年月: </label>
                            <div class="col-md-9 form-inline" id="birthdaySelect" role="date-select">
                                <input type="text" class="laydate-icon mm-input-text" value="" name="birthday" id="birthday" style="width: 242px;"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">籍贯: </label>
                            <div class="col-md-9 form-inline" id="districtSelect">
                                <select class="form-control" id="province" name="province" title="地区">
                                    <option value="">--请选择--</option>
                                    <option value="国外" rel="3402" >国外</option><option value="台湾" rel="397" >台湾</option><option value="澳门" rel="396" >澳门</option><option value="香港" rel="395" >香港</option><option value="重庆" rel="394" >重庆</option><option value="天津" rel="343" >天津</option><option value="上海" rel="321" >上海</option><option value="北京" rel="52" >北京</option><option value="浙江" rel="31" >浙江</option><option value="云南" rel="30" >云南</option><option value="新疆" rel="29" >新疆</option><option value="西藏" rel="28" >西藏</option><option value="四川" rel="26" >四川</option><option value="陕西" rel="24" >陕西</option><option value="山西" rel="23" >山西</option><option value="山东" rel="22" >山东</option><option value="青海" rel="21" >青海</option><option value="宁夏" rel="20" >宁夏</option><option value="内蒙古" rel="19" >内蒙古</option><option value="辽宁" rel="18" >辽宁</option><option value="江西" rel="17" >江西</option><option value="江苏" rel="16" >江苏</option><option value="吉林" rel="15" >吉林</option><option value="湖南" rel="14" >湖南</option><option value="湖北" rel="13" >湖北</option><option value="黑龙江" rel="12" >黑龙江</option><option value="河南" rel="11" >河南</option><option value="河北" rel="10" >河北</option><option value="海南" rel="9" >海南</option><option value="贵州" rel="8" >贵州</option><option value="广西" rel="7" >广西</option><option value="广东" rel="6" >广东</option><option value="甘肃" rel="5" >甘肃</option><option value="福建" rel="4" >福建</option><option value="安徽" rel="3" >安徽</option>                                </select>　
                                <select class="form-control" name="city" id="city" title="城市">
                                    <option value="">--请选择--</option>
                                    <option value="新西兰" rel="3420" >新西兰</option><option value="俄罗斯" rel="3419" >俄罗斯</option><option value="印度尼西亚" rel="3418" >印度尼西亚</option><option value="越南" rel="3417" >越南</option><option value="希腊" rel="3416" >希腊</option><option value="德国" rel="3415" >德国</option><option value="美国" rel="3414" >美国</option><option value="芬兰" rel="3413" >芬兰</option><option value="日本" rel="3412" >日本</option><option value="印度" rel="3411" >印度</option><option value="泰国" rel="3410" >泰国</option><option value="柬埔寨" rel="3409" >柬埔寨</option><option value="澳大利亚" rel="3408" >澳大利亚</option><option value="韩国" rel="3407" >韩国</option><option value="法国" rel="3406" >法国</option><option value="加拿大" rel="3405" >加拿大</option><option value="阿勒泰" rel="3404" >阿勒泰</option><option value="新加坡" rel="3403" >新加坡</option><option value="赤水" rel="3401" >赤水</option><option value="澎湖县" rel="3400" >澎湖县</option><option value="花莲县" rel="3399" >花莲县</option><option value="台东县" rel="3398" >台东县</option><option value="屏东县" rel="3397" >屏东县</option><option value="云林县" rel="3396" >云林县</option><option value="南投县" rel="3395" >南投县</option><option value="彰化县" rel="3394" >彰化县</option><option value="苗栗县" rel="3393" >苗栗县</option><option value="桃园县" rel="3392" >桃园县</option><option value="宜兰县" rel="3391" >宜兰县</option><option value="嘉义" rel="3390" >嘉义</option><option value="新竹" rel="3389" >新竹</option><option value="台南" rel="3388" >台南</option><option value="台中" rel="3387" >台中</option><option value="基隆" rel="3386" >基隆</option><option value="高雄" rel="3385" >高雄</option><option value="台北" rel="3384" >台北</option><option value="澳门" rel="3383" >澳门</option><option value="离岛区" rel="3382" >离岛区</option><option value="中西区" rel="3381" >中西区</option><option value="荃湾区" rel="3380" >荃湾区</option><option value="南区" rel="3379" >南区</option><option value="北区" rel="3378" >北区</option><option value="油尖旺区" rel="3377" >油尖旺区</option><option value="湾仔区" rel="3376" >湾仔区</option><option value="大埔区" rel="3375" >大埔区</option><option value="西贡区" rel="3374" >西贡区</option><option value="深水埗区" rel="3373" >深水埗区</option><option value="元朗区" rel="3372" >元朗区</option><option value="葵青区" rel="3371" >葵青区</option><option value="屯门区" rel="3370" >屯门区</option><option value="九龙城区" rel="3369" >九龙城区</option><option value="黄大仙区" rel="3368" >黄大仙区</option><option value="观塘区" rel="3367" >观塘区</option><option value="东区" rel="3366" >东区</option><option value="沙田区" rel="3365" >沙田区</option><option value="秀山" rel="3364" >秀山</option><option value="酉阳" rel="3363" >酉阳</option><option value="彭水" rel="3362" >彭水</option><option value="石柱" rel="3361" >石柱</option><option value="忠县" rel="3360" >忠县</option><option value="云阳县" rel="3359" >云阳县</option><option value="奉节县" rel="3358" >奉节县</option><option value="巫山县" rel="3357" >巫山县</option><option value="巫溪县" rel="3356" >巫溪县</option><option value="开县" rel="3355" >开县</option><option value="梁平县" rel="3354" >梁平县</option><option value="城口县" rel="3353" >城口县</option><option value="丰都县" rel="3352" >丰都县</option><option value="武隆县" rel="3351" >武隆县</option><option value="垫江县" rel="3350" >垫江县</option><option value="璧山县" rel="3349" >璧山县</option><option value="荣昌县" rel="3348" >荣昌县</option><option value="大足县" rel="3347" >大足县</option><option value="铜梁县" rel="3346" >铜梁县</option><option value="潼南县" rel="3345" >潼南县</option><option value="綦江县" rel="3344" >綦江县</option><option value="双桥区" rel="3343" >双桥区</option><option value="长寿区" rel="3342" >长寿区</option><option value="黔江开发区" rel="3341" >黔江开发区</option><option value="渝中区" rel="3340" >渝中区</option><option value="九龙坡区" rel="3339" >九龙坡区</option><option value="江北区" rel="3338" >江北区</option><option value="涪陵区" rel="3337" >涪陵区</option><option value="巴南区" rel="3336" >巴南区</option><option value="沙坪坝区" rel="3335" >沙坪坝区</option><option value="北碚区" rel="3334" >北碚区</option><option value="万州区" rel="3333" >万州区</option><option value="大渡口区" rel="3332" >大渡口区</option><option value="万盛区" rel="3331" >万盛区</option><option value="渝北区" rel="3330" >渝北区</option><option value="南岸区" rel="3329" >南岸区</option><option value="永川区" rel="3328" >永川区</option><option value="南川区" rel="3327" >南川区</option><option value="江津区" rel="3326" >江津区</option><option value="合川区" rel="3325" >合川区</option><option value="蓟县" rel="2930" >蓟县</option><option value="静海县" rel="2929" >静海县</option><option value="宁河县" rel="2928" >宁河县</option><option value="经济开发区" rel="2927" >经济开发区</option><option value="宝坻区" rel="2926" >宝坻区</option><option value="武清区" rel="2925" >武清区</option><option value="大港区" rel="2924" >大港区</option><option value="汉沽区" rel="2923" >汉沽区</option><option value="塘沽区" rel="2922" >塘沽区</option><option value="北辰区" rel="2921" >北辰区</option><option value="西青区" rel="2920" >西青区</option><option value="津南区" rel="2919" >津南区</option><option value="东丽区" rel="2918" >东丽区</option><option value="红桥区" rel="2917" >红桥区</option><option value="河东区" rel="2916" >河东区</option><option value="河北区" rel="2915" >河北区</option><option value="南开区" rel="2914" >南开区</option><option value="河西区" rel="2913" >河西区</option><option value="和平区" rel="2912" >和平区</option><option value="崇明县" rel="2721" >崇明县</option><option value="奉贤区" rel="2720" >奉贤区</option><option value="金山区" rel="2719" >金山区</option><option value="青浦区" rel="2718" >青浦区</option><option value="宝山区" rel="2717" >宝山区</option><option value="嘉定区" rel="2716" >嘉定区</option><option value="松江区" rel="2715" >松江区</option><option value="南汇区" rel="2714" >南汇区</option><option value="黄浦区" rel="2713" >黄浦区</option><option value="虹口区" rel="2712" >虹口区</option><option value="卢湾区" rel="2711" >卢湾区</option><option value="静安区" rel="2710" >静安区</option><option value="普陀区" rel="2709" >普陀区</option><option value="杨浦区" rel="2708" >杨浦区</option><option value="浦东新区" rel="2707" >浦东新区</option><option value="徐汇区" rel="2706" >徐汇区</option><option value="闵行区" rel="2705" >闵行区</option><option value="闸北区" rel="2704" >闸北区</option><option value="长宁区" rel="2703" >长宁区</option><option value="延庆县" rel="517" >延庆县</option><option value="密云县" rel="516" >密云县</option><option value="大兴区" rel="515" >大兴区</option><option value="平谷区" rel="514" >平谷区</option><option value="怀柔区" rel="513" >怀柔区</option><option value="昌平区" rel="512" >昌平区</option><option value="顺义区" rel="511" >顺义区</option><option value="通州区" rel="510" >通州区</option><option value="门头沟区" rel="509" >门头沟区</option><option value="房山区" rel="508" >房山区</option><option value="石景山区" rel="507" >石景山区</option><option value="丰台区" rel="506" >丰台区</option><option value="宣武区" rel="505" >宣武区</option><option value="崇文区" rel="504" >崇文区</option><option value="朝阳区" rel="503" >朝阳区</option><option value="海淀区" rel="502" >海淀区</option><option value="西城区" rel="501" >西城区</option><option value="东城区" rel="500" >东城区</option><option value="衢州" rel="393" >衢州</option><option value="舟山" rel="392" >舟山</option><option value="温州" rel="391" >温州</option><option value="台州" rel="390" >台州</option><option value="绍兴" rel="389" >绍兴</option><option value="宁波" rel="388" >宁波</option><option value="丽水" rel="387" >丽水</option><option value="金华" rel="386" >金华</option><option value="嘉兴" rel="385" >嘉兴</option><option value="湖州" rel="384" >湖州</option><option value="杭州" rel="383" >杭州</option><option value="昭通" rel="382" >昭通</option><option value="玉溪" rel="381" >玉溪</option><option value="西双版纳" rel="380" >西双版纳</option><option value="文山" rel="379" >文山</option><option value="曲靖" rel="378" >曲靖</option><option value="临沧" rel="377" >临沧</option><option value="红河" rel="376" >红河</option><option value="迪庆" rel="375" >迪庆</option><option value="德宏" rel="374" >德宏</option><option value="大理" rel="373" >大理</option><option value="楚雄" rel="372" >楚雄</option><option value="保山" rel="371" >保山</option><option value="丽江" rel="370" >丽江</option><option value="普洱" rel="369" >普洱</option><option value="怒江" rel="368" >怒江</option><option value="昆明" rel="367" >昆明</option><option value="伊犁" rel="366" >伊犁</option><option value="五家渠" rel="365" >五家渠</option><option value="吐鲁番" rel="364" >吐鲁番</option><option value="图木舒克" rel="363" >图木舒克</option><option value="石河子" rel="362" >石河子</option><option value="克孜勒苏" rel="361" >克孜勒苏</option><option value="克拉玛依" rel="360" >克拉玛依</option><option value="喀什" rel="359" >喀什</option><option value="和田" rel="358" >和田</option><option value="哈密" rel="357" >哈密</option><option value="昌吉" rel="356" >昌吉</option><option value="博尔塔拉" rel="355" >博尔塔拉</option><option value="巴音郭楞" rel="354" >巴音郭楞</option><option value="阿拉尔" rel="353" >阿拉尔</option><option value="阿克苏" rel="352" >阿克苏</option><option value="乌鲁木齐" rel="351" >乌鲁木齐</option><option value="山南" rel="350" >山南</option><option value="日喀则" rel="349" >日喀则</option><option value="那曲" rel="348" >那曲</option><option value="林芝" rel="347" >林芝</option><option value="昌都" rel="346" >昌都</option><option value="阿里" rel="345" >阿里</option><option value="拉萨" rel="344" >拉萨</option><option value="泸州" rel="342" >泸州</option><option value="自贡" rel="341" >自贡</option><option value="资阳" rel="340" >资阳</option><option value="宜宾" rel="339" >宜宾</option><option value="雅安" rel="338" >雅安</option><option value="遂宁" rel="337" >遂宁</option><option value="攀枝花" rel="336" >攀枝花</option><option value="内江" rel="335" >内江</option><option value="南充" rel="334" >南充</option><option value="眉山" rel="333" >眉山</option><option value="凉山" rel="332" >凉山</option><option value="乐山" rel="331" >乐山</option><option value="广元" rel="330" >广元</option><option value="广安" rel="329" >广安</option><option value="甘孜" rel="328" >甘孜</option><option value="德阳" rel="327" >德阳</option><option value="达州" rel="326" >达州</option><option value="巴中" rel="325" >巴中</option><option value="阿坝" rel="324" >阿坝</option><option value="绵阳" rel="323" >绵阳</option><option value="成都" rel="322" >成都</option><option value="榆林" rel="320" >榆林</option><option value="延安" rel="319" >延安</option><option value="咸阳" rel="318" >咸阳</option><option value="渭南" rel="317" >渭南</option><option value="铜川" rel="316" >铜川</option><option value="商洛" rel="315" >商洛</option><option value="汉中" rel="314" >汉中</option><option value="宝鸡" rel="313" >宝鸡</option><option value="安康" rel="312" >安康</option><option value="西安" rel="311" >西安</option><option value="运城" rel="310" >运城</option><option value="阳泉" rel="309" >阳泉</option><option value="忻州" rel="308" >忻州</option><option value="朔州" rel="307" >朔州</option><option value="吕梁" rel="306" >吕梁</option><option value="临汾" rel="305" >临汾</option><option value="晋中" rel="304" >晋中</option><option value="晋城" rel="303" >晋城</option><option value="大同" rel="302" >大同</option><option value="长治" rel="301" >长治</option><option value="太原" rel="300" >太原</option><option value="淄博" rel="299" >淄博</option><option value="枣庄" rel="298" >枣庄</option><option value="烟台" rel="297" >烟台</option><option value="潍坊" rel="296" >潍坊</option><option value="威海" rel="295" >威海</option><option value="泰安" rel="294" >泰安</option><option value="日照" rel="293" >日照</option><option value="临沂" rel="292" >临沂</option><option value="聊城" rel="291" >聊城</option><option value="莱芜" rel="290" >莱芜</option><option value="济宁" rel="289" >济宁</option><option value="菏泽" rel="288" >菏泽</option><option value="东营" rel="287" >东营</option><option value="德州" rel="286" >德州</option><option value="滨州" rel="285" >滨州</option><option value="青岛" rel="284" >青岛</option><option value="济南" rel="283" >济南</option><option value="玉树" rel="282" >玉树</option><option value="黄南" rel="281" >黄南</option><option value="海西" rel="280" >海西</option><option value="海南" rel="279" >海南</option><option value="海东" rel="278" >海东</option><option value="海北" rel="277" >海北</option><option value="果洛" rel="276" >果洛</option><option value="西宁" rel="275" >西宁</option><option value="中卫" rel="274" >中卫</option><option value="吴忠" rel="273" >吴忠</option><option value="石嘴山" rel="272" >石嘴山</option><option value="固原" rel="271" >固原</option><option value="银川" rel="270" >银川</option><option value="兴安盟" rel="269" >兴安盟</option><option value="锡林郭勒盟" rel="268" >锡林郭勒盟</option><option value="乌兰察布市" rel="267" >乌兰察布市</option><option value="乌海" rel="266" >乌海</option><option value="通辽" rel="265" >通辽</option><option value="呼伦贝尔" rel="264" >呼伦贝尔</option><option value="鄂尔多斯" rel="263" >鄂尔多斯</option><option value="赤峰" rel="262" >赤峰</option><option value="包头" rel="261" >包头</option><option value="巴彦淖尔盟" rel="260" >巴彦淖尔盟</option><option value="阿拉善盟" rel="259" >阿拉善盟</option><option value="呼和浩特" rel="258" >呼和浩特</option><option value="营口" rel="257" >营口</option><option value="铁岭" rel="256" >铁岭</option><option value="盘锦" rel="255" >盘锦</option><option value="辽阳" rel="254" >辽阳</option><option value="锦州" rel="253" >锦州</option><option value="葫芦岛" rel="252" >葫芦岛</option><option value="阜新" rel="251" >阜新</option><option value="抚顺" rel="250" >抚顺</option><option value="丹东" rel="249" >丹东</option><option value="朝阳" rel="248" >朝阳</option><option value="本溪" rel="247" >本溪</option><option value="鞍山" rel="246" >鞍山</option><option value="大连" rel="245" >大连</option><option value="沈阳" rel="244" >沈阳</option><option value="鹰潭" rel="243" >鹰潭</option><option value="宜春" rel="242" >宜春</option><option value="新余" rel="241" >新余</option><option value="上饶" rel="240" >上饶</option><option value="萍乡" rel="239" >萍乡</option><option value="九江" rel="238" >九江</option><option value="景德镇" rel="237" >景德镇</option><option value="吉安" rel="236" >吉安</option><option value="赣州" rel="235" >赣州</option><option value="抚州" rel="234" >抚州</option><option value="南昌" rel="233" >南昌</option><option value="镇江" rel="232" >镇江</option><option value="扬州" rel="231" >扬州</option><option value="盐城" rel="230" >盐城</option><option value="徐州" rel="229" >徐州</option><option value="泰州" rel="228" >泰州</option><option value="宿迁" rel="227" >宿迁</option><option value="南通" rel="226" >南通</option><option value="连云港" rel="225" >连云港</option><option value="淮安" rel="224" >淮安</option><option value="常州" rel="223" >常州</option><option value="无锡" rel="222" >无锡</option><option value="苏州" rel="221" >苏州</option><option value="南京" rel="220" >南京</option><option value="延边" rel="219" >延边</option><option value="通化" rel="218" >通化</option><option value="松原" rel="217" >松原</option><option value="四平" rel="216" >四平</option><option value="辽源" rel="215" >辽源</option><option value="白山" rel="214" >白山</option><option value="白城" rel="213" >白城</option><option value="吉林" rel="212" >吉林</option><option value="长春" rel="211" >长春</option><option value="株洲" rel="210" >株洲</option><option value="岳阳" rel="209" >岳阳</option><option value="永州" rel="208" >永州</option><option value="益阳" rel="207" >益阳</option><option value="湘西" rel="206" >湘西</option><option value="湘潭" rel="205" >湘潭</option><option value="邵阳" rel="204" >邵阳</option><option value="娄底" rel="203" >娄底</option><option value="怀化" rel="202" >怀化</option><option value="衡阳" rel="201" >衡阳</option><option value="郴州" rel="200" >郴州</option><option value="常德" rel="199" >常德</option><option value="张家界" rel="198" >张家界</option><option value="长沙" rel="197" >长沙</option><option value="恩施" rel="196" >恩施</option><option value="宜昌" rel="195" >宜昌</option><option value="孝感" rel="194" >孝感</option><option value="襄阳" rel="193" >襄阳</option><option value="咸宁" rel="192" >咸宁</option><option value="天门" rel="191" >天门</option><option value="随州" rel="190" >随州</option><option value="十堰" rel="189" >十堰</option><option value="神农架林区" rel="188" >神农架林区</option><option value="潜江" rel="187" >潜江</option><option value="荆州" rel="186" >荆州</option><option value="荆门" rel="185" >荆门</option><option value="黄石" rel="184" >黄石</option><option value="黄冈" rel="183" >黄冈</option><option value="鄂州" rel="182" >鄂州</option><option value="仙桃" rel="181" >仙桃</option><option value="武汉" rel="180" >武汉</option><option value="伊春" rel="179" >伊春</option><option value="绥化" rel="178" >绥化</option><option value="双鸭山" rel="177" >双鸭山</option><option value="齐齐哈尔" rel="176" >齐齐哈尔</option><option value="七台河" rel="175" >七台河</option><option value="牡丹江" rel="174" >牡丹江</option><option value="佳木斯" rel="173" >佳木斯</option><option value="鸡西" rel="172" >鸡西</option><option value="黑河" rel="171" >黑河</option><option value="鹤岗" rel="170" >鹤岗</option><option value="大兴安岭" rel="169" >大兴安岭</option><option value="大庆" rel="168" >大庆</option><option value="哈尔滨" rel="167" >哈尔滨</option><option value="濮阳" rel="166" >濮阳</option><option value="漯河" rel="165" >漯河</option><option value="驻马店" rel="164" >驻马店</option><option value="周口" rel="163" >周口</option><option value="许昌" rel="162" >许昌</option><option value="信阳" rel="161" >信阳</option><option value="新乡" rel="160" >新乡</option><option value="商丘" rel="159" >商丘</option><option value="三门峡" rel="158" >三门峡</option><option value="平顶山" rel="157" >平顶山</option><option value="南阳" rel="156" >南阳</option><option value="焦作" rel="155" >焦作</option><option value="济源" rel="154" >济源</option><option value="鹤壁" rel="153" >鹤壁</option><option value="安阳" rel="152" >安阳</option><option value="开封" rel="151" >开封</option><option value="洛阳" rel="150" >洛阳</option><option value="郑州" rel="149" >郑州</option><option value="张家口" rel="148" >张家口</option><option value="邢台" rel="147" >邢台</option><option value="唐山" rel="146" >唐山</option><option value="秦皇岛" rel="145" >秦皇岛</option><option value="廊坊" rel="144" >廊坊</option><option value="衡水" rel="143" >衡水</option><option value="邯郸" rel="142" >邯郸</option><option value="承德" rel="141" >承德</option><option value="沧州" rel="140" >沧州</option><option value="保定" rel="139" >保定</option><option value="石家庄" rel="138" >石家庄</option><option value="儋州" rel="137" >儋州</option><option value="五指山" rel="136" >五指山</option><option value="文昌" rel="135" >文昌</option><option value="万宁" rel="134" >万宁</option><option value="屯昌县" rel="133" >屯昌县</option><option value="琼中" rel="132" >琼中</option><option value="琼海" rel="131" >琼海</option><option value="陵水" rel="130" >陵水</option><option value="临高县" rel="129" >临高县</option><option value="乐东" rel="128" >乐东</option><option value="东方" rel="127" >东方</option><option value="定安县" rel="126" >定安县</option><option value="澄迈县" rel="125" >澄迈县</option><option value="昌江" rel="124" >昌江</option><option value="保亭" rel="123" >保亭</option><option value="白沙" rel="122" >白沙</option><option value="三亚" rel="121" >三亚</option><option value="海口" rel="120" >海口</option><option value="遵义" rel="119" >遵义</option><option value="铜仁" rel="118" >铜仁</option><option value="黔西南" rel="117" >黔西南</option><option value="黔南" rel="116" >黔南</option><option value="黔东南" rel="115" >黔东南</option><option value="六盘水" rel="114" >六盘水</option><option value="毕节" rel="113" >毕节</option><option value="安顺" rel="112" >安顺</option><option value="贵阳" rel="111" >贵阳</option><option value="玉林" rel="110" >玉林</option><option value="梧州" rel="109" >梧州</option><option value="钦州" rel="108" >钦州</option><option value="柳州" rel="107" >柳州</option><option value="来宾" rel="106" >来宾</option><option value="贺州" rel="105" >贺州</option><option value="河池" rel="104" >河池</option><option value="贵港" rel="103" >贵港</option><option value="防城港" rel="102" >防城港</option><option value="崇左" rel="101" >崇左</option><option value="北海" rel="100" >北海</option><option value="百色" rel="99" >百色</option><option value="桂林" rel="98" >桂林</option><option value="南宁" rel="97" >南宁</option><option value="珠海" rel="96" >珠海</option><option value="中山" rel="95" >中山</option><option value="肇庆" rel="94" >肇庆</option><option value="湛江" rel="93" >湛江</option><option value="云浮" rel="92" >云浮</option><option value="阳江" rel="91" >阳江</option><option value="韶关" rel="90" >韶关</option><option value="汕尾" rel="89" >汕尾</option><option value="汕头" rel="88" >汕头</option><option value="清远" rel="87" >清远</option><option value="梅州" rel="86" >梅州</option><option value="茂名" rel="85" >茂名</option><option value="揭阳" rel="84" >揭阳</option><option value="江门" rel="83" >江门</option><option value="惠州" rel="82" >惠州</option><option value="河源" rel="81" >河源</option><option value="佛山" rel="80" >佛山</option><option value="东莞" rel="79" >东莞</option><option value="潮州" rel="78" >潮州</option><option value="深圳" rel="77" >深圳</option><option value="广州" rel="76" >广州</option><option value="张掖" rel="75" >张掖</option><option value="武威" rel="74" >武威</option><option value="天水" rel="73" >天水</option><option value="庆阳" rel="72" >庆阳</option><option value="平凉" rel="71" >平凉</option><option value="陇南" rel="70" >陇南</option><option value="临夏" rel="69" >临夏</option><option value="酒泉" rel="68" >酒泉</option><option value="金昌" rel="67" >金昌</option><option value="嘉峪关" rel="66" >嘉峪关</option><option value="甘南" rel="65" >甘南</option><option value="定西" rel="64" >定西</option><option value="白银" rel="63" >白银</option><option value="兰州" rel="62" >兰州</option><option value="漳州" rel="61" >漳州</option><option value="厦门" rel="60" >厦门</option><option value="三明" rel="59" >三明</option><option value="泉州" rel="58" >泉州</option><option value="莆田" rel="57" >莆田</option><option value="宁德" rel="56" >宁德</option><option value="南平" rel="55" >南平</option><option value="龙岩" rel="54" >龙岩</option><option value="福州" rel="53" >福州</option><option value="亳州" rel="51" >亳州</option><option value="宣城" rel="50" >宣城</option><option value="芜湖" rel="49" >芜湖</option><option value="铜陵" rel="48" >铜陵</option><option value="宿州" rel="47" >宿州</option><option value="马鞍山" rel="46" >马鞍山</option><option value="六安" rel="45" >六安</option><option value="黄山" rel="44" >黄山</option><option value="淮南" rel="43" >淮南</option><option value="淮北" rel="42" >淮北</option><option value="阜阳" rel="41" >阜阳</option><option value="滁州" rel="40" >滁州</option><option value="池州" rel="39" >池州</option><option value="巢湖" rel="38" >巢湖</option><option value="蚌埠" rel="37" >蚌埠</option><option value="安庆" rel="36" >安庆</option><option value="合肥" rel="2" >合肥</option>                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">职业</label>
                            <div class="col-md-9 form-inline" id="occupationSelect">
                                <input type="hidden" name="industry" id="industry" value=""/>
                                <input type="hidden" name="occupation" id="occupation" value=""/>
                                <select name="industry" title="行业" class="form-control">
                                    <option value="">--请选择--</option>
                                </select>
                                <select name="occupation" class="form-control">
                                    <option value="">--请选择--</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">身高体重: </label>
                            <div class="col-md-9 form-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control input-width-mini" name="height" value="" title="身高" placeholder="输入身高" validator="number|max(300)">
                                    <span class="input-group-addon">厘米</span>
                                </div>　
                                <div class="input-group">
                                    <input type="text" class="form-control input-width-mini" name="weight" value="" title="体重" placeholder="输入体重" validator="number|max(500)">
                                    <span class="input-group-addon">千克</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 avatar-control">
                        <div id="avatarUploader">
                            <img src="" style="width: 198px;height: 198px;">
                            <div id="avatarImage"></div>
                            <input type="hidden" name="avatarUrl" value="" title="头像" view-delegate="#avatarPickup" validator="required">
                        </div>
                        <a class="btn btn-default btn-block webuploader-container" type="button" id="avatarPickup" style="width: 200px;position: relative;">
                            <div class="webuploader-pick">更换头像</div>
                            <div id="" style="position: absolute; top: 5px; left: 9px; width: 180px; height: 18px; overflow: hidden; bottom: auto; right: auto;">
                                <input type="file"  name="file" class="uploader-avatar">
                            </div>
                        </a>
                        <small style="margin-left:55px;line-height:30px;">最佳尺寸200*200</small>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label class="col-md-2 control-label">擅长项目: <small>50个字以内</small></label>
                    <div class="col-md-9" style="margin-left: 10px;">
                        <input type="text" class="form-control" name="specialty" value=""
                               placeholder="擅长项目" validator="maxLength(150)" maxlength="50">
                        <span class="form-control-feedback" id="inputFeedbackOfSpecialty">0/50</span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">获奖荣誉: <small>最多20项</small></label>
                    <div class="col-md-10">
                        <div class="" id="awardContainer">
                                                    </div>
                        <button class="btn btn-white" type="button" id="addAwardButton">
                            <i class="icon-plus"> 添加一项</i>
                        </button>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">个人风采: <small>最多5张</small></label>
                    <div class="col-md-10" id="photoUploader">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-2 control-label">个人简介: <small>5000个字以内</small></label>
                    <div class="col-md-10">
                        <script id="editor" type="text/plain" style="max-width:100%;width:880px;height:350px;"></script>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="form-group">
                    <div class="col-m-4 col-sm-offset-2">
                        <button class="btn btn-success btn-lg" type="button" id="submit">保存内容</button>
                        <a href="/m.php?m=Admin&c=Figures&a=index" class="btn btn-white btn-lg">取消</a>
                    </div>
                </div>
            </form>
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
<script type="text/javascript" charset="utf-8" src="/public/common/jquery/jquery-2.1.1.min.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/admin/js/ajaxupload.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/common/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/public/common/ueditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/public/common/ueditor/lang/zh-cn/zh-cn.js"></script>
<!--时间-->
<script type="text/javascript" charset="utf-8" src="/public/common/date/laydate.js"></script>
<!--地域-->
<script type="text/javascript" charset="utf-8" src="/public/common/switch_city.js"></script>
<!--职业-->
<script type="text/javascript" charset="utf-8" src="/public/common/switch_jobs.js"></script>

<script>
    $(function(){
        laydate({
            elem:"#birthday",
            event:"focus",
            istime: true, format: 'YYYY-MM-DD',
        });
        var ue = UE.getEditor('editor');
        UE.getEditor('editor').ready(function(){
            this.setContent('');
        });


        //奖励荣誉
        award_bind_click();
        $('#addAwardButton').click(function(){
            if($('.award-item').length >= 20){
                alert('最多20项！');return false;
            }
            var content='<div class="award-item"> <input type="text" class="form-control" name="awards" title="获奖荣誉" placeholder="输入获奖荣誉" value=""> <span class="award_action" title="删除">×</span> </div>'
            $('#awardContainer').append(content);
            award_bind_click();
        });

        function award_bind_click(){
            $('.award_action').unbind('click');
            $('.award_action').bind('click',function(){
                $(this).parent().remove();
            });
        }
    })
</script>
</body>
</html>