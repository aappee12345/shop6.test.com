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
//Route::group(['middleware' => ['web','isAdmin'],'prefix'=>'Admin','namespace'=>'Admin'],function(){
Route::group(['middleware' => ['web','admin.login'],'prefix'=>'Admin','namespace'=>'Admin'],function(){
    Route::get('index/index','IndexController@index');
    Route::any('login/logout','LoginController@logout');
    Route::get('user/index','UsersController@index');
    Route::get('user/update_pwd','UsersController@updatePwd');
    Route::post('user/do_update_pwd','UsersController@doUpdatePwd');
    Route::resource('category','CategoryController');/*资源路由 一条路由控制增删改查*/
    Route::resource('article','ArticleController');
    Route::resource('roles','RolesController');
    Route::resource('permissions','PermissionsController');
    Route::post('cate/changeOrder','CategoryController@changeOrder');
    Route::post('art/changeOrder','ArticleController@changeOrder');
    Route::post('art/updateAttr','ArticleController@updateAttr');
    Route::post('art/upload','ArticleController@upload');
    Route::any('role/{role}/editPermissions','RolesController@editPermissions');
    Route::post('role/doEditPerm','RolesController@doEditPerm');
});
Route::group(['middleware' => ['web'],'prefix'=>'Home','namespace'=>'Home'],function(){
    Route::resource('article','ArticleController');
    Route::get('article/index/{cid?}','ArticleController@index');
    Route::get('article/show/{id}','ArticleController@show')->where(['id' => '[0-9]+']);
});
Route::any('Admin/login/index','Admin\LoginController@index');
Route::get('Admin/login/captcha','Admin\LoginController@captcha');