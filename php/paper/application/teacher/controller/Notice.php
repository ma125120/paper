<?php
namespace app\teacher\controller;

use think\Exception;
use think\Env;
use app\teacher\model\Notice as NoticeModel;

class Notice
{

    public function upload()
    {
        return NoticeModel::upload();
    }

}