<?php

namespace App\Http\Requests;

use App\Rules\IsMobile;

class MemberRequest extends BaseRequest
{
    public $autoValidate = false;
    public $scenes = [
        'edit' => 'username,email,phone',
        'login' => 'username,password',
        'registor' => 'username,password,realname,qq'
    ];


    public function rules()
    {
        return [
            'username' => 'required',
            'email' => ['required','email'],
            'realname' => 'required',
            'qq' => 'required',
            'password' => 'required',
            'phone' => ['required',new IsMobile],
        ];
    }

    public function messages(){
        return [
            'username.required' => '请填写用户名',
            'email.required' => '请填写邮箱',
            'email.email' => '邮箱格式不正确',
            'realname.required' => '请填写真实姓名',
            'qq.required' => '请填写QQ号',
            'password.required' => '请填写密码',
            'phone.required' => '请填写手机号',
            'phone.mobile' => '手机号码格式不正确',
        ];
    }
}
