<?php
namespace App\Http\Service;

use App\Http\Requests\UsersRequest;
use Illuminate\Http\Request;

interface IUserService
{
    public static function doLogin(Request $request);
    public static function updatePassword(UsersRequest $request, $user);
    public static function editUser(UsersRequest $request,$user);
}