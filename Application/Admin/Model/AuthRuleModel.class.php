<?php
namespace Admin\Model;
use Think\Model;
class AuthRuleModel extends BaseModel
{
    //自动验证
    protected $_validate = array(
        array('title', 'require', '菜单名必须'),
        array('name', '', '规则地址必须唯一', 0, 'unique'),
        array('menutype',array(0,1,2),'菜单类型错误',2,'in'),
        array('type',array(0,1,2,3),'权限级别错误',2,'in'),
    );

    /**
     * 新增规则
     * */
    public function addInfo($data){
        if(!$this->create($data)){
            show(300,$this->getError());
        }
        else{
            return $this->add();
        }
    }
    /**
     * 修改规则
     * */
    public function editInfo($data){
        if(empty($data)){
            show(300,"没有要更新的数据");
        }else{
            if(!$this->create($data)){
                show(300,$this->getError());
            }
            else{
                return $this->save($data);
            }
        }
    }

    /**
     * 获取菜单列表数据
     * @param  array  $map 查询条件
     * @return array
     */
    public function getMenu($map = array()){
        $menuList = $this->where($map)->order('id asc')->select();
        return $menuList;
    }

    //获取数据单行信息
    public function getInfo($id){
        $info = $this->where('id = '.$id)->find();
        return $info;
    }

    //查询是否有子菜单
    public function getChild($id){
        $info = $this->where('pid = '.$id)->find();
        if (empty($info)) return true;
        return false;
    }

    //确认提交父菜单是否为 自身或自身子菜单
    public function surePid($id, $pid){
        $menuList = $this->getMenu();
        $plist = \Common\Lib\ArrayTree::ptree($menuList, $pid);
        foreach ($plist as $v) {
            if ($v['id'] == $id) {
                return false;
            }
        }
        return true;
    }
}