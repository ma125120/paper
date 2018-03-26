<?php
namespace app\admin\controller;

use think\Exception;
use think\Env;
use app\api\validate\LoginInfo;
use app\lib\model\Admin;
use app\lib\service\Token;
class User
{

    public function login()
    {
        (new LoginInfo())->goCheck();
        //dump(new Admin->where('username','=',input('post.username'))->find());
        return Admin::login();
    }

    public function verifyToken($token) {
        $result = Token::verifyToken($token);
        return [
            'msg'   =>  $result,
            'code'  =>  100
        ];
    }

}