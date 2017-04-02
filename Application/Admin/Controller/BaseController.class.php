<?php
/**
 * Created by PhpStorm.
 * User: liyulin
 * Date: 2016/9/8
 * Time: 16:00
 */
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->checkAuth();
    }

    private function checkAuth(){
        //管理员信息
        $adm_session = session("adminInfo");
        if($adm_session == null ){
            $this->redirect("Admin/login");
        }

        $adm_name = $adm_session['adm_name'];
        $adm_id = $adm_session['id'];
        $ajax = intval($_REQUEST['ajax']);
        $this->assign("adminInfo",$adm_session);
        //网站信息
        $web_info = session("webInfo");
        if($web_info == null&&$adm_id!=1){
            if($adm_session['role_id']!= 0 ){
                $condition = "tenant_id = ".$adm_session['role_id']." and url = ".$_SERVER['SERVER_NAME']." and is_delete = 0 and is_effect = 1";
                $web_info = M("web")->where($condition)->find();
                session("webInfo",$web_info);
            }
        }
        if($adm_id == 1){
            //超级管理员
            $menu = array(
                array(
                    "url"=>U("index/index"),
                    "name"=>"首页" ,
                    "level" => 1 ,
                    "show" => 1 ,
                    "m"=>"Index",
                    "a"=>"index",
                    "iclass"=>""
                ) ,
                array(
                    "iclass"=>"",
                    "name"=>"权限管理",
                    "level"=>2 ,
                    "show"=>1 ,
                    "m"=>"Role" ,
                    "group"=>array(
                        array("name"=>"管理员分组","m"=>"Role","a"=>"index","show" => 1 ,),
                        array("name"=>"管理员列表","m"=>"Role","a"=>"admins","show" => 1 ,),
                    ),
                ) ,
                array(
                    "name"=>"系统日志",
                    "level"=>1 ,
                    "show"=>1 ,
                    "m"=>"Log",
                    "a"=>"Index" ,
                ),
            );
            foreach($menu as $k=>$v){
                if($v["level"] == 1){
                    if( $v["m"] == CONTROLLER_NAME ){
                        $menu[$k]["class"] = "active";
                    }
                }
                else{
                    if($v["m"] == CONTROLLER_NAME){
                        $menu[$k]["class"] = "on";
                        foreach($v["list"] as $k1=>$v1){
                            if( $v1["a"] == ACTION_NAME  ){
                                $menu[$k]["group"][$k1]["class"] = "active";
                            }
                        }
                    }
                }
            }
        }
        else {
            if (CONTROLLER_NAME == "Log") {
                if ($ajax == 1) {
                    echo json_encode(array("status" => 0, "info" => "没有权限访问"));
                    die;
                } else {
                    $this->error("没有权限访问", $ajax);
                }
            }
            /*先判断node节点 再判断group节点*/
            if ($adm_name != C("DEFAULT_ADMIN") && CONTROLLER_NAME != 'Index') {
                $sql = "select count(*) as c from " . C("DB_PREFIX") . "role_node as role_node left join " .
                    C("DB_PREFIX") . "role_module as role_module on role_module.id = role_node.module_id " .
                    " where role_node.action ='" . ACTION_NAME . "' and role_module.module = '" . CONTROLLER_NAME . "' " .
                    " and role_node.is_effect = 1 and role_node.is_delete = 0 and role_module.is_effect = 1 and role_module.is_delete = 0 ";
                $count = M()->query($sql);
                $count = $count[0]['c'];
                if ($count > 0) {
                    //有这个节点
                    $sql = "select count(*) as c from " . C("DB_PREFIX") . "role_node as role_node left join " .
                        C("DB_PREFIX") . "role_access as role_access on role_node.id=role_access.node_id left join " .
                        C("DB_PREFIX") . "role as role on role_access.role_id = role.id left join " .
                        C("DB_PREFIX") . "role_module as role_module on role_module.id = role_node.module_id left join " .
                        C("DB_PREFIX") . "admin as admin on admin.role_id = role.id " .
                        " where admin.id = " . $adm_id . " and role_node.action ='" . ACTION_NAME . "' and role_module.module = '" . CONTROLLER_NAME . "' " .
                        " and role_node.is_effect = 1 and role_node.is_delete = 0 and role_module.is_effect = 1 and role_module.is_delete = 0 and role.is_effect = 1 and role.is_delete = 0";

                    $count2 = M()->query($sql);
                    $count2 = $count2[0]['c'];
                    if ($count2 == 0) {
                        //节点授权不足，开始判断是否有模块授权
                        $module_sql = "select count(*) as c from " .
                            C("DB_PREFIX") . "role_access as role_access left join " .
                            C("DB_PREFIX") . "role as role on role_access.role_id = role.id left join " .
                            C("DB_PREFIX") . "role_module as role_module on role_module.id = role_access.module_id left join " .
                            C("DB_PREFIX") . "admin as admin on admin.role_id = role.id " .
                            " where admin.id = " . $adm_id . " and role_module.module = '" . CONTROLLER_NAME . "' " .
                            " and role_access.node_id = 0" .
                            " and role_module.is_effect = 1 and role_module.is_delete = 0 and role.is_effect = 1 and role.is_delete = 0";
                        $module_count = M()->query($module_sql);
                        $module_count = $module_count[0]['c'];
                        if ($module_count == 0) {
                            if ($ajax == 1) {
                                echo json_encode(array("status" => 0, "info" => "没有权限访问"));
                                die;
                            } else {
                                $this->error("没有权限访问", $ajax);
                            }
                        }
                    }
                }
            }


            $cache = S(array('type' => 'file', 'prefix' => 'menu', 'expire' => 3600));
            if ($cache->menu == null) {
                $RoleNav = M("RoleNav")->where("is_effect = 1 and is_delete = 0")->order("sort asc")->select();
                foreach ($RoleNav as $k => $v) {
                    $RoleGroup = M("RoleGroup")->where("nav_id = " . $v["id"] . " and  is_effect = 1 and is_delete = 0 ")->order("sort asc")->select();
                    foreach ($RoleGroup as $k1 => $v1) {
                        $sql = "select role_node.`action` as a,role_module.`module` as m,role_node.id as nid,role_node.name as name from " .
                            C("DB_PREFIX") . "role_node as role_node left join " .
                            C("DB_PREFIX") . "role_module as role_module on role_module.id = role_node.module_id " .
                            "where role_node.is_effect = 1 and role_node.is_delete = 0 and role_module.is_effect = 1 and role_module.is_delete = 0 and role_node.group_id = " . $v1['id'] . " order by role_node.id asc";
                        $nodes = M()->query($sql);
                        $RoleGroup[$k1]["nodes"] = $nodes;
                        if (count($nodes) == 1) {
                            $RoleGroup[$k1]["m"] = $nodes[0]["m"];
                            $RoleGroup[$k1]["a"] = $nodes[0]["a"];
                        }
                    }
                    $RoleNav[$k]["group"] = $RoleGroup;
                    if (count($RoleGroup) == 1) {
                        $RoleNav[$k]["m"] = $RoleGroup[0]["m"];
                        $RoleNav[$k]["a"] = $RoleGroup[0]["a"];
                    }

                }
                $cache->menu = $RoleNav;
            }
            $menu = $cache->menu;


            //获取admin用户所拥有的group_id 权限
            $gsql = "SELECT group_id FROM " . C("DB_PREFIX") . "admin as adm LEFT JOIN
							" . C("DB_PREFIX") . "role_access as access ON adm.role_id = access.role_id LEFT JOIN
							" . C("DB_PREFIX") . "role_node as node ON access.node_id = node.id
							WHERE adm.id = " . $adm_id . " GROUP BY group_id;";
            $group_arr = M()->query($gsql);
            foreach ($menu as $k => $v) {
                $menu[$k]['level'] = 1;//默认只有一级
                $is_show_nav = 0;
                foreach ($v["group"] as $k1 => $v1) {
                    foreach ($group_arr as $kg => $vg) {
                        if (intval($vg["group_id"]) == $v1["id"] || $v1["id"] == 1 || $adm_id == 1) {
                            $menu[$k]['level'] = count($v["group"]) == 1 ? 1 : 2;
                            $is_show_nav = 1;
                            $menu[$k]["group"][$k1]["show"] = 1;
                            if ($v1["m"] == CONTROLLER_NAME) {
                                $menu[$k]['class'] = "on";
                            }
                            if ($v1["a"] == ACTION_NAME) {
                                $menu[$k]["group"][$k1]["class"] = "active";
                            }
                            break;
                        }
                    }
                }
                if ($is_show_nav == 1 || $v['id'] == 1 || $adm_id == 1) {//首页和admin用户
                    $menu[$k]["show"] = 1;
                } else {
                    $menu[$k]["show"] = 0;
                }
            }
        }
        $this->assign("menu",$menu);
    }
}