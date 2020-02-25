<?php
namespace App\Http\Controllers\Admin;

use App\Http\Model\UserModel;
use App\Http\Requests\UserRequest;
use App\Http\Service\Impl\UserServiceImpl;

class UserController extends CommonController
{
    public function index(){

    }

    public function updatePwd(){
        return view('admin.update_pwd');
    }

    public function doUpdatePwd(UserRequest $request){
        return UserModel::updatePwd($request);
    }
}