<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends BaseModel
{
    public function __construct()
    {
        $this->tableName = "zh".$_SESSION['webInfo']['id']."_article";
        parent::__construct();
    }

    public function addInfo($data){
        if (!$this->create($data)){
            return 0;
        }
        else{
            return $this->add($data);
        }
    }

    public function saveInfo($condition,$data){
        $res = $this->where($condition)->save($data);
        return $res;
    }
}