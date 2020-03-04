<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class PermissionsModel extends Model
{
    protected $table = 'permissions';
    protected $primaryKey = 'id';
    public $incrementing = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $guarded = [];

    public function roles()
    {
        return $this->belongsToMany(RolesModel::class);
    }
}
