<?php
namespace app\lib\validate;

use app\api\validate\BaseValidate;

use think\Validate;

class IDMustBePostiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInteger'
    ];

    // protected $message = [
    //     'name.require'    =>  'name是必须的参数'
    // ];

}