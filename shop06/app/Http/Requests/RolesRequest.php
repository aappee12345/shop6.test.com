<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolesRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'required|unique:roles',
            //'permissions' =>'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => '请填写角色名称',
            'name.unique' => '角色名称不能重复',
            //'permissions.required' => '请选择所有权限',
        ];
    }
}
