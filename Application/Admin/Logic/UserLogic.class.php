<?php
namespace Admin\Logic;
use Think\Controller;
class UserLogic extends Controller{
    public function more_lists(){
        //dataTable 数据
        $aoData = I("aoData","");
        if(empty($aoData)){
            echo show(300,"数据传输失败");
        }
        //查询条件
        $name = I("name","");
        //限制
        $start = $aoData['iDisplayStart'];
        $length = $aoData['iDisplayLength'];
        $limit = $start.",".$length;

        $totalCount = D("User")->getCount();
        $lists = D("User")->getAll("is_delete = 0",$limit);
        //数据封装 权限管理
        $data = array();
        foreach($lists as $k=>$v){
            $info = array(
                "data1"=>$v['id'],
                "data2"=>$v['nickname'],
                "data3"=>$v['name'],
                "data4"=>$v['sex']==0?"男":"女",
                "data5"=>$v['cell'],
                "data6"=>$v['email'],
                "data7"=>$v['card_num'],
                "data8"=>date("Y-m-d H:i",$v['create_time']),
                "data9"=>"<a href='#' target='_blank' class='btn btn-white'><i class='icon-edit'></i>编辑</a>
                                <button class='btn btn-danger mm-del' data-id='".$v['id']."' action='1'>
                                <i class='icon-trash'></i>黑名单</button>",
            );
            array_push($data,$info);
        }

        $infos = array(
            "sEcho"=>intval($aoData['sEcho'])+1,
            "iTotalRecords"=> $totalCount,
            "iTotalDisplayRecords" => $totalCount,
            "data"=> $data,
        );

        return $infos;
    }
}