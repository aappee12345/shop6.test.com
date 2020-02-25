<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    protected $table = 'article';/*表名*/
    protected $primaryKey = 'article_id';/*主键*/
    public $incrementing = true; /*主键递增*/
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $guarded = [];

    /**
     * 获得该文章的所属分类。
     */
    public function category()
    {
        return $this->belongsTo('App\Http\Model\CateogoryModel','article_cat_id');
    }
}
