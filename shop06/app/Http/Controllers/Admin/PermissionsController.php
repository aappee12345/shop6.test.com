<?php

namespace App\Http\Controllers\Admin;

use App\Http\Common\ConstConfig;
use App\Http\Common\RequestValidate;
use App\Http\Common\ReturnType;
use App\Http\Common\ServerResponse;
use App\Http\Model\PermissionsModel;
use App\Http\Requests\PermissionsRequest;
use Illuminate\Http\Request;

class PermissionsController extends CommonController
{
    public $permissions;
    public function __construct(){
        parent::__construct();
        $this->permissions = new PermissionsModel();
    }
    /**
     */
    public function index()
    {
        $data['permissions_list'] = PermissionsModel::orderBy('id','Desc')->paginate(ConstConfig::getPageNum()->ADMIN_PAGE_NUM);
        $data['total_count'] = PermissionsModel::all()->count();
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.manage.permissions_list');
    }

    /**
     */
    public function create()
    {
        return ReturnType::returnCode([],$this->getReturnType(),'admin.manage.permissions_add');
    }

    /**
     */
    public function store(PermissionsRequest $request)
    {
        $data = $request->except('_token');
        $data['guard_name'] = ConstConfig::getGuardName()->ADMIN;
        $res = PermissionsModel::create($data);
        if ($res==null) return ServerResponse::createByErrorMessage('添加失败');
        return ServerResponse::createBySuccessMessage('添加成功');
    }

    /**
     */
    public function show($id)
    {
        //
    }

    /**
     */
    public function edit($id)
    {
        if (!RequestValidate::checkGetParam((int)$id)){
            return ServerResponse::createByErrorMessage('参数错误');
        }
        $data['info'] = PermissionsModel::find($id);
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.manage.permissions_edit');
    }

    /**
     */
    public function update(PermissionsRequest $request, $id)
    {
        $res = PermissionsModel::where('id',$id)->update($request->except('_token','_method'));
        if ($res > 0) return ServerResponse::createBySuccessMessage('修改成功');
        return ServerResponse::createByErrorMessage('修改失败');
    }

    /**
     */
    public function destroy($id)
    {
        return $this->commonDelete($this->permissions->getTable(),$id);
    }
}
