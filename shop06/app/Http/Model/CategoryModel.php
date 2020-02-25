<?php

namespace App\Http\Model;

use App\Http\Service\Impl\CategoryServiceImpl;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'category';/*表名*/
    protected $primaryKey = 'id';/*主键*/
    public $incrementing = true; /*主键递增*/
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $guarded = [];

    /**
     * 该分类的子分类
     */
    public function child(){
        return $this->hasMany(get_class($this), 'parent_id', $this->getKeyName());
    }

    /**
     * 该分类的父分类
     */
    public function parent(){
        return $this->hasOne(get_class($this), $this->getKeyName(), 'parent_id');
    }

    public static function tree(){
        $categoryList = self::orderBy('sort_order','desc')->get();
        return CategoryServiceImpl::getTree($categoryList,0,'id','parent_id');
    }

}
