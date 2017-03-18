<?php
//日志
function save_log( $type , $content ,$backups=0){
    $adm_session =session("adminInfo");
    if($adm_session['role_id']==0) {
        $adm_role = "超级管理员";
    }else {
        $adm_role = M("Role")->where("id = ".$adm_session['role_id'])->getField("name");
    }
    $log_data = array(
        "user_id"=>$adm_session["id"],
        "ip" =>get_client_ip(),
        "operation"=>$type,
        "description"=>$content,
        "create_time"=>time(),
        "user_name"=>$adm_session['name'],
        "user_group"=>$adm_role,
        "backups_id"=>$backups,
    );
    M("AdminLog")->add($log_data);
}
//备份日志
function save_backups($ids,$content){
    $adm_session =session("zbf_info");
    if($adm_session['role_id']==0) {
        $adm_role = "超级管理员";
    }else {
        $adm_role = M("Role")->where("id = ".$adm_session['role_id'])->getField("name");
    }
    $log_data = array(
        "ip" =>get_client_ip(),
        "description"=>$content,
        "create_time"=>time(),
        "user_name"=>$adm_session['name'],
        "user_group"=>$adm_role,
    );
    $res = M("backups")->add($log_data);
    return $res;
}

//测试函数
function lyl_dump($content){
    header("Content-type:text/html;charset=utf-8");
    echo '<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />';
    echo "<pre>";
    var_dump($content);
    echo "<pre/>";
    die;
}