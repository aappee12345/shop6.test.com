<?php


namespace App\Http\Common;


class ResponseCode
{
    private static $code = [
        'SUCCESS' => 0,
        'ERROR' => 1,
        'NEEDLOGIN'=> 10,
        'ILLEGAL_ARGUMENT' => 2,
    ];

    private static $desc = [
        'SUCCESS' => 'SUCCESS',
        'ERROR' => 'ERROR',
        'NEEDLOGIN'=> 'NEEDLOGIN',
        'ILLEGAL_ARGUMENT' => 'ILLEGAL_ARGUMENT',
    ];

    private static $codeToDesc = [
      0 => 'SUCCESS',
      1 => 'ERROR',
      2 => 'NEEDLOGIN',
      10 => 'ILLEGAL_ARGUMENT',
    ];

    /**
     * @return mixed
     */
    public static function getCode()
    {
        return json_decode(json_encode(self::$code));
    }

    /**
     * @return mixed
     */
    public static function getDesc()
    {
        return json_decode(json_encode(self::$desc));
    }

    public static function getCodeToDesc()
    {
        return json_decode(json_encode(self::$codeToDesc));
    }

}