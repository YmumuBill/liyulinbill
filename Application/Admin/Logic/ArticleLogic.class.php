<?php
namespace Admin\Logic;
use Think\Controller;
class ArticleLogic extends Controller
{
    public function show_add(){
        $type = D("ArticleType")->getAll();
        $this->assign("cate_lists",$type);
    }

    public function show_edit($id=0){
        if($id==0)return false;
        /*类型*/
        $article_type = D("ArticleCate")->getNewField("article_id = $id","type_id",true);
        $type = D("ArticleType")->getAll();
        foreach($type as $k=>$v){
            if(in_array($v['id'],$article_type)){
                $type[$k]['checked'] = 1;
            }
        }
        $this->assign("cate_lists",$type);
        //文章
        $article = D("Article")->getOne("id= $id and is_delete = 0");
        $article['file'] = json_decode($article['file'],true);
        $this->assign("info",$article);
    }

}