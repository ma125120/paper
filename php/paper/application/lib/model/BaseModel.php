<?php

namespace app\lib\model;
use think\Model;

use traits\model\SoftDelete;
use app\lib\service\Token;

class BaseModel extends Model
{
    use SoftDelete;
    protected $autoWriteTimestamp = true;
    //指定字段名

    public static function returnMsg($result=0) {
        if($result>0) {
            return [
                'msg'=>'操作成功',
                'errCode'=> 0
            ];
       } else {
            return [
                'msg'=>'操作失败',
                'errCode'=> 10002
            ];
       }
    }

    public static function getFullname() {
        $username = Token::getCurrentTokenVar("username");
        $real_name = Token::getCurrentTokenVar("real_name");
        $name = $username.$real_name;

        return $name;
    }
}