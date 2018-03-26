<?php
namespace app\student\controller;

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

    public function getRealTopicByPage($page=0,$size=10) {
    	return SelectTopic::getRealTopicByPage($page,$size);
    }

    public function getInfoByStudent() {
			return SelectTopic::getInfoByStudent();
    }

    public function selectTopic($id) {
    	return SelectTopic::selectTopic($id);
    }

}