<?php
namespace App\Http\Controllers\Home;


use App\Http\Common\ConstConfig;
use App\Http\Common\ReturnType;

class CustomController extends BaseController
{
    public function index(){
        $data = [];
        return ReturnType::returnCode($data,ConstConfig::getReturnType()->HOME_HTML,'home.custom.index');
    }

    public function cooper(){
        $data = [];
        return ReturnType::returnCode($data,ConstConfig::getReturnType()->HOME_HTML,'home.custom.cooper');
    }
}