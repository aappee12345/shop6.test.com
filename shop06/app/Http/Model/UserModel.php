<?php


namespace App\Http\Model;


use App\Http\Common\ConstConfig;
use App\Http\Requests\UserRequest;
use App\Http\Service\Impl\UserServiceImpl;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    public $incrementing = true;
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $fillable = ['password'];/*可以被批量赋值的属性 [ protected $guarded = ['price'];不可批量赋值的属性。]*/

    public static function updatePwd(UserRequest $request){
        $user_id = $request->session()->get(ConstConfig::getSessionKey()->ADMIN_USER)->id;/*查询session*/
        $user = UserModel::find($user_id);/*获取当前用户*/
        return UserServiceImpl::updatePassword($request,$user);
    }
}