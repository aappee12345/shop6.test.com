<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class LinkTypeModel extends Model
{
    protected $table = 'link_type';/*表名*/
    protected $primaryKey = 'id';/*主键*/
    public $incrementing = true; /*主键递增*/
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $guarded = [];
}
