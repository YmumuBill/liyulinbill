<?php
namespace Admin\Model;
use Think\Model;
class BaseModel extends Model
{
    public function doQuery($condition){
        $result = $this->query($condition);
        return $result;
    }

    public function getAll($condition , $limit="" , $order = ""){
        $result = $this->where($condition)
            ->order($order)
            ->limit($limit)
            ->select();
        return $result;
    }

    public function getOne($condition,$field=""){
        $data = $this->where($condition)
            ->field($field)
            ->find();
        return $data;
    }

    public function getCount($condition){
        $result = $this->where($condition)->count();
        return $result;
    }


    public function getNewField($condition,$field,$is_arr = false){
        $data = $this->where($condition)->getField($field,$is_arr);
        return $data;
    }
    //直接物理删除
    public function delOne($condition){
        if(empty($condition)){
            return false;
        }else{
            $result = $this->where($condition)->delete();
            return $result;
        }
    }
    //逻辑删除
    public function setDelStatus($id=0){
        if($id==0){
            return false;
        }else{
            $result = $this->where(array("id"=>$id))->setField("is_delete",1);
            return $result;
        }
    }

}