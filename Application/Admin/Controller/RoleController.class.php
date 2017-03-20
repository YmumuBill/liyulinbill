<?php
namespace Admin\Controller;
use Think\Controller;
class RoleController extends BaseController {
    /* 空操作，用于输出404页面 */
    public function _empty(){
        header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码
        header('Status: 404 Not Found');
        $this->display('Public:404');
    }

    public function index(){
        $lists = M("Role")->where(array("is_effect"=>1,"is_delete"=>0))->select();
        foreach($lists as $k=>$v){
            $lists[$k]["create_time"] = date("Y-m-d H:i:s" , $v["create_time"]);
            $lists[$k]["update_time"] = date("Y-m-d H:i:s" , $v["update_time"]);
        }
        $this->assign("lists",$lists);
        $this->display();
    }
    //添加管理员组别
    public function add(){
        $RoleNav = M("RoleNav")->where("is_effect=1 and is_delete = 0 and id > 1 ")->order("sort asc")->select();
        foreach($RoleNav as $k=>$v){
            $group_condition = "nav_id = ".$v['id']." and  is_effect = 1 and is_delete = 0";
//            $RoleGroup = D("RoleGroup")->getAll( array("is_effect" => 1, "is_delete"=>0 , "nav_id" => $v["id"]) , "", "sort asc");
            $RoleGroup = M("RoleGroup")->where($group_condition)->order("sort asc")->select();
            foreach($RoleGroup as $k1=>$v1){
                $module_id = M("RoleNode")->where(array("is_effect"=>1,"is_delete"=>0,"group_id"=>$v1["id"]))->select()[0]["module_id"];
                $nodes = M("RoleNode")->where(array("module_id"=>$module_id))->order("sort")->select();
                $RoleGroup[$k1]["nodes"] = $nodes;
            }
            $RoleNav[$k]["group"] = $RoleGroup;
        }
        $this->assign("lists",$RoleNav);
        $this->display("add_role");
    }

    public function do_add(){
        $name = I("name");
        $count = M("Role")->where( array("name"=>$name , "is_effect"=>1 , "is_delete"=>0) )->count();
        if( $count >= 1 ){
            echo json_encode( array("status"=>0 , "info"=> $name . "已存在！") );
            exit;
        }
        $id = M("Role")->add(array("name"=>$name , "is_effect"=>1 , "is_delete"=>0 , "create_time" => time() , "update_time" =>time() ));
        $roles = explode(";",I("roles"));
        foreach($roles as $k=>$v){
            $info = M("RoleNode")->where(array("id"=>$v))->find();
            M("RoleAccess")->add(array("role_id"=>$id,"node_id"=>$v,"module_id"=>$info["module_id"]));
        }
        save_log("新增管理员分组" . $name ."成功",1);
        echo  json_encode( array("status"=>1 , "info"=> $name . "新建成功！") );
    }

    public function edit(){
        $id = I("id");
        $role = M("Role")->where(array("id"=>$id))->find();
        $RoleNav = M("RoleNav")->where("is_effect=1 and is_delete = 0 and id > 1 ")->order("sort asc")->select();
        foreach($RoleNav as $k=>$v){
            $nav_checked = true;
            $group_condition = "nav_id = ".$v['id']." and  is_effect = 1 and is_delete = 0";
//            $RoleGroup = D("RoleGroup")->getAll( array("is_effect" => 1, "is_delete"=>0 , "nav_id" => $v["id"]) , "", "sort asc");
            $RoleGroup = M("RoleGroup")->where($group_condition)->order("sort asc")->select();
            foreach($RoleGroup as $k1=>$v1){
                $group_checked = true;
                $module_id = M("RoleNode")->where(array("is_effect"=>1,"is_delete"=>0,"group_id"=>$v1["id"]))->select()[0]["module_id"];
                $nodes = M("RoleNode")->where(array("module_id"=>$module_id))->order("sort")->select();
                foreach($nodes as $k2=>$v2){
                    $count = M("RoleAccess")->where(array( "role_id"=>$id , "node_id"=>$v2["id"] ))->count();
                    if( $count == 0 ){
                        $nav_checked = false;
                        $group_checked = false;
                        $nodes[$k2]["checked"] = false;
                    }
                    else{
                        $nodes[$k2]["checked"] = true;
                    }
                }
                $RoleGroup[$k1]["checked"] = $group_checked;
                $RoleGroup[$k1]["nodes"] = $nodes;
            }
            $RoleNav[$k]["group"] = $RoleGroup;
            $RoleNav[$k]["checked"] = $nav_checked;
        }
        $this->assign("role",$role);
        $this->assign("lists",$RoleNav);
        $this->display("edit_role");
    }

    public function  do_edit(){
        $id = I("id");
        $name = I("name");
        $count = M("Role")->where( "name = '" . $name . "' and is_effect = 1 and is_delete = 0 and id != " . $id )->count();
        if( $count >= 1 ){
            echo json_encode( array("status"=>0 , "info"=> $name . "已存在！") );
            exit;
        }
        M("Role")->save(array("id" => $id  ,"name"=>$name , "update_time" =>time()) );
        $roles = explode(";",I("roles"));
        M("RoleAccess")->where("node_id not in (" . implode( "," , $roles ) . ") and role_id = " . $id)->delete();
        foreach( $roles as $k=>$v ){
            if( M("RoleAccess")->where(array("role_id"=>$id,"node_id"=>$v))->count() == 0 ){
                $info = M("RoleNode")->where(array("id"=>$v))->find();
                M("RoleAccess")->add(array("role_id"=>$id,"node_id"=>$v,"module_id"=>$info["module_id"]));
            }
        }
        save_log("修改管理员分组：" . $name ."的信息成功",1);
        echo json_encode( array("status"=>1 , "info"=>  "修改成功！") );
    }

    //管理员列表
    public function admins(){
        $lists = M("Admin")->where("id > 1 and is_delete = 0")->select();

        foreach($lists as $k=>$v){
            $lists[$k]["department"] = M("Role")->where(array("id"=>$v["role_id"]))->field("name")->find()["name"];
        }
        $this->assign("lists",$lists);
        $this->display();
    }

    public function add_admin(){
        $lists = M("Role")->where(array("is_effect"=>1,"is_delete"=>0))->select();
        $this->assign("lists",$lists);
        $this->display();
    }

    public function edit_admin(){
        $id = I("id");
        $info = M("Admin")->where(array("id"=>$id))->find();
        $this->assign("info" , $info );
        $lists = M("Role")->where(array("is_effect"=>1,"is_delete"=>0))->select();
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
            $count = M("Admin")->where(array("adm_name" => $data["adm_name"], "is_effect" => 1, "is_delete" => 0))->count();
            if ($count >= 1) {
                echo json_encode(array("status" => 0, "info" => "登录名已存在！"));
                exit;
            }
            $data["is_effect"] = 1;
            $data["is_delete"] = 0;
            $data["adm_pwd"] = md5($data["adm_password"]);
            $status = M("Admin")->add($data);
            save_log("新增管理员" . $data["name"] . "成功", $status);
            echo json_encode(array("status" => 1, "info" => "新增成功！"));
        }else{
            //编辑
            if( $data["adm_password"] != "" ){
                $data["adm_pwd"] = md5($data["adm_password"]);
            }
            $data['update_time'] = time();
            $status = M("Admin")->save($data);
            save_log("修改管理员" . $data["id"] ."的信息成功",$status);
            echo json_encode(array("status" => 1, "info" => "修改成功！"));
        }
    }


}
?>