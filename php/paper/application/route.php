<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

Route::post('admin/login', 'admin/User/login');
Route::get('admin/login', 'admin/User/login');

Route::post('teacher/login', 'teacher/User/login');
Route::get('teacher/login', 'teacher/User/login');

Route::post('teacher/changePwd', 'teacher/User/changePwd');
Route::get('teacher/changePwd', 'teacher/User/changePwd');

Route::post('teacher/addTopic', 'teacher/Topic/add');
Route::get('teacher/addTopic', 'teacher/Topic/add');

/*
Route::group(':version',function() {
	Route::rule([
		'/banner/:id'	=>	'@api/:version.Banner/getBanner' ,
		'/bannerItem/:id'	=>	'@api/:version.Banner/getBannerItem' ,

		'/themes'	=>	'@api/:version.Theme/getThemes' ,
		'/theme/:id'	=>	'@api/:version.Theme/getTheme' ,

		'/category/all'	=>	'@api/:version.Category/getCategorys' ,
		'/categoryById/:id'	=>	['@api/:version.Product/getAllInCategory' ,[],['id'=>'\d+']],

		'/order'	=>	'@api/:version.Order/placeOrder',
		'/order/:id'	=>	['@api/:version.Order/getDetail' ,[],['id'=>'\d+']],
		'/order/by_user'	=>	'@api/:version.Order/getSummaryByUser',
		'/pay/pre_order'	=>'@api/:version.Pay/getPreOrder',
		'/pay/notify'	=>'@api/:version.Pay/receiveNotify',

	],'','GET|POST',[],[]);
});

//Address
Route::post(':version/address', 'api/:version.Address/createOrUpdateAddress');
Route::get(':version/address', 'api/:version.Address/getUserAddress');


Route::group(':version/product',function() {
	Route::rule([
		'/recent/:count'	=>	'@api/:version.Product/getRecent' ,
		'/:id'	=>	'@api/:version.Product/getOne' ,
	],'','GET',[],[]);
});

Route::rule([
	':version/token/user'	=>	'@api/:version.Token/getToken', 
	':version/token/verify'	=>	'@api/:version.Token/verifyToken' 
],'','GET|POST',[],[]);
*/
// return [
// 	'banner/:id'	=>	['api/v1.Banner/getBanner' , ['method'	=>	'get']],
// ];

