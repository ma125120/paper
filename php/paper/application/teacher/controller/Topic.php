<?php
namespace app\teacher\controller;

use think\Exception;
use think\Env;
use app\lib\validate\LoginInfo;
use app\lib\validate\PwdInfo;
use app\lib\model\SelectTopic;

class Topic extends BaseController
{

    public function add() {
        //(new LoginInfo())->goCheck();
        return SelectTopic::add();
    }

    public function getInfoByUsername() {
    	return SelectTopic::getTopicByName();
    }

}