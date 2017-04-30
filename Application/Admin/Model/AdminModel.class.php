<?php
namespace Admin\Model;
use Think\Model;
class AdminModel extends Model
{
    //自动验证
    protected $_validate = array(
        array('adm_name', 'require', '已有该管理员', 0, 'unique'),
        array('name', '', '已有该用户名', 0, 'unique'),
    );

    public function login($username, $password){
        $map = array(
            'adm_name' => $username,
            'adm_pwd' => $this->pw_md5($password),
        );
        $info = $this->where($map)->find();
        if (empty($info)) return show(300, '用户名或密码错误');;
        if($info['id']!=1){
            $web = M("web")->where("tenant_id = ".$info['role_id']." and is_effect = 1")->find();
            if($web['url']==$_SERVER['SERVER_NAME']){
                session("webInfo",$web);
            }else{
                unset($adm_data);
                return show(300, '管理员域名错误');
            }
        }
        $this->updateLogin($info['id']);
        $info['adm_role_name'] = D("AuthGroup")->getNewField(array("id"=>$info['role_id']),"title");

        session('adminInfo', $info);
        session(C('AUTH_KEY'), $info['role_id']);
        return true;
    }

    /* 密码加密 */
    public function pw_md5($password){
        $str = 'YH5201627';
        return md5($str . $password);
    }

    /**
     * 更新用户登录信息
     * @param  integer $uid 用户ID
     */
    private function updateLogin($uid){
        $data = array(
            'id'              => $uid,
            'login_time' => time(),
            'login_ip'   => get_client_ip(1),
        );
        $this->save($data);
    }

    /* 获取管理员列表 */
    public function getList($map){
        $list = $this->where($map)->select();
        return $list;
    }

    /* 获取用户信息 */
    public function getInfo($id){
        $info = $this->where('id = '.$id)->find();
        return $info;
    }

    /**
     * 添加管理员数据
     * @param [arr] $data 提交的数据
     */
    public function addRow($data){
        $data['adm_pwd'] = $this->pw_md5($data['adm_pwd']);
        $data['create_time'] = time();
        $data['login_ip']   = get_client_ip(1);
        if(!$this->create($data)){
            show(300,$this->getError());
        }
        else{
            return $this->add();
        }
    }

    /**
     * 修改管理员数据
     * @param [arr] $data 提交的数据
     */
    public function editRow($data){
        if(empty($data)){
            show(300,"没有要更新的数据");
        }else{
            $data['adm_pwd'] = $this->pw_md5($data['adm_pwd']);
            if(!$this->create($data)){
                show(300,$this->getError());
            }
            else{
                return $this->save($data);
            }
        }
    }
}