<?php
//日志
function save_log( $type , $content ,$backups=0){
    $adm_session =session("adminInfo");
    if($adm_session['role_id']==627520) {
        $adm_role = "超级管理员";
    }else {
        $adm_role = D("AuthGroup")->getNewField(array("id"=>$adm_session['role_id']),"title");
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
        $adm_role = D("AuthGroup")->getNewField(array("id"=>$adm_session['role_id']),"title");
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
/**
 * 查询用户是否登录
 * @return int  0-未登录，大于0-登录id
 */
function is_login(){
    $uid = session(C('AUTH_KEY'));
    return $uid > 0 ? $uid : 0;
}


//检测Auth中允许访问的节点
function check_auth($rule, $uid=null,$type=1){
    //不需要检测的权限节点
    if (in_array($rule, C('NO_CHECK_NODES'))) {
        return true;
    }
    if (is_null($uid)) $uid = is_login();
    static $Auth = null;
    if (!$Auth) {
        $Auth = new \Think\Auth();
    }
    if(!$Auth->check($rule, $uid, $type)){
        return false;
    }
    return true;
}


// 检测输入的验证码是否正确，$code为用户输入的验证码字符串
function check_verify($code, $id = ''){
    $verify = new \Think\Verify();
    return $verify->check($code, $id);
}


/***
 * 获取文本中首张图片地址
 **/
function getFirstPic($content){
    if(preg_match_all("/(src)=([\"|']?)([^ \"'>]+\.(gif|jpg|jpeg|bmp|png))\\2/i", $content, $matches)){
        $str=$matches[3][0];
        if(preg_match('/\/ueditor\/php\/upload\/image/',$str)){
            return $str1=substr($str,6);
        }
    }
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