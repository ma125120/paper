<?php 
	namespace app\lib\exception;

	class LoginFail extends BaseException 
	{
		//HTTP状态码
		public $code = 200;

		//错误具体信息
		public $msg = '用户名或密码错误';

		//自定义错误码
		public $errorCode = 401;
	}
?>