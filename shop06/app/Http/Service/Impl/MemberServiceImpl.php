<?php


namespace App\Http\Service\Impl;


use App\Http\Common\ConstConfig;
use App\Http\Common\RequestValidate;
use App\Http\Common\ServerResponse;
use App\Http\Model\MemberModel;
use App\Http\Requests\MemberRequest;
use App\Http\Service\IMemberService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class MemberServiceImpl implements IMemberService
{
    public static function getMemberList(Request $request){
        $key = '';
        if ($request->input('key')!=null) $key = $request->input('key');
        $arr['member_list'] =  MemberModel::where('username', 'like', '%' . $key . '%')->orderBy('id','Desc')->paginate(ConstConfig::getPageNum()->ADMIN_PAGE_NUM);
        $arr['count'] = MemberModel::where('username', 'like', '%' . $key . '%')->orderBy('id','Desc')->count();
        $arr['key'] = $key;
        return $arr;
    }

    public static function editMember(MemberRequest $request,$member)
    {
        $member->username = $request->input('username');
        $member->email = $request->input('email');
        $member->question = $request->input('question');
        $member->answer = $request->input('answer');
        $res = $member->save();
        if ($res > 0){
            return ServerResponse::createBySuccessMessage('操作成功');
        }
        return ServerResponse::createByErrorMessage('操作失败');
    }

    public static function delMember($id)
    {
        if (!RequestValidate::checkGetParam($id)) return ServerResponse::createByErrorMessage('参数错误');
        $res = MemberModel::destroy($id);
        if ($res > 0){
            return ServerResponse::createBySuccessMessage('删除成功');
        }
        return ServerResponse::createByErrorMessage('删除失败');
    }

    public static function doLogin(MemberRequest $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $member = MemberModel::where('username',$username)->get()[0];
        if ($member == null){
            return ServerResponse::createByErrorMessage('用户名错误');
        }
        if ($password != Crypt::decrypt($member->password)){
            return ServerResponse::createByErrorMessage('密码错误');
        }
        $member->password = null;
        $request->session()->put(ConstConfig::getSessionKey()->WEB,$member);
        return ServerResponse::createBySuccessMessage('登录成功');
    }

    public static function logOut()
    {
        // TODO: Implement logOut() method.
    }

    public static function doRegistor(MemberRequest $request)
    {
        $member = new MemberModel();
        $member->username = $request->input('username');
        $member->phone = $member->username;
        $member->password = Crypt::encrypt($request->input('password'));
        $member->realname = $request->input('realname');
        $member->qq = $request->input('qq');
        $member->email = $member->qq.'@qq.com';
        return $member->save();
    }

    public static function updatePwd()
    {
        // TODO: Implement updatePwd() method.
    }

    public static function checkAnswer()
    {
        // TODO: Implement checkAnswer() method.
    }

    public static function getQuestion()
    {
        // TODO: Implement getQuestion() method.
    }

    public static function updateForgetPwd()
    {
        // TODO: Implement updateForgetPwd() method.
    }

    public static function getMemberInfo()
    {
        // TODO: Implement getMemberInfo() method.
    }
}