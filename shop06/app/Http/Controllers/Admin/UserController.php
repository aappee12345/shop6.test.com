<?php
namespace App\Http\Controllers\Admin;

use App\Http\Common\ReturnType;
use App\Http\Requests\UserRequest;

class UserController extends CommonController
{
    public function index(){

    }

    public function updatePwd(){
        return ReturnType::returnCode([],$this->getReturnType(),'admin.update_pwd');
    }

    public function doUpdatePwd(UserRequest $request){
        return UserModel::updatePwd($request);
    }
}