<?php

namespace app\teacher\model;
use think\Model;
use think\Exception;
use traits\model\SoftDelete;
use app\lib\exception\SuccessMessage;
use app\lib\enum\ScopeEnum;
use app\api\service\UserToken;

class teacher extends Model
{
    //use SoftDelete;

    //protected $autoWriteTimestamp = false;

    public static function login()
    {  
        
        try {
            //$data=1;
            $data = self::getUser();
        } catch(Exception $e) {
            throw $e;
        }
        if($data) {
            $userToken = new UserToken();
            $token=$userToken->grantToken($data,$data['id'],ScopeEnum::Super);
            dump($token);
            return [
                'token' =>  $token
            ];
        } else {
            throw new LoginFail();
        }
    }

    public static function getUser() {
        $user = new teacher;
        $result = teacher::where('username', input('post.username'))
                    ->where('password', md5(input('post.password')))
                    ->find();   
        dump($user->getLastSql()); 
        //return $result;
    }
}