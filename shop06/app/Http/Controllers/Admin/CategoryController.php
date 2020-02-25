<?php

namespace App\Http\Controllers\Admin;

use App\Http\Common\RequestValidate;
use App\Http\Common\ServerResponse;
use App\Http\Model\CategoryModel;
use App\Http\Requests\CategoryRequest;
use App\Http\Service\Impl\CategoryServiceImpl;
use Illuminate\Http\Request;


class CategoryController extends CommonController
{
    /*GET Admin/category*/
    /**
     * 分类列表页面
     */
    public function index(){
        $tree = CategoryModel::tree();
        $count = count($tree);
        return view('admin.category.index',compact('tree','count'));
    }

    /*POST Admin/category*/
    public function store(CategoryRequest $request){
        $category = CategoryModel::create($request->except('_token'));
        if ($category==null) return ServerResponse::createByErrorMessage('添加失败');
        return ServerResponse::createBySuccessMessage('添加成功');
    }

    /*GET Admin/category/create*/
    /**
     * 分类添加页面
     */
    public function create(){
        $tree = CategoryModel::tree();
        return view('admin.category.add',compact('tree'));
    }

    /*PUT Admin/category/{category}*/
    public function update(Request $request){
        $res = CategoryModel::where('id',$request->input('id'))->update($request->except('_token','_method'));
        if ($res > 0) return ServerResponse::createBySuccessMessage('修改成功');
        return ServerResponse::createByErrorMessage('修改失败');
    }

    /*GET Admin/category/{category}/edit*/
    public function edit($id){
        if (!RequestValidate::checkGetParam($id)) return ServerResponse::createByErrorMessage('参数错误');
        $tree = CategoryModel::tree();
        $data = CategoryModel::find($id);
        return view('admin.category.edit',compact('tree','data'));
    }

    /*DELETE Admin/category/{category}*/
    public function destroy($id){
        if (!RequestValidate::checkGetParam($id)) return ServerResponse::createByErrorMessage('参数错误');
        $res = CategoryModel::destroy($id);
        if ($res > 0) return ServerResponse::createBySuccessMessage('删除成功');
        return ServerResponse::createByErrorMessage('删除失败');
    }

    public function changeOrder(Request $request){
        if (!RequestValidate::checkParam($request,['id','sort_order'])) return ServerResponse::createByErrorMessage('参数错误');
        $id = $request->input('id');
        $category = CategoryModel::find($id);
        $category->sort_order = $request->input('sort_order');
        $category->save();
        return ServerResponse::createBySuccessMessage('排序号修改成功');
    }
}
