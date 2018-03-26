<?php
namespace app\admin\controller;

use think\Exception;
use think\Env;
use app\admin\model\Notice as NoticeModel;

class Notice
{

    public function upload()
    {
        return NoticeModel::upload();
    }

}