<?php
namespace App\Http\Controllers\Home;

use App\Http\Common\ConstConfig;
use App\Http\Common\ReturnType;
use App\Http\Model\ArticleModel;
use App\Http\Model\CategoryModel;

class NewsController extends BaseController
{
    /**
     * 新闻列表
     * @param $cid
     * @return false|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function index($cid = 0)
    {
        $field = ['article_id','article_fulltitle','article_desc','update_time'];
        $data['list'] = ArticleModel::getArticleList($cid,ConstConfig::getPageNum()->HOME_PAGE_NUM,$field);
        $data['newscatelist'] = CategoryModel::where('parent_id',100061)->get();
        return ReturnType::returnCode($data,ConstConfig::getReturnType()->HOME_HTML,'home.news.index');
    }

    /**
     * 文章详情
     * @param $id
     */
    public function show($id)
    {
        $data['info'] = ArticleModel::find($id);
        $data['newscatelist'] = CategoryModel::where('parent_id',100061)->get();
        return ReturnType::returnCode($data,ConstConfig::getReturnType()->HOME_HTML,'home.news.content');
    }
}
