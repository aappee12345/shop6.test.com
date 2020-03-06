<?php
namespace App\Http\Controllers\Admin;

use App\Http\Common\ReturnType;
use App\Http\Model\UsersModel;
use App\Http\Requests\UsersRequest;

class UsersController extends CommonController
{
    public function index(){

    }

    public function updatePwd(){
        return ReturnType::returnCode([],$this->getReturnType(),'admin.update_pwd');
    }

    public function doUpdatePwd(UsersRequest $request){
        return UsersModel::updatePwd($request);
    }
}