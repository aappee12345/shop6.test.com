<?php
namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class RolesModel extends Model
{
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $incrementing = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    protected $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany(PermissionsModel::class);
    }

    public function givePermission(PermissionsModel $permission)
    {
        return $this->permissions()->save($permission);
    }
}