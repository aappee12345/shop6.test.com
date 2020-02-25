<?php


namespace App\Http\Common;


class ConstConfig
{
    private static $sessionKey = [
        'ADMIN_USER' => 'admin_user',
        'VCODE' => 'vcode',
        'USER' => 'user'
    ];

    /**
     * @return array
     */
    public static function getSessionKey()
    {
        return json_decode(json_encode(self::$sessionKey));
    }

}