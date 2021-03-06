<?php
namespace App\Http\Model;

use App\Http\Common\ConstConfig;
use App\Http\Service\Impl\ArticleServiceImpl;
use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    protected $table = 'article';/*表名*/
    protected $primaryKey = 'article_id';/*主键*/
    private $foreignKey = 'article_cat_id';
    private $orderField = 'article_sort';
    public $incrementing = true; /*主键递增*/
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $guarded = [];

    public function getTable(){ return $this->table; }
    public function getPrimaryKey(){ return $this->primaryKey; }
    public function getForeignKey(){ return $this->foreignKey; }
    public function getOrderField(){ return $this->orderField; }
    /**
     * 获得该文章的所属分类。
     */
    public function category(){
        return $this->belongsTo('App\Http\Model\CategoryModel',$this->foreignKey);
    }

    public static function getArticleList($cid=0,$length,$field='*'){
        return ArticleServiceImpl::getArticleList($cid,$length,$field);
    }
}
