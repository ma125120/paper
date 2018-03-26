<?php
namespace app\teacher\controller;

use think\Exception;
use think\Env;
use app\lib\validate\LoginInfo;
use app\lib\validate\PwdInfo;
use app\teacher\model\Teacher as TeacherModel;
use app\lib\service\Token;

class User extends BaseController
{

    public function login() {
        (new LoginInfo())->goCheck();
        //dump(new Admin->where('username','=',input('post.username'))->find());
        return TeacherModel::login();
    }

    public function changePwd() {
        (new PwdInfo())->goCheck();
        //dump(new Admin->where('username','=',input('post.username'))->find());
        return TeacherModel::changePwd();
    }

    public function verifyToken($token) {
        $result = Token::verifyToken($token);
        return [
            'msg'   =>  $result,
            'code'  =>  100
        ];
    }

}