<?php

namespace App\Http\Controllers\Home;

use App\Http\Common\ConstConfig;
use App\Http\Common\ReturnType;
use App\Http\Requests\MemberRequest;
use App\Http\Service\Impl\MemberServiceImpl;
use Illuminate\Http\Request;

class MemberController extends BaseController
{
    public function index(){
        //$request->session()->get(ConstConfig::getSessionKey()->WEB,$member);
        return view('home.member.member_center');
    }

    public function info(){
        return view('home.member.zhanghuxinxi');
    }
    /*登录*/
    public function login(MemberRequest $request){
        $request->scene('login')->validate();
        $res = MemberServiceImpl::doLogin($request);
        $obj = json_decode($res)->status;
        if ($obj->status == 0){/*登录成功*/
            return redirect('home/member/index');
        }else{/*登录失败*/
            $data = '登录失败！';
            return ReturnType::returnCode($data,$this->getReturnType(),'home.error.index');
        }
        if ($res){
            return redirect('home/member/index');
        }
        return redirect('home/index');
    }

    /*注册*/
    public function registor(MemberRequest $request){
        $request->scene('registor')->validate();
        $res = MemberServiceImpl::doRegistor($request);
        $data = '注册失败！';
        if ($res) $data = '注册成功！';
        return ReturnType::returnCode($data,$this->getReturnType(),'home.error.index');
    }
}
