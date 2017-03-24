<?php
/**
 * Created by PhpStorm.
 * User: liyulin
 * Date: 2017-03-24
 * Time: 17:25
 */
namespace Admin\Controller;
use Think\Controller;
class WebController extends BaseController{
    public function index(){
        $check = A("Index","Logic");
        $check->check_version();
        $this->display();
    }
}