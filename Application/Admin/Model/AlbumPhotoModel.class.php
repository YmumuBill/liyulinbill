<?php
namespace Admin\Model;
use Think\Model;
class AlbumPhotoModel extends BaseModel{
    public function __construct()
    {
        $this->tableName = "zh".$_SESSION['webInfo']['id']."_album_photo";
        parent::__construct();
    }

}