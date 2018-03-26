<?php

namespace app\lib\validate;

class LoginInfo extends BaseValidate
{
    protected $rule = [
        'username'	=>	'require|isNotEmpty',
        'password'	=>	'require|isNotEmpty',
    ];

    protected $message = [
    	//'count.isPositiveInteger'		=>	'count必须为正整数'
    ];

}