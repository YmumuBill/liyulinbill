<?php
/**
 * Created by PhpStorm.
 * User: liyulin
 * Date: 2017-03-24
 * Time: 17:23
 */
namespace Admin\Controller;
use Think\Controller;
class AlbumController extends BaseController{
    public function index(){
        $check = A("Index","Logic");
        $check->check_version();
        $this->display();
    }

    public function lists(){

    }
}