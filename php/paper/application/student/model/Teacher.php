<?php

namespace app\teacher\model;
use think\Model;
use app\lib\service\UserToken;
use traits\model\SoftDelete;
use app\lib\enum\ScopeEnum;
use app\lib\exception\LoginFail;
use app\lib\service\Token;

class Teacher extends BaseModel
{
    use SoftDelete;
    protected $autoWriteTimestamp = true;
    protected $hidden = ['password','delete_time','update_time'];

    public static function changePwd() {
        $username = Token::getCurrentTokenVar("username");
        $old_pwd = md5(input("param.old_pwd"));
        $new_pwd = md5(input("param.new_pwd"));
        try{
            $user = self::where('username',$username)
                    ->where("password",$old_pwd)->find();
            $user->password = $new_pwd;
            $result = $user->save();
        }catch(\Exception $e) {
            $result = 0;
        }
        
        return self::returnMsg($result);
    }

    public static function login()
    {  
        try {
            $data = self::getUser();
        } catch(\Exception $e) {
            throw $e;
        }
        if($data) {
            $userToken = new UserToken();
            $token=$userToken->grantToken($data,$data['id'],ScopeEnum::Teacher);
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