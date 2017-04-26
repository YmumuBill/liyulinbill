<?php
/**
 * Created by PhpStorm.
 * User: liyulin
 * Date: 2016/9/8
 * Time: 16:00
 */
namespace Admin\Controller;
use Think\Auth;
use Think\Controller;
class BaseController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->checkAuth();
        $this->getLeftMenu();
    }
    /*认证权限*/
    private function checkAuth(){
        $roleId = is_login();
        //判断登录
        if (!$roleId) {
            $this->redirect('Admin/login');
        }
        $admin_info = session("adminInfo");
        $this->assign("adminInfo",$admin_info);
        $web_info = session("webInfo");
        //判断网站信息
        if($web_info == null&&$roleId!=C("SUPER_ADMIN_YH")){
            $condition = "tenant_id = ".$roleId." and url = ".$_SERVER['SERVER_NAME']." and is_delete = 0 and is_effect = 1";
            $web_info = M("web")->where($condition)->find();
            session("webInfo",$web_info);
        }

        //判断用户权限
        if($roleId!=C("SUPER_ADMIN_YH")){
            $ajax = intval($_REQUEST['ajax']);
            //异步请求的类型是2
            $check_type = $ajax==1?2:1;
            if(!check_auth(CONTROLLER_NAME.'/'.ACTION_NAME,$roleId,$check_type)){
                //没有权限
                if ($ajax == 1) {
                    echo show(300,'没有权限访问');
                    die;
                } else {
                    $this->error("没有权限访问",U('Index/index'),$ajax);
                }
            }
        }
    }
    /*获取侧边栏*/
    private function getLeftMenu(){
        $roleId = is_login();
        if($roleId==C("SUPER_ADMIN_YH")){
            //超级管理员
            $menu = array(
                array(
                    "iclass"=>"",
                    "url"=>U("index/index"),
                    "title"=>"首页" ,
                    "name"=>"Index/index",
                    "level" => 1 ,
                    "iclass"=>""
                ) ,
                array(
                    "iclass"=>"",
                    "title"=>"权限管理",
                    "level"=>2 ,
                    "name"=>"Role",
                    "group"=>array(
                        array("title"=>"权限设置","url"=>U("Role/conf"),"name"=>"Role/conf"),
                        array("title"=>"管理员分组","url"=>U("Role/index"),"name"=>"Role/index"),
                        array("title"=>"管理员列表","url"=>U("Role/admins"),"name"=>"Role/admins"),
                    ),
                ) ,
                array(
                    "iclass"=>"",
                    "title"=>"系统日志",
                    "level"=>1 ,
                    "name"=>"Log/index",
                    "url"=>U("Log/Index"),
                ),
            );
        }else{
            $rules = M("AuthGroup")->where(array("id"=>$roleId,"status"=>1))->getField("rules");
            $menuLists = D("AuthRule")->getMenu("id in (".$rules.") and menutype != 0");
            $menu = \Common\Lib\ArrayTree::list2tree($menuLists,0,"id","pid","group");
            foreach($menu as $k=>$v){
                $menu[$k]['url'] = U($v['name']);
                if(!empty($v['group'])){
                    $menu[$k]['level'] = 2;
                    foreach($v['group'] as $k2=>$v2){
                        $menu[$k]['group'][$k2]['url'] = U($v2['name']);
                    }
                }else{
                    $menu[$k]['level'] = 1;
                }
            }
        }

        foreach($menu as $k=>$v){
            if($v["level"] == 1){
                if( $v["name"] == (CONTROLLER_NAME."/".ACTION_NAME) ){
                    $menu[$k]["class"] = "active";
                }
            }
            else{
                if($v["name"] == CONTROLLER_NAME||($v["name"] == "Article"&&CONTROLLER_NAME=="ArticleCate"))
                {
                    $menu[$k]["class"] = "on";
                    foreach($v["group"] as $k1=>$v1){
                        if( $v1["name"] == (CONTROLLER_NAME."/".ACTION_NAME) ){
                            $menu[$k]["group"][$k1]["class"] = "active";
                        }
                    }
                }
            }
        }
        $this->assign("menu",$menu);
    }



    /* 公共状态修改 */
    public function dostatus(){
        $id = I('get.id', 0, 'intval');
        $status = I('get.status', 0, 'intval');
        $new_status = $status == 0 ? 1 : 0;
        $result = $this->model->where('id = '.$id)->save(array('status' => $new_status));

        if (!$result) return show(300, '操作失败');
        return show(200, '操作成功');
    }

    /* 公共删除方法 */
    public function del(){
        $id = I('get.id', 0, 'intval');
        if ($id == 0) return show(300, '参数类型错误');
        $result = $this->model->delete($id);
        if (!$result) return show(300, '删除失败');
        return show(200, '删除成功');
    }

    /* 公共编辑方法 */
    public function edit(){
        $id = I('get.id', 0, 'intval');
        if ($id == 0) return show(300, '参数类型错误');
        $info = $this->model->where('id = '.$id)->find();
        if (empty($info)) return show(300, '获取数据失败');
        $this->assign('info', $info);
        $this->display();
    }
}