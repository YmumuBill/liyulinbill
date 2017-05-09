<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-05-09
 * Time: 14:32
 */
namespace Admin\Controller;
use Think\Controller;
class FiguresController extends BaseController{
    protected $model;
    protected $logic;
    public function __construct(){
        parent::__construct();
        $this->model = D('Figures');
        $this->logic = A("Figures","Logic");
    }

    public function index(){
        $this->display();
    }

    public function add(){
        $content = $this->fetch("Figures:edit");
        $this->show($content);
    }

    public function edit()
    {
        $id = I('get.id', 0, 'intval');
        if ($id == 0) echo show(300, '参数类型错误');
        $info = $this->model->getInfo("id = $id");
        $this->assign('info', $info);
        $this->display();
    }

    public function save_info(){
        $this->logic->save_edit();
    }

    public function del(){
        $ids = I("id",0);
        if($ids==0)echo show(300,"id错误");
        $res = $this->model->where("id in ($ids)")->setField("is_delete",1);
        if($res !== false){
            echo show(200,"删除成功！");
        }else{
            echo show(300,"删除失败！");
        }
    }
}