<?php
namespace Admin\Model;
use Think\Model;
class AlbumCommentModel extends BaseModel{
    public function __construct()
    {
        $this->tableName = "zh".$_SESSION['webInfo']['id']."_album_comment";
        parent::__construct();
    }

}