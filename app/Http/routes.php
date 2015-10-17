<?php

Route::get('/', function () {
	return view('welcome');
});


Route::get('home',			['as'=>'home','uses'=>'HomeController@index']);

// Authentication routes...
Route::group(['prefix' => 'auth'], function () {
	Route::get('login', 	['as'=>'auth.login', 	 'uses'=>'Auth\AuthController@getLogin']);
	Route::post('login', 	['as'=>'auth.login', 	 'uses'=>'Auth\AuthController@postLogin']);
	Route::get('logout', 	['as'=>'auth.logout', 	 'uses'=>'Auth\AuthController@getLogout']);	
	Route::get('register', 	['as'=>'auth.register',  'uses'=>'Auth\AuthController@getRegister']);
	Route::post('register', ['as'=>'auth.register',  'uses'=>'Auth\AuthController@postRegister']);
});
// Password reset link request routes...
Route::group(['prefix' => 'password'], function () {
	Route::get('email', 		['as'=>'password.email', 'uses'=>'Auth\PasswordController@getEmail']);
	Route::post('email', 		['as'=>'password.email', 'uses'=>'Auth\PasswordController@postEmail']);
	Route::get('reset/{token}', ['as'=>'password.reset', 'uses'=>'Auth\PasswordController@getReset']);
	Route::post('reset', 		['as'=>'password.reset', 'uses'=>'Auth\PasswordController@postReset']);
});

Route::group(['middleware'=>'auth.checkrole:admin','prefix' => 'admin', 'as'=>'admin.'], function () {

	Route::group(['prefix' => 'categories','as'=>'categories.'], function () {
		Route::get('',			 ['as'=>'index',	'uses'=> 'CategoriesController@index']);
		Route::post('',			 ['as'=>'store',	'uses'=> 'CategoriesController@store']);
		Route::get('create',	 ['as'=>'create',	'uses'=> 'CategoriesController@create']);
		Route::get('{id}/delete',['as'=>'delete',	'uses'=> 'CategoriesController@destroy'])->where('id', '[0-9]+');
		Route::delete('{id}',	 ['as'=>'destroy',	'uses'=> 'CategoriesController@destroy'])->where('id', '[0-9]+');	
		Route::get('{id}',		 ['as'=>'show',		'uses'=> 'CategoriesController@show'])->where('id', '[0-9]+');
		Route::put('{id}',		 ['as'=>'update',	'uses'=> 'CategoriesController@update'])->where('id', '[0-9]+');
		Route::get('{id}/edit',	 ['as'=>'edit',		'uses'=> 'CategoriesController@edit'])->where('id', '[0-9]+'); 
	});

	Route::group(['prefix' => 'products','as'=>'products.'], function () {
		Route::get('',			 ['as'=>'index',	'uses'=> 'ProductsController@index']);
		Route::post('',			 ['as'=>'store',	'uses'=> 'ProductsController@store']);
		Route::get('create',	 ['as'=>'create',	'uses'=> 'ProductsController@create']);
		Route::get('{id}/delete',['as'=>'delete',	'uses'=> 'ProductsController@destroy'])->where('id', '[0-9]+');
		Route::delete('{id}',	 ['as'=>'destroy',	'uses'=> 'ProductsController@destroy'])->where('id', '[0-9]+');	
		Route::get('{id}',		 ['as'=>'show',		'uses'=> 'ProductsController@show'])->where('id', '[0-9]+');
		Route::put('{id}',		 ['as'=>'update',	'uses'=> 'ProductsController@update'])->where('id', '[0-9]+');
		Route::get('{id}/edit',	 ['as'=>'edit',		'uses'=> 'ProductsController@edit'])->where('id', '[0-9]+'); 
	});

	Route::group(['prefix' => 'clients','as'=>'clients.'], function () {
		Route::get('',			 ['as'=>'index',	'uses'=> 'ClientsController@index']);
		Route::post('',			 ['as'=>'store',	'uses'=> 'ClientsController@store']);
		Route::get('create',	 ['as'=>'create',	'uses'=> 'ClientsController@create']);
		Route::get('{id}/delete',['as'=>'delete',	'uses'=> 'ClientsController@destroy'])->where('id', '[0-9]+');
		Route::delete('{id}',	 ['as'=>'destroy',	'uses'=> 'ClientsController@destroy'])->where('id', '[0-9]+');	
		Route::get('{id}',		 ['as'=>'show',		'uses'=> 'ClientsController@show'])->where('id', '[0-9]+');
		Route::put('{id}',		 ['as'=>'update',	'uses'=> 'ClientsController@update'])->where('id', '[0-9]+');
		Route::get('{id}/edit',	 ['as'=>'edit',		'uses'=> 'ClientsController@edit'])->where('id', '[0-9]+'); 
	});

	Route::group(['prefix' => 'orders','as'=>'orders.'], function () {
		Route::get('',			 ['as'=>'index',	'uses'=> 'OrdersController@index']);
		Route::post('',			 ['as'=>'store',	'uses'=> 'OrdersController@store']);
		Route::get('create',	 ['as'=>'create',	'uses'=> 'OrdersController@create']);
		Route::get('{id}/delete',['as'=>'delete',	'uses'=> 'OrdersController@destroy'])->where('id', '[0-9]+');
		Route::delete('{id}',	 ['as'=>'destroy',	'uses'=> 'OrdersController@destroy'])->where('id', '[0-9]+');	
		Route::get('{id}',		 ['as'=>'show',		'uses'=> 'OrdersController@show'])->where('id', '[0-9]+');
		Route::put('{id}',		 ['as'=>'update',	'uses'=> 'OrdersController@update'])->where('id', '[0-9]+');
		Route::get('{id}/edit',	 ['as'=>'edit',		'uses'=> 'OrdersController@edit'])->where('id', '[0-9]+'); 
	});

	Route::group(['prefix' => 'cupoms','as'=>'cupoms.'], function () {
		Route::get('',			 ['as'=>'index',	'uses'=> 'CupomsController@index']);
		Route::post('',			 ['as'=>'store',	'uses'=> 'CupomsController@store']);
		Route::get('create',	 ['as'=>'create',	'uses'=> 'CupomsController@create']);
		Route::get('{id}/delete',['as'=>'delete',	'uses'=> 'CupomsController@destroy'])->where('id', '[0-9]+');
		Route::delete('{id}',	 ['as'=>'destroy',	'uses'=> 'CupomsController@destroy'])->where('id', '[0-9]+');	
		Route::get('{id}',		 ['as'=>'show',		'uses'=> 'CupomsController@show'])->where('id', '[0-9]+');
		Route::put('{id}',		 ['as'=>'update',	'uses'=> 'CupomsController@update'])->where('id', '[0-9]+');
		Route::get('{id}/edit',	 ['as'=>'edit',		'uses'=> 'CupomsController@edit'])->where('id', '[0-9]+'); 
	});
});

Route::group(['middleware'=>'auth.checkrole:deliveryman','prefix' => 'delivery','as'=>'delivery.'], function () {
	Route::group(['prefix' => 'orders','as'=>'orders.'], function () {
		Route::get('',			 ['as'=>'index',    'uses'=> 'DeliveriesController@index']);
		Route::post('',			 ['as'=>'store',	'uses'=> 'DeliveriesController@store']);
		Route::get('create',	 ['as'=>'create',	'uses'=> 'DeliveriesController@create']);
		Route::get('{id}/delete',['as'=>'delete',	'uses'=> 'DeliveriesController@destroy'])->where('id', '[0-9]+');
		Route::delete('{id}',	 ['as'=>'destroy',	'uses'=> 'DeliveriesController@destroy'])->where('id', '[0-9]+');
		Route::get('{id}',		 ['as'=>'show',		'uses'=> 'DeliveriesController@show'])->where('id', '[0-9]+');
		Route::put('{id}',		 ['as'=>'update',	'uses'=> 'DeliveriesController@update'])->where('id', '[0-9]+');
		Route::get('{id}/edit',	 ['as'=>'edit',		'uses'=> 'DeliveriesController@edit'])->where('id', '[0-9]+');
	});
});


Route::group(['middleware'=>'auth.checkrole:client','prefix' => 'customer','as'=>'customer.'], function () {
	Route::group(['prefix' => 'orders','as'=>'orders.'], function () {
		Route::get('',			 ['as'=>'index',    'uses'=> 'CheckoutController@index']);
		Route::post('',			 ['as'=>'store',	'uses'=> 'CheckoutController@store']);
		Route::get('create',	 ['as'=>'create',	'uses'=> 'CheckoutController@create']);
		Route::get('{id}/delete',['as'=>'delete',	'uses'=> 'CheckoutController@destroy'])->where('id', '[0-9]+');
		Route::delete('{id}',	 ['as'=>'destroy',	'uses'=> 'CheckoutController@destroy'])->where('id', '[0-9]+');
		Route::get('{id}',		 ['as'=>'show',		'uses'=> 'CheckoutController@show'])->where('id', '[0-9]+');
		Route::put('{id}',		 ['as'=>'update',	'uses'=> 'CheckoutController@update'])->where('id', '[0-9]+');
		Route::get('{id}/edit',	 ['as'=>'edit',		'uses'=> 'CheckoutController@edit'])->where('id', '[0-9]+');
	});
});

Route::post('oauth/access_token', function() {
	return Response::json(Authorizer::issueAccessToken());
});
Route::group(['middleware'=>'oauth','prefix' => 'api', 'as'=>'api.'], function () {
	Route::get('pedidos',function() {
		return [
		'id'=>'1',
		'client'=>'Santiago',
		'total'=>10,
		];
	});
});