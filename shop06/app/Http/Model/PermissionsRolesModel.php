<?php
namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class PermissionsRolesModel extends Model
{
    protected $table = 'permissions_roles';

    public function permissions(){
        return $this->belongsTo('App\Http\Model\PermissionsModel','permission_id');
    }
}