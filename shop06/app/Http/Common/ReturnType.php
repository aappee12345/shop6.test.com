<?php


namespace App\Http\Common;


class ReturnType
{
    public static function returnCode($data='',$type='json',$url='',$msg=''){
        switch ($type){
            case 'json':
                return ServerResponse::createBySuccessMessageData($msg,$data);
                break;
            case 'html':
                return view($url,compact('data'));
                break;
        }
    }
}