<?php
/**
 * Created by PhpStorm.
 * User: liyulin
 * Date: 2017-03-24
 * Time: 17:21
 */
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends BaseController{
    public function index(){
        $condition = "is_delete = 0";
        $lists = D("Article")->getAll($condition);
        $this->assign("lists",$lists);
        $this->display();
    }

    public function add(){
        $this->display();
    }
}