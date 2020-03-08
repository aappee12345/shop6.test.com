<?php
namespace App\Http\Service;

interface IRolesUserService
{
    public static function addRolesUser($user,$role_id);
    public static function delRolesUser($user_id);
}