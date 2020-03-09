<?php
namespace App\Http\Controllers\Admin;

use App\Http\Common\ConstConfig;
use App\Http\Common\ReturnType;
use App\Http\Common\ServerResponse;
use App\Http\Model\RolesModel;
use App\Http\Model\RolesUserModel;
use App\Http\Model\UsersModel;
use App\Http\Requests\UsersRequest;
use App\Http\Service\Impl\RolesUserServiceImpl;
use Illuminate\Http\Request;

class UsersController extends CommonController
{
    public function index(){
        $data['user_list'] = UsersModel::paginate(ConstConfig::getPageNum()->ADMIN_PAGE_NUM);
        $data['count'] = UsersModel::all()->count();
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.manage.user_list');
    }

    public function create(Request $request){
        $data['roles_list'] = RolesModel::all();
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.manage.user_add');
    }

    public function store(UsersRequest $request){
        $request->scene('add')->validate();
        $response = UsersModel::saveUser($request);
        return $response;
    }

    public function edit($id){
        $data['info'] = UsersModel::find($id);
        $data['roles_list'] = RolesModel::all();
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.manage.user_edit');
    }

    public function update(UsersRequest $request,$id){
        $request->scene('edit')->validate();
        $user = UsersModel::find($id);
        $response = UsersModel::saveUser($request,$user);
        return $response;
    }

    public function destroy($id){
        $res = UsersModel::destroy($id);
        if ($res > 0) return RolesUserServiceImpl::delRolesUser($id);
        return ServerResponse::createByErrorMessage('删除失败');
    }

    public function updatePwd(){
        return ReturnType::returnCode([],$this->getReturnType(),'admin.update_pwd');
    }

    public function doUpdatePwd(UsersRequest $request){
        $request->scene('updatePwd')->validate();
        return UsersModel::updatePwd($request);
    }
}