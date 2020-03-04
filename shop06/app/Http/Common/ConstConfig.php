<?php
namespace App\Http\Common;

class ConstConfig{
    private static $cateTreePrev = '|--';
    private static $ftpInfo = [
        'HOST' => 'http://img.test.com',
        'ROOT' => '/shop06/'
    ];
    private static $sessionKey = [
        'ADMIN_USER' => 'admin_user',
        'VCODE' => 'vcode',
        'WEB' => 'web'
    ];
    public static $guard_name = [
        'ADMIN' => 'Admin',
        'WEB'   => 'Web',
        'API'   => 'Api'
    ];
    private static $returnType = [
        'ADMIN_JSON' => 'json',
        'ADMIN_HTML' => 'html',
        'HOME_JSON'  => 'json',
        'HOME_HTML'  => 'html'
    ];
    private static $pageNum = [
        'HOME_PAGE_NUM' => 10,
        'HOME_PIC_PAGE_NUM' => 9,
        'ADMIN_PAGE_NUM' => 10
    ];
    public static function getCateTreePrev(){ return self::$cateTreePrev; }
    public static function getGuardName(){ return json_decode(json_encode(self::$guard_name)); }
    public static function getFtpInfo(){ return json_decode(json_encode(self::$ftpInfo)); }
    public static function getPageNum(){ return json_decode(json_encode(self::$pageNum)); }
    public static function getReturnType(){ return json_decode(json_encode(self::$returnType)); }
    public static function getSessionKey(){ return json_decode(json_encode(self::$sessionKey)); }
}