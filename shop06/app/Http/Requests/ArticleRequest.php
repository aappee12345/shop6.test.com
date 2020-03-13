<?php

namespace App\Http\Requests;

class ArticleRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'article_fulltitle' => 'required',
        ];
    }

    public function messages(){
        return [
            'article_fulltitle.required' => '请填写文章标题',
        ];
    }
}
