<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController{
    public function index(){
        $check = A("Index","Logic");
        $check->check_version();
        $this->display();
    }
}