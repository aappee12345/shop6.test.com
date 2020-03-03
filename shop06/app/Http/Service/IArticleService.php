<?php


namespace App\Http\Service;


interface IArticleService
{
    public static function prevAndNextArticle($id);
    public static function getSpecTypeArticle($type,$length);
    public static function getArticleList($cid,$length);
}