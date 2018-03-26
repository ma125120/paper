<?php

namespace app\lib\model;

use think\Model;
use think\Exception;
use traits\model\SoftDelete;
use app\lib\exception\SuccessMessage;
use app\lib\exception\LoginFail;
use app\lib\enum\ScopeEnum;
use app\lib\service\UserToken;

class Admin extends BaseModel
{
    //use SoftDelete;

    //protected $autoWriteTimestamp = false;

    public static function login()
    {  
        
        try {
            $data = self::getUser();
        } catch(Exception $e) {
            throw $e;
        }
        if($data) {
            $userToken = new UserToken();
            $token=$userToken->grantToken($data,$data['id'],ScopeEnum::Super);
            return [
                'token' =>  $token
            ];
        } else {
            throw new LoginFail();
        }
    }

    public static function getUser() {
        $result = self::where('username', input('post.username'))
                    ->where('password', md5(input('post.password')))
                    ->find();
        return $result;
    }
}