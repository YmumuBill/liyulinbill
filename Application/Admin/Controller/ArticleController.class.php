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
        $check = A("Index","Logic");
        $check->check_version();
        $this->display();
    }
}