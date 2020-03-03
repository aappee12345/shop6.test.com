<?php
namespace App\Http\Service\Impl;

use App\Http\Common\ConstConfig;
use App\Http\Service\ICategoryService;

class CategoryServiceImpl implements ICategoryService
{
    /**
     * 获取自关联递归分类树信息
     * @param Object $Object 所有分类数据对象
     * @param int $parent_id 父级分类ID
     * @param array $ids object对象内所有ID值得集合 初始化为空
     * @param array $arr 需要返回的列表数组 初始化为空
     * @return array
     */
    public static function getTree(Object $Object,$parent_id=0,$field_id='id',$field_pid='parent_id',$lv=0,$ids=[],$arr=[]){
        if (empty($ids)) foreach ($Object as $o){ $ids[] = $o->$field_pid; }
            foreach ($Object as $k=>$vo){
                if ($vo->$field_pid==$parent_id){
                    for ($i = 0;$i < $lv;$i++){ $vo->pre .= ConstConfig::getCateTreePrev(); }
                    $arr[] = $vo;
                    if (in_array($vo->$field_id,$ids)) $arr = self::getTree($Object,$vo->$field_id,$field_id,$field_pid,$lv+1,$ids,$arr);
                }
            }
        return $arr;
    }
}