<?php
namespace app\student\controller;

use think\Exception;
use think\Env;
use app\lib\model\Question as QuestionModel;

class Question 
{

    public function add()
    {
        return QuestionModel::add();
    }

}