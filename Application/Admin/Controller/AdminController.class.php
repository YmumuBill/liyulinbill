<?php
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller {
    public function login(){
        $adm_session = session("adminInfo");
        if( $adm_session != null ){
            $this->redirect("Index/index");
        }
        $this->display();
    }

    public function do_login(){
        $adm_name = trim( I ( 'username'));
        $adm_password = trim( I('pwd') );
        $ajax = intval(I('ajax'));  //是否ajax提交

        if($adm_name == '') {
            echo json_encode(array("status"=>false , "info"=>"管理员帐号不能为空！"));
            exit;
        }
        if($adm_password == '') {
            echo json_encode(array("status"=>false , "info"=>"管理员密码不能为空！"));
            exit;
        }
        $adm_verify = trim( I('yzm') );
        $verify = new \Think\Verify();
        if( !$verify->check($adm_verify ,'') ) {
            echo json_encode(array("status"=>false , "info"=>"验证码错误！"));
            exit;
        }
        $condition['adm_name'] = $adm_name;
        $adm_data = M("Admin")->where( $condition )->find();
        if($adm_data) {
            if($adm_data['adm_pwd'] != md5($adm_password)) {
                echo json_encode(array("status"=>false , "info"=>"密码错误！"));
                exit;
            }
            else {
                if($adm_data['id']!=0){
                    //租户
                    $web = M("web")->where("tenant_id = ".$adm_data['role_id']." and is_effect = 1")->find();
                    if($web['url']==$_SERVER['SERVER_NAME']){
                        session("webInfo",$web);
                    }else{
                        unset($adm_data);
                        $this->error( "管理员域名错误" ,$ajax);die;
                    }
                }

                //登录成功
                $adm_data['adm_role_name'] = M("Role")->where(array("id"=>$adm_data['role_id']))->getField("name");
                session("adminInfo",$adm_data);
                save_log( "登录" , "登录成功" );
                M("Admin")->where("id = " . $adm_data["id"] )->save(array("login_time"=>time() , "login_ip"=> get_client_ip() ));
                $this->success("登录成功！",1);
            }
        }
        else
        {
            echo json_encode(array("status"=>false , "info"=>$adm_name . "管理员帐号错误"));
        }
    }

    public function do_logout(){
        save_log("退出","退出成功");
        unset($_SESSION['adminInfo']);
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
