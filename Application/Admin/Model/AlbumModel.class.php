<?php
namespace Admin\Model;
use Think\Model;
class AlbumModel extends BaseModel{
    public function __construct()
    {
        $this->tableName = "zh".$_SESSION['webInfo']['id']."_album";
        parent::__construct();
    }

    //自动验证
    protected $_validate = array(
        array('name', 'require', '已有该相册名称', 0, 'unique'),
    );

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

    public function mmFields($condition="",$field=""){
        $result = $this->where($condition)->field($field)->select();
        return $result;
    }
}