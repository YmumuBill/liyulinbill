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

    //自动验证
    protected $_validate = array(
        array('title', 'require', '文章必须有标题且不重复',0,'unique'),
    );

    public function addArticle($data){
        $data['id'] = "";
        $admin_info = session("adminInfo");
        $data['admin_id'] = $admin_info['id'];
        $data['admin_name'] = $admin_info['name'];
        $data['create_time'] = time();
        $max_sort = $this->getCount("is_delete = 0");
        $data['sort'] = $max_sort;
        $res = $this->addInfo($data);
        return $res;
    }

    public function editArticle($data,$id){
        $data['update_time'] = time();
        D("ArticleCate")->delOne("article_id = $id");
        $data['id'] = $id;
        $res = $this->saveInfo("id = $id",$data);
        return $res;
    }

    public function addInfo($data){
        if (!$this->create($data)){
            echo show(300,$this->getError());
        }
        else{
            return $this->add($data);
        }
    }

    public function saveInfo($condition,$data){
        if(!$this->create()){
            echo show(300,$this->getError());
        }else{
            $res = $this->where($condition)->save($data);
        }
        return $res;
    }
}