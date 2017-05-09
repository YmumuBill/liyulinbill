<?php
/**
 * Created by PhpStorm.
 * User: liyulin
 * Date: 2017-03-24
 * Time: 17:23
 */
namespace Admin\Controller;
use Think\Controller;
class PhotoController extends BaseController{
    protected $model;
    protected $logic;
    public function __construct(){
        parent::__construct();
        $this->model = D('Photo');
        $this->logic = A("Photo","Logic");
    }

    public function index(){
        $albumLogic = A("Album","Logic");
        $albumLogic->get_albums();
        $this->logic->get_photos();
        $this->display();
    }

    public function add_qiniu(){
        $album = I("album",0);
        if($album==0){
            $this->redirect("Album/index");
        }
        $this->assign("domain",C("QINIU_DOMAIN"));
        $this->assign("Album",$album);
        $this->assign("webId",$_SESSION['webInfo']['id']);
        $qiniu = A("Qiniu","Logic");
        $qiniu->get_token();
        $this->display();
    }

    public function save_qiniu(){
        $this->logic->save();
    }

    public function save_info(){
        $this->logic->edit_photo();
    }

    public function del(){
        $ids = I("id",0);
        if($ids==0)echo show(300,"id错误");
        $res = $this->model->where("id in ($ids)")->setField("is_delete",1);
        if($res !== false){
            echo show(200,"删除成功！");
        }else{
            echo show(300,"删除失败！");
        }
    }
}