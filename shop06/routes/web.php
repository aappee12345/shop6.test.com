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
Route::group(['middleware' => ['web','admin.login'],'prefix'=>'Admin','namespace'=>'Admin'],function(){
    Route::get('index/index','IndexController@index');
    Route::any('login/logout','LoginController@logout');
    Route::get('user/index','UserController@index');
    Route::get('user/update_pwd','UserController@updatePwd');
    Route::post('user/do_update_pwd','UserController@doUpdatePwd');
    Route::resource('category','CategoryController');/*资源路由 一条路由控制增删改查*/
    Route::resource('article','ArticleController');
    Route::post('cate/changeOrder','CategoryController@changeOrder');
    Route::post('art/changeOrder','ArticleController@changeOrder');
    Route::post('art/updateAttr','ArticleController@updateAttr');
    Route::post('art/upload','ArticleController@upload');
});
Route::group(['middleware' => ['web'],'prefix'=>'Home','namespace'=>'Home'],function(){
    Route::resource('article','ArticleController');
    Route::get('article/index/{cid?}','ArticleController@index');
    Route::get('article/show/{id}','ArticleController@show')->where(['id' => '[0-9]+']);
});
Route::any('Admin/login/index','Admin\LoginController@index');
Route::get('Admin/login/captcha','Admin\LoginController@captcha');