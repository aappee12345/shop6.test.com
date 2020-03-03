<?php

namespace App\Http\Controllers\Home;


use App\Http\Common\ConstConfig;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    private $returnType;

    public function __construct(){
        $this->setReturnType(ConstConfig::getReturnType()->HOME_HTML);
    }

    /**
     * @return mixed
     */
    public function getReturnType()
    {
        return $this->returnType;
    }

    /**
     * @param mixed $returnType
     */
    public function setReturnType($returnType)
    {
        $this->returnType = $returnType;
    }

}
