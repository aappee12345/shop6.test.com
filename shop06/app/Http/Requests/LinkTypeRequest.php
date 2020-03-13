<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LinkTypeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function messages(){
        return [
            'name.required' => '请填写友情链接分类名称',
        ];
    }
}
