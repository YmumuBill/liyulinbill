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
        $condition = "is_delete = 0";
        $lists = D("Article")->getAll($condition);
        $this->assign("lists",$lists);
        $this->display();
    }

    public function add(){
        $id = I("id",0);
        $article = A("Article","Logic");
        if($id==0){
            //新增页面
            $article->show_add();
        }else{
            //编辑页面
            $article->show_edit($id);
        }

        $this->display();
    }

    public function save(){
        $id = I("id",0);
        $data = I("post.");
        $data['content'] = htmlspecialchars_decode($data['content']);
        $data['file'] = htmlspecialchars_decode(I("file"));
        if($data['thumb_image']==""){
            $data['thumb_image'] = getFirstPic($data['content']);
            if($data['thumb_image']==""){
                $data['thumb_image'] = " ";
            }
        }
        $type_ids = I("type","");

        $type_ids = explode(",",$type_ids);

        $res = $id==0?D("Article")->addArticle($data):D("Article")->editArticle($data,$id);
        if(!empty($type_ids)){
            $id = $id==0?$res:$id;
            foreach($type_ids as $k=>$v){
                if(intval($v)){
                    D("ArticleCate")->addInfo(array("type_id"=>intval($v),"article_id"=>$id));
                }
            }
        }
        if($res !== false){
            show(200,"操作成功",U("Article/index"));
        }else{
            show(300,"操作失败");
        }
    }
}