<?php

namespace App\Http\Requests;

use App\Http\Common\ServerResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    public $scenes = [];
    public $currentScene;
    public $autoValidate = true;
    public $extendRules;

    public function authorize()
    {
        return true;
    }

    /**
     * 验证失败处理
     * @param object $validator
     */
    public function failedValidation($validator)
    {
        $error = $validator->errors()->first();
        $response = response()->json(json_decode(ServerResponse::createByErrorMessage($error),true));
        throw new HttpResponseException($response);
    }

    /**
     * 设置场景
     * @param $scene
     * @return $this
     */
    public function scene($scene)
    {
        $this->currentScene = $scene;
        return $this;
    }

    /**
     * 使用扩展rule
     * @param string $name
     * @return object $this
     */
    public function with($name = '')
    {
        if (is_array($name)) {
            $this->extendRules = array_merge($this->extendRules[], array_map(function ($v) {
                return Str::camel($v);
            }, $name));
        } else if (is_string($name)) {
            $this->extendRules[] = Str::camel($name);
        }

        return $this;
    }

    /**
     * 覆盖自动验证方法
     */
    public function validateResolved()
    {
        if ($this->autoValidate) {
            $this->handleValidate();
        }
    }

    /**
     * 验证方法
     * @param string $scene
     */
    public function validate($scene = '')
    {
        if ($scene) {
            $this->currentScene = $scene;
        }
        $this->handleValidate();
    }

    /**
     * 根据场景获取规则
     */
    public function getRules()
    {
        $rules = $this->container->call([$this, 'rules']);
        $newRules = [];
        if ($this->extendRules) {
            $extendRules = array_reverse($this->extendRules);
            foreach ($extendRules as $extendRule) {
                if (method_exists($this, "{$extendRule}Rules")) {   //合并场景规则
                    $rules = array_merge($rules, $this->container->call(
                        [$this, "{$extendRule}Rules"]
                    ));
                }
            }
        }
        if ($this->currentScene && isset($this->scenes[$this->currentScene])) {
            $sceneFields = is_array($this->scenes[$this->currentScene])
                ? $this->scenes[$this->currentScene] : explode(',', $this->scenes[$this->currentScene]);
            foreach ($sceneFields as $field) {
                if (array_key_exists($field, $rules)) {
                    $newRules[$field] = $rules[$field];
                }
            }
            return $newRules;
        }
        return $rules;
    }

    /**
     * 覆盖设置 自定义验证器
     * @param object $factory
     * @return
     */
    public function validator($factory)
    {
        return $factory->make(
            $this->validationData(), $this->getRules(),
            $this->messages(), $this->attributes()
        );
    }

    /**
     * 最终验证方法
     */
    protected function handleValidate()
    {
        if (!$this->passesAuthorization()) {
            $this->failedAuthorization();
        }
        $instance = $this->getValidatorInstance();
        if ($instance->fails()) {
            $this->failedValidation($instance);
        }
    }

}
