<?php

namespace App\Http\Controllers\Admin;

use App\Http\Common\ConstConfig;
use App\Http\Common\ReturnType;
use App\Http\Service\Impl\UserServiceImpl;
use Illuminate\Http\Request;
use App\Tool\Vcode;

class LoginController extends CommonController
{
    public function index(Request $request){
        if ($request->isMethod('post')){
            return UserServiceImpl::doLogin($request);/*处理登录*/
        }
        $user = $request->session()->get(ConstConfig::getSessionKey()->ADMIN_USER);
        if ($user!=null){/*登录判断*/
            return redirect()->route('admin.index'); /*已登录 跳转至后台首页*/
        }
        return ReturnType::returnCode([],$this->getReturnType(),'admin.login');
    }

    public function logout(Request $request){
        $request->session()->forget(ConstConfig::getSessionKey()->ADMIN_USER);/*清除SESSION*/
        return redirect('Admin/login/index');
    }

    //生成验证码
    public function captcha() {
        $validateCode = new Vcode;
        return $validateCode->doimg();
    }
}
