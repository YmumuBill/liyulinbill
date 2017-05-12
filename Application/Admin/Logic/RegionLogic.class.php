<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-05-11
 * Time: 20:58
 */
namespace Admin\Logic;
use Think\Controller;
class RegionLogic extends Controller{
    protected $model;
    public function __construct(){
        parent::__construct();
        $this->model = M('RegionConf');
    }
    public function get_region(){
        $region_v2 = $this->model->where("region_level = 2")->order("id desc")->select();
        $this->assign("region_v2",$region_v2);
        $region_v3 = $this->model->where("region_level = 3")->order("id desc")->select();
        $this->assign("region_v3",$region_v3);
    }
    //有province和city
    public function get_region_pc($p = "",$c = ""){
        $region_v2 = $this->model->where("region_level = 2")->order("id desc")->select();
        foreach($region_v2 as $k=>$v){

        }
        $this->assign("region_v2",$region_v2);
        $region_v3 = $this->model->where("region_level = 3")->order("id desc")->select();
        $this->assign("region_v3",$region_v3);
    }
}