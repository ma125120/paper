<?php
namespace app\api\service;

use app\lib\exception\WxException;
use app\lib\exception\TokenException;
use app\api\model\User as UserModel;
use app\lib\enum\ScopeEnum;
use think\Exception;

class UserToken extends Token {

	function __construct() {

	}

	public function grantToken($data,$uid,$scope) {
		//拿到openid,
		//数据库里看一下，这个openid是不是已经存在
		//如果存在则不处理，如果不存在那么新增一条记录
		//生成令牌，准备缓存数据，写入缓存
		//返回令牌至客户端
		//key 令牌
		//value wxResult,uid,scope
		$cacheValue=$this->prepareCacheValue($data,$uid,$scope);
		$token = $this->saveToCache($cacheValue);

		return $token;
	}

	private function saveToCache($cacheValue) {
		$key=self::generateToken();
		$value = json_encode($cacheValue);
		$expire_in = config('setting.token_expire_in');

		$req = cache($key,$value,$expire_in);
		if(!$req) {
			throw new TokenException([
				'msg'	=>	'服务器缓存异常',
				'errorCode'	=>	'10005'
			]);
		}

		return $key;
	}

	private function prepareCacheValue($data,$uid,$scope) {
		$cacheValue=$data;
		$cacheValue['uid']=$uid;
		//scope = 16代表app用户的权限数值
		$cacheValue['scope'] = $scope;
		//scope=32 代表CMS(管理员)用户的权限数值
		//$cacheValue['scope']=32;

		return $cacheValue;
	}
}