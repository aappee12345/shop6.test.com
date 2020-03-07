<?php
namespace App\Http\Middleware;

use App\Http\Common\ConstConfig;
use App\Http\Common\ReturnType;
use App\Http\Common\ServerResponse;
use App\Http\Model\RolesUserModel;
use App\Http\Model\UsersModel;
use Closure;

class Auth
{
    public function handle($request, Closure $next)
    {
        $user = UsersModel::find($request->session()->get(ConstConfig::getSessionKey()->ADMIN_USER)->id);/*权限判断*/
        $current_route = $request->route()->getName();/*获取当前路由*/
        $flag = false;
        if ($user != null){
            /*用户->用户角色表->角色表->角色权限表->[权限|路由]列表*/
            $permissionsRoles = $user->rolesUser->roles->permissionsRoles;
            foreach ($permissionsRoles as $pr){
                if ($current_route == $pr->permissions->route_name){
                    $flag = true;
                    break;
                }
            }
        }
        if (!$flag){
            return redirect()->action('\App\Http\Controllers\Admin\ErrorsController@index');
        }
        return $next($request);
    }
}