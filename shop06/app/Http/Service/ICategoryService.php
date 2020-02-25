<?php
namespace App\Http\Service;


interface ICategoryService
{
    public static function getTree(Object $Object,$parent_id,$field_id,$field_pid,$lv,$ids,$arr);
}