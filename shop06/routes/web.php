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
Route::group(['middleware' => ['web','admin.login','auth'],'prefix'=>'Admin','namespace'=>'Admin'],function(){
    Route::get('index/index',['as'=>'admin.index','uses'=>'IndexController@index']);
    Route::any('login/logout',['as'=>'login.logout','uses'=>'LoginController@logout']);
    Route::get('user/update_pwd',['as'=>'user.updatePwd','uses'=>'UsersController@updatePwd']);
    Route::post('user/do_update_pwd',['as'=>'user.doUpdatePwd','uses'=>'UsersController@doUpdatePwd']);
    Route::resource('category','CategoryController');/*资源路由 一条路由控制增删改查*/
    Route::resource('article','ArticleController');
    Route::resource('roles','RolesController');
    Route::resource('users','UsersController');
    Route::resource('permissions','PermissionsController');
    Route::post('cate/changeOrder',['as'=>'cate.changeOrder','uses'=>'CategoryController@changeOrder']);
    Route::post('art/changeOrder',['as'=>'art.changeOrder','uses'=>'ArticleController@changeOrder']);
    Route::post('art/updateAttr',['as'=>'art.updateAttr','uses'=>'ArticleController@updateAttr']);
    Route::post('art/upload',['as'=>'art.upload','uses'=>'ArticleController@upload']);
    Route::any('role/{role}/editPermissions',['as'=>'role.editPermissions','uses'=>'RolesController@editPermissions']);
    Route::post('role/doEditPerm',['as'=>'role.doEditPerm','uses'=>'RolesController@doEditPerm']);
});
Route::group(['middleware' => ['web'],'prefix'=>'Home','namespace'=>'Home'],function(){
    Route::resource('article','ArticleController');
    Route::get('article/index/{cid?}','ArticleController@index');
    Route::get('article/show/{id}','ArticleController@show')->where(['id' => '[0-9]+']);
});
Route::any('Admin/errors','Admin\ErrorsController@index');
Route::any('Admin/login/index',['as'=>'admin.login','uses'=>'Admin\LoginController@index']);
Route::get('Admin/login/captcha','Admin\LoginController@captcha');