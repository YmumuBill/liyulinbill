<?php
/**
 * Created by PhpStorm.
 * User: liyulin
 * Date: 2017-03-24
 * Time: 17:22
 */
namespace Admin\Controller;
use Think\Controller;
class ArticleCateController extends BaseController{
    public function index(){
        $this->display();
    }

    public function get_lists(){
        $cateLogic = A("ArticleCate","Logic");
        $data = $cateLogic->get_lists();
        $info = array(
            "draw"=>2,
            "recordsTotal"=> count( $data ),
            "recordsFiltered" => count( $data ),
            "data"=> $data,
        );
        $this->ajaxReturn($info);
    }

    public function save_cate(){
        $name = I("name");
        $id = I("id",0);
        $cateLogic = A("ArticleCate","Logic");
        $res = $id==0?$cateLogic->add_cate($name):$cateLogic->edit_cate($name,$id);
        if($res !== false){
            show(200,"修改成功",false,array("contentId"=>$res,"contentName"=>$name));
        }else{
            show(300,"操作失败");
        }
    }

    public function del_cate(){
        $id=I("id",0);
        if($id==0){
            $this->ajaxReturn(array("status"=>0));
        }else{
            $res = D("ArticleType")->delOne("id = ".$id);
            $this->ajaxReturn(array("status"=>1));
        }
    }
}