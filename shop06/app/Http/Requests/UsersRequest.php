<?php

namespace App\Http\Requests;

class UsersRequest extends BaseRequest
{
    public $autoValidate = false;
    public $scenes = [
        'updatePwd' => 'password,newPass',
        'add' => 'username,password,email,email1',
        'edit' => 'username,email',
    ];


    public function rules()
    {
        return [
            'username' => 'required',
            'password' => 'required',
            'newPass' => 'required|between:5,20|confirmed',
            'email' => 'required|email',
            'email1' => 'unique:users,email',
        ];
    }

    public function messages(){
        return [
            'username.required' => '请填写用户名',
            'email.required' => '请填写邮箱',
            'password.required' => '请填写原密码',
            'newPass.required'  => '请填写新密码',
            'newPass.between'   => '密码长度必须为5~20位',
            'newPass.confirmed' => '两次密码输入不一致'
        ];
    }

}
