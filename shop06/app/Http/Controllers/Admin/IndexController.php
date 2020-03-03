<?php

namespace App\Http\Controllers\Admin;

use App\Http\Common\ConstConfig;
use App\Http\Common\ReturnType;
use Illuminate\Http\Request;

class IndexController extends CommonController
{
    //
    public function index(){
        return ReturnType::returnCode([],$this->getReturnType(),'admin.index');
    }
}
