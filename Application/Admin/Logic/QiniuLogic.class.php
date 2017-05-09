<?php
/**
 * Created by liyulin.
 * Date: 2017-03-27
 * Time: 14:54
 */
namespace Admin\Logic;
use Think\Controller;
require './qiniu/autoload.php';
use Qiniu\Auth;
use Qiniu\Storage\UploadManager;
use Org\Net\Http;
class QiniuLogic extends Controller{
    public function get_token(){
        $accessKey = C("QINIU_ACCESS");
        $secretKey = C("QINIU_SECRET");
        $bucket = C("QINIU_BUCKET");

        $auth = new Auth($accessKey, $secretKey);
        $policy = array(
            "scope"=>$bucket,
            "insertOnly"=>0
        );
        $uptoken = $auth->uploadToken($bucket, null, 36000, $policy);
        $this->assign("token",$uptoken);
    }
}