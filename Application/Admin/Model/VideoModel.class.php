<?php
namespace Admin\Model;
use Think\Model;
class VideoModel extends BaseModel{
    public function __construct()
    {
        $this->tableName = "zh".$_SESSION['webInfo']['id']."_video";
        parent::__construct();
    }

    protected $_validate = array(
        array('source', '', '服务器上有重名视频，已覆盖', 0, 'unique'),
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