<?php

namespace app\admin\model;
use think\Model;

use traits\model\SoftDelete;

class BaseModel extends Model
{
    use SoftDelete;

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
}