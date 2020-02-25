<?php

namespace App\Http\Requests;

class ArticleRequest extends BaseRequest
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
            'article_fulltitle' => 'required',
        ];
    }

    public function messages(){
        return [
            'article_fulltitle.required' => '请填写文章标题',
        ];
    }
}
