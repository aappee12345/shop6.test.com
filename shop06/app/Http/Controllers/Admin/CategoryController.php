<?php

namespace App\Http\Controllers\Admin;

use App\Http\Common\ConstConfig;
use App\Http\Common\RequestValidate;
use App\Http\Common\ReturnType;
use App\Http\Common\ServerResponse;
use App\Http\Model\CategoryModel;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;


class CategoryController extends CommonController
{
    private $category;
    public function __construct(){
        parent::__construct();
        $this->category = new CategoryModel();
    }
    /**
     * 分类列表页面 GET Admin/category
     */
    public function index(){
        $data['tree'] = $tree = $this->category->tree();
        $data['count'] = count($tree);
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.category.index');
    }

    /*POST Admin/category*/
    public function store(CategoryRequest $request){
        $category = CategoryModel::create($request->except('_token'));
        if ($category==null) return ServerResponse::createByErrorMessage('添加失败');
        return ServerResponse::createBySuccessMessage('添加成功');
    }

    /**
     * 分类添加页面 GET Admin/category/create
     */
    public function create(){
        $data['tree'] = $this->category->tree();
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.category.add');
    }

    /*PUT Admin/category/{category}*/
    public function update(Request $request,$id){
        $res = CategoryModel::where('id',$id)->update($request->except('_token','_method'));
        if ($res > 0) return ServerResponse::createBySuccessMessage('修改成功');
        return ServerResponse::createByErrorMessage('修改失败');
    }

    /**
     * 分类修改页面 GET Admin/category/{id}/edit
     */
    public function edit($id){
        if (!RequestValidate::checkGetParam($id)) return ServerResponse::createByErrorMessage('参数错误');
        $data['tree'] = $this->category->tree();
        $data['info'] = CategoryModel::find($id);
        if ($data['info']==null){
            return ServerResponse::createByErrorMessage('参数ID错误，该分类不存在');
        }
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.category.edit');
    }

    /*DELETE Admin/category/{category}*/
    /**
     * 分类删除
     * @param $id
     * @return false|string
     */
    public function destroy($id){
        return $this->commonDelete($this->category->getTable(),$id);
    }

    public function changeOrder(Request $request){
        return $this->commonChangeField($request,$this->category->getTable(),$this->category->getPrimaryKey(),$this->category->getOrderField());
    }
}
