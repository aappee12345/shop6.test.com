<?php


namespace App\Http\Service\Impl;


use App\Http\Common\ServerResponse;
use App\Http\Model\RolesUserModel;
use App\Http\Service\IRolesUserService;

class RolesUserServiceImpl implements IRolesUserService
{

    public static function addRolesUser($user,$role_id)
    {
        $rolesUser = new RolesUserModel();
        $rolesUser->user_id = $user->id;
        $rolesUser->role_id = $role_id;
        $res = $rolesUser->save();
        if ($res > 0){
            return ServerResponse::createBySuccess();
        }
    }

    public static function delRolesUser($user_id)
    {
        $res = RolesUserModel::where('user_id', $user_id)->delete();/*删除roleUser*/
        if ($res > 0){
            return ServerResponse::createBySuccessMessage('删除成功');
        }
        return ServerResponse::createByErrorMessage('删除失败');
    }
}