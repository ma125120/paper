<?php

namespace app\lib\model;
use think\Model;

use traits\model\SoftDelete;

class Question extends BaseModel
{
    use SoftDelete;
    protected $visible=['url'];
    //protected $autoWriteTimestamp = true;
    //指定字段名

    public static function add() {
    	$name = self::getFullname();
    	$content = input("param.content");
    	$question = new Question([
    		'content'=>$content,
    		'student'=>$name
    	]);

    	$result = $question->save();

    	return self::returnMsg($result);
    }
}