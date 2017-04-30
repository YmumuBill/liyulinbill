<?php
namespace Admin\Controller;
use Think\Controller;
class RoleController extends BaseController {

    //权限设置
    public function conf(){
        $mFirst = D("AuthRule")->getAll("menutype != 0 or name = 'Upload'");
        $this->assign("mFirst",$mFirst);
        $this->display();
    }

    public function get_conf(){
        $roleLogic = A("Role","Logic");
        $data = $roleLogic->get_lists();
        $info = array(
            "draw"=>2,
            "recordsTotal"=> count( $data ),
            "recordsFiltered" => count( $data ),
            "data"=> $data,
        );
        $this->ajaxReturn($info);
    }

    public function save_conf(){
        $data = I("post.");
        $id = I("id",0);
        $res = $id==0?D("AuthRule")->addInfo($data):D("AuthRule")->editInfo($data);
        if($res !== false){
            show(200,"操作成功");
        }else{
            show(300,"操作失败");
        }
    }

    public function del_conf(){
        $id = I("id",0);
        if($id==0)show(300,"没有选择");
        $res = D("AuthRule")->delOne(array("id"=>$id));
        if($res !== false){
            show(200,"操作成功");
        }else{
            show(300,"操作失败");
        }
    }

    public function index(){
        $lists = M("AuthGroup")->where(array("is_delete"=>0,"status"=>1))->select();
        $this->assign("lists",$lists);
        $this->display();
    }

    public function group_role(){
        $id = I("id",0);
        $roleLogic = A("Role","Logic");
        $roleLogic->get_Rules($id);
        $this->display();
    }

    public function save_rule(){
        $data = I("post.");
        $id = I("id",0);
        $res = $id==0?D("AuthGroup")->addInfo($data):D("AuthGroup")->editInfo($data);
        if($res !== false){
            show(200,"操作成功");
        }else{
            show(300,"操作失败");
        }
    }


    //管理员列表
    public function admins(){
        $lists = M("Admin")->where("id > 1 and is_delete = 0")->select();

        foreach($lists as $k=>$v){
            $lists[$k]["department"] = M("AuthGroup")->where(array("id"=>$v["role_id"]))->field("title")->find()["title"];
        }
        $this->assign("lists",$lists);
        $this->display();
    }

    public function add_admin(){
        $lists = D("AuthGroup")->getAll(array("is_delete"=>0));
        $this->assign("lists",$lists);
        $this->display();
    }

    public function edit_admin(){
        $id = I("id");
        $info = M("Admin")->where(array("id"=>$id))->find();
        $this->assign("info" , $info );
        $lists = D("AuthGroup")->getAll(array("is_delete"=>0));
        foreach($lists as $k=>$v){
            if($v['id']==$info['role_id']){
                $lists[$k]['selected'] = 1;
                break;
            }
        }
        $this->assign("lists",$lists);
        $this->display();
    }

    public function save_admin(){
        $id = I("id",0);
        $data = I("post.");
        if($id == 0) {
            //新增
            $data["is_effect"] = 1;
            $data["is_delete"] = 0;
            $status = D("Admin")->addRow($data);
            save_log("新增管理员" . $data["name"] . "成功", $status);
            show(200,"新增成功！");
        }else{
            //编辑
            $status = D("Admin")->editRow($data);
            save_log("修改管理员" . $data["id"] ."的信息成功",$status);
            show(200,"修改成功！");
        }
    }


}
?>