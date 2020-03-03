<?php


namespace App\Http\Service\Impl;


use App\Http\Common\ConstConfig;
use App\Http\Model\ArticleModel;
use App\Http\Model\CategoryModel;
use App\Http\Service\IArticleService;

class ArticleServiceImpl implements IArticleService
{

    public static function PrevAndNextArticle($id)
    {

    }

    public static function getSpecTypeArticle($type, $length)
    {

    }

    public static function getArticleList($cid=0,$length=10)
    {
        if ($cid == 0){
            return ArticleModel::orderBy('article_sort','Desc')->paginate($length);
        }
        return ArticleModel::where('article_cat_id',$cid)->orderBy('article_sort','Desc')->paginate($length);
    }

}