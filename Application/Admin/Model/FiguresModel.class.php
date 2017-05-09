<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-05-09
 * Time: 14:33
 */
namespace Admin\Model;
use Think\Model;
class FiguresModel extends BaseModel{
    public function __construct()
    {
        $this->tableName = "zh".$_SESSION['webInfo']['id']."_figures";
        parent::__construct();
    }

    //自动验证
    protected $_validate = array(
        array('name', 'require', '人物必须有名字且不重复',0,'unique'),
        array('avatar_url', 'require', '人物必须有头像且文件名称不重复',0,'unique'),
    );

    public function getInfo($condition){
        $result = $this->where($condition)->find();
        $result['awards'] = json_decode($result['awards'],true);
        $result['images'] = json_decode($result['images'],true);
        return $result;
    }
}