<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-05-09
 * Time: 9:41
 */
namespace Admin\Logic;
use Think\Controller;
class VideoLogic extends Controller{

    public function get_videos(){
        $kw = I("kw","");
        $this->assign("search_kw",$kw);
        $page = intval(I("p",1));
        $page = $page==0?1:$page;
        $limit = (($page-1)*20).",20";
        $order = "create_time desc";
        $condition = "is_delete = 0";
        if($kw != ""){
            $condition .=  " and name like ('%$kw%') ";
        }
        $lists = D("Video")->getAll($condition,$limit,$order);
        $lists_count = D("Video")->getCount($condition);
        $this->assign("lists",$lists);
        $pages = new \Vendor\Page\Page($lists_count,20);
        $p = $pages->show();
        $this->assign("pages",$p);
    }


    public function save(){
        $data = I("post.");
        $admin_info = session("adminInfo");
        $data['user_id'] = $admin_info['id'];
        $data['user_name'] = $admin_info['name'];
        $data['create_time'] = time();
        $data['source'] = $data['domain'].$data['key'];
        $res = D("Video")->addInfo($data);
        if($res !== false){
            echo show(200,"上传成功！");
        }else{
            echo show(300,"数据入库失败".$data['key']);
        }
    }

    public function edit_video(){
        $action = I("action");
        $id = I("id");
        $condition = "id = ".$id." and is_delete = 0";
        $res = false;
        //edit 编辑  ， index 设置为封面，recommend 推荐改变
        switch ($action){
            case "save":
                $data['name'] = I("name");
                $data['description'] = htmlspecialchars_decode(I("description"));
                $data['images'] = I("images");
                $res =D("Video")->saveInfo($condition,$data);
                break;
            case "recommend":
                $rvalue = intval(I("recommend"));
                $res = D("Video")->where($condition)->setField("is_recommend",$rvalue);
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