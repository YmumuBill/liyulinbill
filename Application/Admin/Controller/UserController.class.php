<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-04-27
 * Time: 11:25
 */
namespace Admin\Controller;
use Think\Controller;
class UserController extends BaseController {
    protected $model;
    protected $logic;
    public function __construct(){
        parent::__construct();
        $this->model = M('User');
        $this->logic = A("User","Logic");
    }
    //注册用户列表
    public function index(){
        $this->display();
    }

    public function get_lists(){
        $data = $this->logic->more_lists();
        $this->ajaxReturn($data);
    }

    public function del(){
        return parent::delLogic();
    }
}