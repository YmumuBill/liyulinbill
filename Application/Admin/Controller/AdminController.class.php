<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function login(){
        if(IS_POST){
            $username = I('post.adm_name', '', 'trim');
            $password = I('post.adm_pwd', '', 'trim');
            $captcha  = I('post.yzm', '', 'trim');
            if (!$username || !$password) return show(300, '用户名或密码不能为空！');

            $verify = new \Think\Verify();
            if($verify->check($captcha, 1))return show(300, '验证码错误！');
            $result = D('Admin')->login($username, $password);
            //记录行为
            $msg = '登录成功';
            save_log( "登录" , $msg );
            return show(200, '登录成功', false, array('url' => U('Index/index')));
        }
        else{
            if (is_login()) {
                $this->redirect('Index/index');
            } else {
                $this->display();
            }
        }
    }


    public function logout(){
        save_log("退出","退出成功");
        session(null);
        $this->redirect("Admin/login");
    }

    public function edit_info(){
        $adm_session = session("adminInfo");
        $this->assign("info",$adm_session);
        $this->display();
    }

    public function do_edit_info(){
        $data = I("post.");
        $count = M("Admin")->where( array( "adm_name"=>$data["adm_name"], "is_effect"=>1, "is_delete"=>0,"id"=>array("neq",$data["id"]) ) )->count();
        if( $count >= 1 ){
            echo json_encode(array("status"=>0 , "info"=>"登录名已存在！"));
            exit;
        }
        $info = array(
            "id"=>$data["id"],
            "adm_name"=>$data["adm_name"],
            "name"=>$data["name"],
            "update_time"=>time(),
        );
        if( $data["adm_password"] != "" ){
            $info["adm_pwd"] = md5($data["adm_password"]);
        }
        $status = M("Admin")->save($info);
        if($status){
            save_log("修改管理员","修改管理员" . $data["adm_name"] ."的信息成功");
        }
        if($data["adm_password"]!= ""){
            echo json_encode(array("status"=>1 , "info"=>"修改成功！", "change"=>1));
        }else{
            echo json_encode(array("status"=>1 , "info"=>"修改成功！"));
        }
    }

    //生成验证码
    public function verify(){
        $Verify =     new \Think\Verify();
        $Verify->fontSize = 16;
        $Verify->imageW = 120;
        $Verify->imageH = 34;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->useCurve = false;
        $Verify->codeSet = "0123456789";
        $Verify->entry();
    }
}
