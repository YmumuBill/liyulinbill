<?php
namespace Admin\Logic;
use Common\Lib\ArrayTree;
use Think\Controller;
class RoleLogic extends Controller
{
    //获取auth rule 列表
    public function get_lists(){
        $lists = D("AuthRule")->getAll();
        $data = array();
        foreach($lists as $k=>$v){
            $data7 = "<button class='btn btn-white' action='edit' data-id='".$v['id']."'><i class='icon-edit'></i>  编辑</button>
                       <button class='btn btn-danger' action='del' data-id='".$v['id']."'><i class='icon-trash'></i>  删除</button>";
            $type = "无";
            switch($v['type']){
                case 0:$type = "无";break;
                case 1:$type = "url";break;
                case 2:$type = "异步请求";break;
                case 3:$type = "细则权限";break;
                default:
                    break;
            }
            $info = array(
                'data1'=>$v['id'],
                'data2'=>$v['pid'],
                'data3'=>$v['menutype'],
                'data4'=>$v['name'],
                'data5'=>$v['title'],
                'data6'=>$type,
                'data7'=>$data7
            );
            array_push($data,$info);
        }
        return $data;
    }

    public function get_Rules($id=0){
        $ruleList = D("AuthRule")->getAll(array("status"=>1));
        if($id!=0){
            //编辑
            $group = M("AuthGroup")->where(array("id"=>$id))->find();
            $rulesArr = explode(',',$group['rules']);
            foreach($ruleList as $k=>$v){
                if(in_array($v['id'],$rulesArr)){
                    $ruleList[$k]['checked'] = 1;
                }
            }
            $this->assign("groupInfo",$group);
        }
        $lists = \Common\Lib\ArrayTree::list2tree($ruleList);
        $this->assign("lists",$lists);
    }
}