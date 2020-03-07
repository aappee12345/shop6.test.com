<?php
namespace App\Http\Controllers\Admin;

use App\Http\Common\ConstConfig;
use App\Http\Common\ReturnType;
use App\Http\Model\UsersModel;
use App\Http\Requests\UsersRequest;
use Illuminate\Http\Request;

class UsersController extends CommonController
{
    public function index(Request $request){
        $data['user_list'] = UsersModel::paginate(ConstConfig::getPageNum()->ADMIN_PAGE_NUM);
        $data['count'] = UsersModel::all()->count();
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.manage.user_list');
    }

    public function create(Request $request){

    }

    public function store(UsersRequest $request)
    {

    }

    public function edit(Request $request,$id)
    {

    }

    public function update(UsersRequest $request,$id){

    }

    public function destroy($id){

    }

    public function updatePwd(){
        return ReturnType::returnCode([],$this->getReturnType(),'admin.update_pwd');
    }

    public function doUpdatePwd(UsersRequest $request){
        return UsersModel::updatePwd($request);
    }
}