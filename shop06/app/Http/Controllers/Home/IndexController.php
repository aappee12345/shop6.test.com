<?php

namespace App\Http\Controllers\Home;

use App\Http\Common\ReturnType;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    public function index(){
        return ReturnType::returnCode([],$this->getReturnType(),'home.index');
    }
}
