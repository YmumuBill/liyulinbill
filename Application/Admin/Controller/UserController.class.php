<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-04-27
 * Time: 11:25
 */
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {
    //注册用户列表
    public function index(){
        //判断用户的细则权限
        $roleId = is_login();
        $is_show_user_info = 1;
        if(!check_auth("User/show_user_info",$roleId,3)){
            $is_show_user_info = 0;
        }
        $this->assign("showUserInfo",$is_show_user_info);
        $this->display();
    }

    public function get_lists(){
        $userLogic = A("User","Logic");
        $data = $userLogic->more_lists();
        $this->ajaxReturn($data);
    }
}