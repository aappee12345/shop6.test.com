<?php

namespace App\Http\Requests;

use App\Rules\IsMobile;

class MemberRequest extends BaseRequest
{
    public $autoValidate = false;
    public $scenes = [
        'edit' => 'username,email,phone',
    ];


    public function rules()
    {
        return [
            'username' => 'required',
            'email' => ['required','email'],
            'phone' => ['required',new IsMobile],
        ];
    }

    public function messages(){
        return [
            'username.required' => '请填写用户名',
            'email.required' => '请填写邮箱',
            'email.email' => '邮箱格式不正确',
            'phone.required' => '请填写手机号',
            'phone.mobile' => '手机号码格式不正确',
        ];
    }
}
