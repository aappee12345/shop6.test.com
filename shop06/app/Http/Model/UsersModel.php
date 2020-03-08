<?php
namespace App\Http\Model;

use App\Http\Common\ConstConfig;
use App\Http\Requests\UsersRequest;
use App\Http\Service\Impl\UserServiceImpl;
use Illuminate\Database\Eloquent\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $foreignKey = 'user_id';
    public $incrementing = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $fillable = ['password','username','email'];/*可以被批量赋值的属性 [ protected $guarded = ['price'];不可批量赋值的属性。]*/

    public function rolesUser(){
        return $this->hasOne('App\Http\Model\RolesUserModel','user_id');
    }

    public static function updatePwd(UsersRequest $request){
        $user_id = $request->session()->get(ConstConfig::getSessionKey()->ADMIN_USER)->id;/*查询session*/
        $user = UsersModel::find($user_id);/*获取当前用户*/
        return UserServiceImpl::updatePassword($request,$user);
    }

    public static function saveUser(UsersRequest $request,$user = null){
        return UserServiceImpl::editUser($request,$user);
    }
}