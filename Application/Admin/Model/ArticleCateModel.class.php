<?php
namespace Admin\Model;
use Think\Model;
class ArticleCateModel extends BaseModel
{
    public function __construct()
    {
        $this->tableName = "zh".$_SESSION['webInfo']['id']."_article_cate";
        parent::__construct();
    }

    public function addInfo($data){
        return $this->add($data);
    }

    public function saveInfo($condition,$data){
        $res = $this->where($condition)->save($data);
        return $res;
    }
}