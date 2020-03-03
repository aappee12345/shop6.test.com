<?php

namespace App\Http\Controllers\Admin;

use App\Http\Common\ConstConfig;
use App\Http\Common\RequestValidate;
use App\Http\Common\ServerResponse;
use App\Http\Controllers\Controller;
use App\Http\Model\ArticleModel;
use App\Http\Model\CategoryModel;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    private $returnType;

    public function __construct()
    {
//        parent::__construct();
        $this->setReturnType(ConstConfig::getReturnType()->ADMIN_HTML);
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

    public function commonChangeField(Request $request,$className='Category',$idField = 'id',$field = 'sort_order'){
        if (!RequestValidate::checkParam($request,[$idField,$field])) return ServerResponse::createByErrorMessage('参数错误');
        $id = $request->input($idField);
        $className = 'App\\Http\\Model\\'.ucwords($className).'Model';
        $object = $className::find($id);
        $object->$field = $request->input($field);
        $object->save();
        return ServerResponse::createBySuccessMessage('排序号修改成功');
    }

    public function commonUpdateAttr(Request $request,$className='Category',$idField = 'id',$field = 'sort_order',$value){
        if (!RequestValidate::checkParam($request,[$idField])) return ServerResponse::createByErrorMessage('参数错误');
        $id = $request->input($idField);
        $className = 'App\\Http\\Model\\'.ucwords($className).'Model';
        $object = $className::find($id);
        $object->$field = $value;
        $object->save();
        return ServerResponse::createBySuccessMessage('排序号修改成功');
    }

    public function commonDelete($className,$id){
        if (!RequestValidate::checkGetParam($id)) return ServerResponse::createByErrorMessage('参数错误');
        $className = 'App\\Http\\Model\\'.ucwords($className).'Model';
        $res = $className::destroy($id);
        if ($res > 0) return ServerResponse::createBySuccessMessage('删除成功');
        return ServerResponse::createByErrorMessage('删除失败');
    }
}
