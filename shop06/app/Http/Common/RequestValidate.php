<?php


namespace App\Http\Common;




use App\Tool\StringDeal;
use Illuminate\Http\Request;


class RequestValidate
{
    private static $status;

    /**
     * @return mixed
     */
    public static function getStatus()
    {
        return self::$status;
    }

    /**
     * @param mixed $status
     */
    public static function setStatus($status): void
    {
        self::$status = $status;
    }

    /**
     * 检测Request所传参数是否为规定参数
     * @param Request $request
     * @param $params
     * @return false|string
     */
    public static function checkParam(Request $request,$params){
        if (is_array($params)){
            foreach ($params as $p){
                $param = $request->input($p);
                if (StringDeal::isBlank($param)) return false;/*验证不通过*/
            }
        }
        if (is_string($params)){
            $param = $request->input($params);
            if (StringDeal::isBlank($param)) return false;/*验证不通过*/
        }
        return true;/*验证通过*/
    }

    public static function checkGetParam($params){
        if (is_array($params)){
            foreach ($params as $k=>$p){
                if (StringDeal::isBlank($p)) return false;/*验证不通过*/
            }
        }
        if (is_string($params)){
            if (StringDeal::isBlank($params)) return false;/*验证不通过*/
        }
        return true;/*验证通过*/
    }
}