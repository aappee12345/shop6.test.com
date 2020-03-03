<?php

namespace App\Http\Model;

use App\Http\Service\Impl\CategoryServiceImpl;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'category';/*表名*/
    protected $primaryKey = 'id';/*主键*/
    protected $pid = 'parent_id';
    protected $orderField = 'sort_order';
    public $incrementing = true; /*主键递增*/
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $guarded = [];

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @return string
     */
    public function getPrimaryKey(): string
    {
        return $this->primaryKey;
    }

    /**
     * @return string
     */
    public function getOrderField(): string
    {
        return $this->orderField;
    }
    /**
     * 该分类的子分类
     */
    public function child(){
        return $this->hasMany(get_class($this), $this->pid, $this->getKeyName());
    }

    /**
     * 该分类的父分类
     */
    public function parent(){
        return $this->hasOne(get_class($this), $this->getKeyName(), $this->pid);
    }

    public function tree($pid=0){
        $categoryList = $this->orderBy($this->orderField,'Desc')->get();
        return CategoryServiceImpl::getTree($categoryList,$pid,$this->primaryKey,$this->pid);
    }

}
