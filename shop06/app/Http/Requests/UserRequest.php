<?php

namespace App\Http\Requests;

class UserRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => 'required',
            'newPass' => 'required|between:5,20|confirmed'
        ];
    }


    public function messages(){
        return [
            'password.required' => '请填写原密码',
            'newPass.required'  => '请填写新密码',
            'newPass.between'   => '密码长度必须为5~20位',
            'newPass.confirmed' => '两次密码输入不一致'
        ];
    }

}
