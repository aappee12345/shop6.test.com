<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class RolesUserModel extends Model
{
    protected $table = 'roles_user';
    public $timestamps = false;

    public function roles(){
        return $this->belongsTo('App\Http\Model\RolesModel','role_id');
    }
}
