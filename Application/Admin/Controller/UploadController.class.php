<?php
namespace Admin\Controller;
use Think\Controller;
class UploadController extends BaseController{
    public function upload_other(){
        $web_id = is_login();
        if (!is_dir(C(APP_ROOT_PATH) . "public/upload")) {
            @mkdir( C(APP_ROOT_PATH) . "public/upload");
            @chmod( C(APP_ROOT_PATH) . "public/upload", 0777);
        }

        if (!is_dir(C(APP_ROOT_PATH)."public/upload/".$web_id)) {
            @mkdir(C(APP_ROOT_PATH)."public/upload/".$web_id);
            @chmod(C(APP_ROOT_PATH)."public/upload/".$web_id, 0777);
        }

        if (!is_dir(C(APP_ROOT_PATH)."public/upload/".$web_id."/other")) {
            @mkdir(C(APP_ROOT_PATH)."public/upload/".$web_id."/other");
            @chmod(C(APP_ROOT_PATH)."public/upload/".$web_id."/other", 0777);
        }

        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('txt','doc','docx','xls','xlsx','ppt','pptx');// 设置附件上传类型
        $upload->rootPath  =     "./public/upload/".$web_id."/other/"; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        $upload->autoSub = false;
        $upload->saveName = array('uniqid','');
        $info   =   $upload->uploadOne($_FILES['file']);
        if(!$info) {// 上传错误提示错误信息
            echo show(300,$upload->getError());
        }
        else{// 上传成功 获取上传文件信息
            $path = "/public/upload/".$web_id."/other/".$info["savename"];
            echo show(200,"上传成功",false,array("info"=>$path));
        }
    }
}