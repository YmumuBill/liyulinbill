<?php
namespace Admin\Model;
use Think\Model;
class PhotoModel extends BaseModel{
    public function __construct()
    {
        $this->tableName = "zh".$_SESSION['webInfo']['id']."_album_photo";
        parent::__construct();
    }


    protected $_validate = array(
        array('image', '', '服务器上照片重名', 0, 'unique'),
        array('image_small', '', '服务器上照片重名', 0, 'unique'),
    );

    public function addInfo($data){
        if (!$this->create($data)){
            echo show(300,$this->getError());
        }
        else{
            return $this->add($data);
        }
    }

    public function saveInfo($condition = "",$data){
        if (!$this->create($data)){
            echo show(300,$this->getError());
        }
        else{
            return $this->where($condition)->save($data);
        }
    }
}