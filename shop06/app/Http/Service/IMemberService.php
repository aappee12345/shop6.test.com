<?php


namespace App\Http\Service;


use App\Http\Requests\MemberRequest;
use Illuminate\Http\Request;

interface IMemberService
{
    public static function getMemberList(Request $request);
    public static function editMember(MemberRequest $request,$member);
    public static function delMember($id);
    public static function doLogin(MemberRequest $request);
    public static function logOut();
    public static function doRegistor(MemberRequest $request);
    public static function updatePwd();
    public static function checkAnswer();
    public static function getQuestion();
    public static function updateForgetPwd();
    public static function getMemberInfo();

}