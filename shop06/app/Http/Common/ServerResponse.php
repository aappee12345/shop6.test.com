<?php


namespace App\Http\Common;


class ServerResponse
{
    private static $status;
    private static $msg;
    private static $data;

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
     * @return mixed
     */
    public static function getMsg()
    {
        return self::$msg;
    }

    /**
     * @param mixed $msg
     */
    public static function setMsg($msg): void
    {
        self::$msg = $msg;
    }

    /**
     * @return mixed
     */
    public static function getData()
    {
        return self::$data;
    }

    /**
     * @param mixed $data
     */
    public static function setData($data): void
    {
        self::$data = $data;
    }

    public static function isSuccess(){
        return self::$code == ResponseCode::getCode()->SUCCESS;
    }

    public static function createBySuccess(){
        self::setStatus(ResponseCode::getCode()->SUCCESS);
        return json_encode(['status'=>self::getStatus()]);
    }

    public static function createBySuccessMessage($msg){
        self::setStatus(ResponseCode::getCode()->SUCCESS);
        self::setMsg($msg);
        return json_encode(['status'=>self::getStatus(),'msg'=>$msg]);
    }

    public static function createBySuccessData($data){
        self::setStatus(ResponseCode::getCode()->SUCCESS);
        self::setData($data);
        return json_encode(['status'=>self::getStatus(),'data'=>$data]);
    }

    public static function createBySuccessMessageData($msg,$data){
        self::setStatus(ResponseCode::getCode()->SUCCESS);
        self::setData($msg);
        self::setData($data);
        return json_encode(['status'=>self::getStatus(),'msg'=>$msg,'data'=>$data]);
    }

    public static function createByError(){
        self::setStatus(ResponseCode::getCode()->ERROR);
        return json_encode(['status'=>self::getStatus()]);
    }

    public static function createByErrorMessage($msg){
        self::setStatus(ResponseCode::getCode()->ERROR);
        self::setMsg($msg);
        return json_encode(['status'=>self::getStatus(),'msg'=>$msg]);
    }

    public static function createByErrorCodeMessage($status,$msg){
        return json_encode(['status'=>$status,'msg'=>$msg]);
    }


}