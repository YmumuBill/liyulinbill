<?php
include 'Mobile_Detect.php';
$detect = new Mobile_Detect();
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);
define('APP_PATH','./Application/') ;
if($detect->isMobile()&&!$detect->isTablet()){
    define('BIND_MODULE','Mobile') ;
}else{
    define('BIND_MODULE','Home') ;
}
// 定义应用目录
require './ThinkPHP/ThinkPHP.php';