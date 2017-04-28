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
        //系统默认
        $album_photo_count = D("AlbumPhoto")->getCount("album_id = 0 and is_delete = 0");
        $album_comment_count = D("AlbumComment")->getCount("album_id = 0 and is_delete = 0");
        $this->assign("ap_count",$album_photo_count);
        $this->assign("ac_count",$album_comment_count);

        $lists = D("Album")->getAll("is_delete = 0");
        if(count($lists)>0){
            foreach($lists as $k=>$v){
                $lists[$k]['create_time'] = date("Y-m-d",$v['create_time']);
                if($v['index_id']!=0){
                    $image = D("AlbumPhoto")->getNewField("id = ".$v['index_id'],"image_small");
                    $lists[$k]['index_image'] = $image;
                }
                $lists[$k]['photo_count'] = D("AlbumPhoto")->getCount("album_id = ".$v['id']." and is_delete = 0");
                $lists[$k]['comment_count'] = D("AlbumComment")->getCount("album_id = ".$v['id']." and is_delete = 0");
            }
        }
        $this->assign("lists",$lists);
        $this->display();
    }

    public function save(){
        $id = I("id",0);
        $name = I("name","");
        $is_comment = I("is_comment",0);
        if($id==0){//新增
            $res = D("Album")->addInfo(array("name"=>$name,"is_comment"=>$is_comment,"create_time"=>time()));
            $insert = true;
        }else{//编辑
            $res = D("Album")->saveInfo("id = $id and is_delete = 0",array("name"=>$name,"is_comment"=>$is_comment));
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
            $res = D("Album")->setDelStatus($id);
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