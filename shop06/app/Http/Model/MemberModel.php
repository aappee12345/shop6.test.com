<?php

namespace App\Http\Model;

use App\Http\Requests\MemberRequest;
use App\Http\Service\Impl\MemberServiceImpl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class MemberModel extends Model
{
    protected $table = 'member';/*表名*/
    protected $primaryKey = 'id';/*主键*/
    public $incrementing = true; /*主键递增*/
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $guarded = [];

    public static function getMemberList(Request $request){
        return MemberServiceImpl::getMemberList($request);
    }

    public static function updateMember(MemberRequest $request,$id){
        $member = MemberModel::find($id);
        return MemberServiceImpl::editMember($request,$member);
    }

}
