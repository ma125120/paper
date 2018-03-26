<?php

namespace app\lib\validate;

class PwdInfo extends BaseValidate
{
    protected $rule = [
        'old_pwd'	=>	'require|isNotEmpty',
        'new_pwd'	=>	'require|isNotEmpty',
    ];

    protected $message = [
    	//'count.isPositiveInteger'		=>	'count必须为正整数'
    ];

}