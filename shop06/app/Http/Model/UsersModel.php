<?php
namespace App\Http\Model;

use App\Http\Common\ConstConfig;
use App\Http\Requests\UsersRequest;
use App\Http\Service\Impl\UserServiceImpl;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Foundation\Auth\User as Authenticatable;
//use Spatie\Permission\Traits\HasRoles;

class UsersModel extends Model
{
//    use HasRoles;

    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $foreignKey = 'user_id';
    public $incrementing = true;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $fillable = ['password'];/*可以被批量赋值的属性 [ protected $guarded = ['price'];不可批量赋值的属性。]*/

    public function rolesUser(){
        return $this->hasOne('App\Http\Model\RolesUserModel',$this->foreignKey);
    }

    public static function updatePwd(UsersRequest $request){
        $user_id = $request->session()->get(ConstConfig::getSessionKey()->ADMIN_USER)->id;/*查询session*/
        $user = UserModel::find($user_id);/*获取当前用户*/
        return UserServiceImpl::updatePassword($request,$user);
    }
}