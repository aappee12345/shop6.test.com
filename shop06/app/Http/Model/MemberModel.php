<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class MemberModel extends Model
{
    protected $table = 'member';/*表名*/
    protected $primaryKey = 'id';/*主键*/
    public $incrementing = true; /*主键递增*/
    const CREATED_AT = 'create_time';
    const UPDATED_AT = 'update_time';
    protected $guarded = [];
}
