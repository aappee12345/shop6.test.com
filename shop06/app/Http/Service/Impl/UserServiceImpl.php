<?php
namespace App\Http\Service\Impl;


use App\Http\Common\ConstConfig;
use App\Http\Common\ServerResponse;
use App\Http\Model\UsersModel;
use App\Http\Requests\UsersRequest;
use App\Http\Service\IUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;


class UserServiceImpl implements IUserService
{
    /**
     * 处理登录
     * @param Request $request
     * @return false|string
     */
    public static function doLogin(Request $request){
        $where = ['username'=>$request->input('username')];
        $user = UsersModel::where($where)->first();
        if ($user == null){
            return ServerResponse::createByErrorMessage('用户名错误！');
        }
        if (Crypt::decrypt($user->password) != $request->input('password')){
            return ServerResponse::createByErrorMessage('密码错误！');
        }
        /*写入session*/
        $user->password = null;
        $request->session()->put(ConstConfig::getSessionKey()->ADMIN_USER,$user);
        return ServerResponse::createBySuccessMessageData('登录成功',$user);
    }

    public static function updatePassword(UsersRequest $request, $user)
    {
        /*处理修改密码*/
        /*
        $user_id = $request->session()->get(ConstConfig::getSessionKey()->ADMIN_USER)->id;//查询session
        $user = UserModel::find($user_id);//获取当前用户
        */
        if ($request->input('password')==Crypt::decrypt($user->password)){
            /*原密码正确 执行修改*/
            //
            $user->password = Crypt::encrypt($request->input('newPass'));
            $user->save();
            return ServerResponse::createBySuccessMessage('修改成功');
        }else{
            return ServerResponse::createByErrorMessage('原密码不正确');
        }
    }

}