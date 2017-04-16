<?php
namespace Admin\Logic;
use Think\Controller;
class ArticleCateLogic extends Controller
{
    //获取分类列表
    public function get_lists(){
        $cates = D("ArticleType")->getAll();
        $data = array();
        foreach($cates as $k=>$v){
            $data5 = "<button class='btn btn-white' action='edit' data-id='".$v['id']."'><i class='icon-edit'></i>  编辑</button>
                       <button class='btn btn-danger' action='del' data-id='".$v['id']."'><i class='icon-trash'></i>  删除</button>";
            $info = array(
                'data1'=>$v['id'],
                'data2'=>$v['name'],
                'data3'=>D("ArticleCate")->getCount("type_id = ".$v['id']),
                'data4'=>date('Y-m-d H:i',$v['create_time']),
                'data5'=>$data5
            );
            array_push($data,$info);
        }
        return $data;
    }

    public function add_cate($name = ""){
        if($name=="")return false;
        $data['name'] = $name;
        $data['create_time'] = time();
        $res = D("ArticleType")->addInfo($data);
        return $res;
    }

    public function edit_cate($name="",$id=""){
        if($name==""||$id=="")return false;
        $data['name'] = $name;
        $data['update_time'] = time();
        $res = D("ArticleType")->saveInfo("id = ".$id,$data);
        return $res;
    }
}