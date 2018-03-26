<?php

namespace app\lib\model;
use think\Model;
use app\lib\service\Token;
use traits\model\SoftDelete;

class SelectTopic extends BaseModel
{
    use SoftDelete;
    //protected $visible=['url'];

    //指定字段名

    public static function getTopicByPage($page=0,$size=10) {
        $pagingData = self::order('status asc')
                ->paginate($size,true,['page'=>$page]);
        return $pagingData;
    }

    public static function getInfoByStudent() {
    	$username = Token::getCurrentTokenVar("username");
    	$real_name = Token::getCurrentTokenVar("real_name");
    	$name = $username.$real_name;
    	$topic = self::where("student",$name)->find();

    	return $topic;
    }

    public static function selectTopic($id) {
    	$topic =self::get($id);
    	$topic->student = self::getFullname();
    	$result = $topic->save();

    	return self::returnMsg($result);
    }
    public static function getRealTopicByPage($page=0,$size=10) {
        $pagingData = self::where("status","1")->order('status asc')
                ->paginate($size,true,['page'=>$page]);
        return $pagingData;
    }

    public static function getTopicByName() {
    	$username = Token::getCurrentTokenVar("username");
    	$real_name = Token::getCurrentTokenVar("real_name");
    	$name = $username.$real_name;
    	$topic = self::where("upload_user",$name)->select();

    	return $topic;
    }

    public static function changeStatus($id) {
    	$topic = self::get($id);
    	$topic->status=1;
    	$result = $topic->save();

    	return self::returnMsg($result);
    }

    public static function add() {

    	$data = self::getDatas();

    	$topic = new SelectTopic($data);
    	$result = $topic->save();

    	return self::returnMsg($result);
    }

    public static function getDatas() {
    	$title = input("param.title");
    	$content = input("param.content");
    	$username = Token::getCurrentTokenVar("username");
    	$real_name = Token::getCurrentTokenVar("real_name");
    	$upload_user = $username.$real_name;

    	return [
    		'title'	=>	$title,
    		'content'	=>	$content,
    		'upload_user'	=>	$upload_user
    	];
    }
}