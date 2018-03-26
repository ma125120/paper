<?php
namespace app\admin\controller;

use think\Exception;
use think\Env;
use app\lib\model\SelectTopic;

class Topic
{

    public function getTopicByPage($page=0,$size=10)
    {
        return SelectTopic::getTopicByPage($page,$size);
    }

    public function changeStatus($id)
    {
        return SelectTopic::changeStatus($id);
    }

}