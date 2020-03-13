<?php
namespace App\Http\Controllers\Admin;

use App\Http\Common\ReturnType;
use App\Http\Model\LinkTypeModel;
use App\Http\Requests\LinkTypeRequest;
use Illuminate\Http\Request;

class LinkTypeController extends CommonController
{
    public function index()
    {
        $data['list'] = $list =  LinkTypeModel::select(['id','name'])->get();
        $data['count'] = LinkTypeModel::select(['id','name'])->count();
        return ReturnType::returnCode($data,$this->getReturnType(),'admin.link_type.index');
    }

    public function create()
    {
        //
    }

    public function store(LinkTypeRequest $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(LinkTypeRequest $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
