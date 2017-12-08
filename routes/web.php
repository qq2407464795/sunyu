<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});


//后台首页
Route::get('/admin','AdminController@index');
//用户管理
Route::resource('user','UserController');
//文章管理
Route::resource('goods','GoodsController');
//分类管理
Route::resource('cate','CateController');
//站点管理
Route::resource('zhandian','ZhandianController');
//导航管理
Route::resource('nav','NavController');





Route::get('home/youpin','HomeController@youpin');


