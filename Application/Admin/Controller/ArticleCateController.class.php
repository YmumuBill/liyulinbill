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

    public function add_cate(){

    }
}