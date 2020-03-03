<?php
namespace App\Http\Controllers\Home;

use App\Http\Common\ConstConfig;
use App\Http\Common\ReturnType;
use App\Http\Model\ArticleModel;

class ArticleController extends BaseController
{
    /**
     * 新闻列表
     * @param $cid
     * @return false|\Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function index($cid = 0)
    {
        $data['list'] = ArticleModel::getArticleList($cid,ConstConfig::getPageNum()->HOME_PAGE_NUM);
        return ReturnType::returnCode($data,ConstConfig::getReturnType()->HOME_HTML,'home.news');
    }

    /**
     * 文章详情
     * @param $id
     */
    public function show($id)
    {
        $data['info'] = ArticleModel::find($id);
        return ReturnType::returnCode($data,ConstConfig::getReturnType()->HOME_HTML,'home.news_content');
    }
}
