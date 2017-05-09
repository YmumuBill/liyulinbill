<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-05-08
 * Time: 14:14
 */
namespace Admin\Logic;
use Think\Controller;
class PhotoLogic extends Controller{

    public function get_photos(){
        $id = intval(I("id",0));
        $this->assign("album_type",$id);
        $kw = I("kw","");
        $this->assign("search_kw",$kw);
        $page = intval(I("p",1));
        $page = $page==0?1:$page;
        $limit = (($page-1)*20).",20";
        $order = "create_time desc";
        $condition = "is_delete = 0";
        //全部相册0
        if($id != 0){
            $condition .= " and album_id = ".$id;
        }
        if($kw != ""){
            $condition .=  " and name like ('%$kw%') ";
        }
        $lists = D("Photo")->getAll($condition,$limit,$order);
        $lists_count = D("Photo")->getCount($condition);
        $this->assign("lists",$lists);
        $pages = new \Vendor\Page\Page($lists_count,20);
        $p = $pages->show();
        $this->assign("pages",$p);
    }

    public function save(){
        $data = I("post.");
        $admin_info = session("adminInfo");
        $data['create_time'] = time();
        $data['user_id'] = $admin_info['id'];
        $data['user_name'] = $admin_info['name'];
        $data['image'] = $data['domain'].$data['key'];
        $data['image_small'] = $data['domain'].$data['key']."?imageView2/2/w/240";
        $res = D("Photo")->addInfo($data);
        if($res !== false){
            echo show(200,"上传成功！");
        }else{
            echo show(300,"数据入库失败".$data['key']);
        }
    }

    public function edit_photo(){
        $action = I("action");
        $id = I("id");
        $condition = "id = ".$id." and is_delete = 0";
        $res = false;
        //edit 编辑  ， index 设置为封面，recommend 推荐改变
        switch ($action){
            case "edit":
                $data['album_id'] = intval(I("album_id"));
                $data['name'] = I("name");
                $res =D("Photo")->saveInfo($condition,$data);
                break;
            case "index":
                $album = intval(I("album_id"));
                $res = D("Album")->where("id = $album and is_delete = 0")->setField("index_id",$id);
                break;
            case "recommend":
                $rvalue = intval(I("recommend"));
                $res = D("Photo")->where($condition)->setField("is_recommend",$rvalue);
                break;
            default:
                echo show(300,"操作类型错误！");
                break;
        }
        if($res !== false){
            echo show(200,"操作成功");
        }else{
            echo show(300,"操作失败");
        }
    }
}