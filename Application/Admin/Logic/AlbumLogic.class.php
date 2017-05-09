<?php
namespace Admin\Logic;
use Think\Controller;
class AlbumLogic extends Controller{
    public function get_index(){
        $lists = D("Album")->getAll("is_delete = 0");
        if(count($lists)>0){
            foreach($lists as $k=>$v){
                $lists[$k]['create_time'] = date("Y-m-d",$v['create_time']);
                if($v['index_id']!=0){
                    $image = D("Photo")->getNewField("id = ".$v['index_id'],"image_small");
                    $lists[$k]['index_image'] = $image;
                }
                $lists[$k]['photo_count'] = D("Photo")->getCount("album_id = ".$v['id']." and is_delete = 0");
                $lists[$k]['comment_count'] = D("AlbumComment")->getCount("album_id = ".$v['id']." and is_delete = 0");
            }
        }
        $this->assign("lists",$lists);
    }

    public function get_albums(){
        $lists = D("Album")->mmFields("is_delete = 0 ","name,id");
        $this->assign("albums",$lists);
    }
}