<?php
namespace Admin\Model;
use Think\Model;
class AuthGroupModel extends BaseModel
{
    //自动验证
    protected $_validate = array(
        array('title', 'require', '分组名称必须填写且唯一',0,'unique'),
    );
    /**
     * 新增规则
     * */
    public function addInfo($data){
        $data['create_time'] = time();
        if(!$this->create($data)){
            show(300,$this->getError());
        }
        else{
            $id = $this->add();
            $group_access['uid'] = $id;
            $group_access['group_id'] = $id;
            M("AuthGroupAccess")->add($group_access);
        }
    }
    /**
     * 修改规则
     * */
    public function editInfo($data){
        if(empty($data)){
            show(300,"没有要更新的数据");
        }else{
            $data['update_time'] = time();
            if(!$this->create($data)){
                show(300,$this->getError());
            }
            else{
                return $this->save($data);
            }
        }
    }
}