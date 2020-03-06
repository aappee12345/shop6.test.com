<?php
namespace App\Http\Controllers\Admin;

use App\Http\Common\ConstConfig;
use App\Http\Common\ReturnType;
use App\Http\Common\ServerResponse;
use App\Http\Model\RolesModel;
use App\Http\Requests\RolesRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends CommonController
{
    public $roles;
    public function __construct(){
        parent::__construct();
        $this->roles = new RolesModel();
    }

    public function index(){
        $data['count'] = 0;
        $data['roles_list'] = RolesModel::paginate(ConstConfig::getPageNum()->ADMIN_PAGE_NUM);
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.manage.roles_list');
    }
    
    public function create(){
        $data['permissions'] = Permission::all();// 获取所有权限
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.manage.roles_add');
    }
    
    public function store(RolesRequest $request){

        /*****/
//        $name = $request['name'];
//        $role = new Role();
//        $role->name = $name;
//
//        $permissions = $request['permissions'];
//
//        $role->save();
//        // 遍历选择的权限
//        foreach ($permissions as $permission) {
//            $p = Permission::where('id', '=', $permission)->firstOrFail();
//            // 获取新创建的角色并分配权限
//            $role = Role::where('name', '=', $name)->first();
//            $role->givePermissionTo($p);
//        }
        /******/
        $data = $request->except('_token');
        $data['guard_name'] = ConstConfig::getGuardName()->ADMIN;
        $res = Role::create($data);
        if ($res==null) return ServerResponse::createByErrorMessage('添加失败');
        return ServerResponse::createBySuccessMessage('添加成功');
    }

    public function edit($id)
    {
        $data['info'] = RolesModel::find($id);/*roles表信息*/
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.manage.roles_edit');
    }

    public function update(RolesRequest $request,$id)
    {
        $res = RolesModel::where('id',$id)->update($request->except('_token','_method'));
        if ($res > 0) return ServerResponse::createBySuccessMessage('修改成功');
        return ServerResponse::createByErrorMessage('修改失败');
    }

    public function destroy($id)
    {
        return $this->commonDelete($this->roles->getTable(),$id);
    }
}
