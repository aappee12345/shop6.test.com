<?php

namespace App\Http\Requests;

use App\Http\Common\ServerResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    /**
     * 验证失败处理
     *
     * @param object $validator
     * @return false|string|void
     */
    public function failedValidation($validator)
    {
        $error = $validator->errors()->first();
        $response = response()->json(json_decode(ServerResponse::createByErrorMessage($error),true));
        throw new HttpResponseException($response);
    }
}
