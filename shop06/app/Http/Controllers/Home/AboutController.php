<?php
namespace App\Http\Controllers\Home;

use App\Http\Common\ConstConfig;
use App\Http\Common\ReturnType;
use App\Http\Model\ArticleModel;
use App\Http\Model\CategoryModel;

class AboutController extends BaseController
{
    public function index($cid = 0){
        if ($cid == 0){
            $cate = CategoryModel::where('parent_id',100062)->first();
            $cid = $cate->id;
        }
        $data['info'] = ArticleModel::where('article_cat_id',$cid)->first();
        $data['aboutcatelist'] = CategoryModel::where('parent_id',100062)->get();
        return ReturnType::returnCode($data,ConstConfig::getReturnType()->HOME_HTML,'home.about.index');
    }
}