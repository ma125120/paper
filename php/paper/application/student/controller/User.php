<?php
namespace app\student\controller;

use think\Exception;
use think\Env;
use app\lib\validate\LoginInfo;
use app\lib\validate\PwdInfo;
use app\lib\model\Student as StudentModel;
use app\lib\service\Token;

class User extends BaseController
{

    public function login() {
        (new LoginInfo())->goCheck();
        //dump(new Admin->where('username','=',input('post.username'))->find());
        return StudentModel::login();
    }

    public function changePwd() {
        (new PwdInfo())->goCheck();
        //dump(new Admin->where('username','=',input('post.username'))->find());
        return StudentModel::changePwd();
    }

    public function verifyToken($token) {
        $result = Token::verifyToken($token);
        return [
            'msg'   =>  $result,
            'code'  =>  100
        ];
    }

}