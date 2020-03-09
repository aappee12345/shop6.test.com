<?php
namespace App\Http\Controllers\Admin;

use App\Http\Common\ConstConfig;
use App\Http\Common\RequestValidate;
use App\Http\Common\ReturnType;
use App\Http\Common\ServerResponse;
use App\Http\Model\MemberModel;
use App\Http\Requests\MemberRequest;
use App\Http\Service\Impl\MemberServiceImpl;
use Illuminate\Http\Request;

class MemberController extends CommonController
{
    public function index(Request $request){
        $data = MemberModel::getMemberList($request);
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.member.member_list');
    }

    public function edit($id){
        $id = (int)$id;
        if (!RequestValidate::checkGetParam($id)) return ServerResponse::createByErrorMessage('参数错误');
        $data['info'] = MemberModel::find($id);
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.member.member_edit');
    }

    public function update(MemberRequest $request, $id){
        $request->scene('edit')->validate();
        return MemberModel::updateMember($request,$id);
    }

    public function destroy($id){
        return MemberServiceImpl::delMember($id);
    }
}
