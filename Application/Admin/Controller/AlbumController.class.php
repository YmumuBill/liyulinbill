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
    protected $model;
    protected $logic;
    public function __construct(){
        parent::__construct();
        $this->model = D('Album');
        $this->logic = A("Album","Logic");
    }

    public function index(){
        $this->logic->get_index();
        $this->display();
    }

    public function save(){
        $id = I("id",0);
        $name = I("name","");
        $is_comment = I("is_comment",0);
        if($id==0){//新增
            $res = $this->model->addInfo(array("name"=>$name,"is_comment"=>$is_comment,"create_time"=>time()));
            $insert = true;
        }else{//编辑
            $res = $this->model->saveInfo("id = $id and is_delete = 0",array("name"=>$name,"is_comment"=>$is_comment));
            $insert = false;
        }
        if($res !== false){
            echo show(200,"操作成功！",array("insert"=>$insert));
        }else{
            echo show(300,"操作失败！",array("insert"=>$insert));
        }
    }

    public function del(){
        $id = I("id",0);
        if($id==0){
            echo show(300,"id错误");
        }else{
            $res = $this->model->setDelStatus($id);
            if($res !== false){
                echo show(200,"删除成功!");
            }else{
                echo show(300,"删除失败！");
            }
        }
    }

    public function lists(){

    }
}