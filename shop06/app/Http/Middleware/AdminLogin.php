<?php

namespace App\Http\Middleware;

use App\Http\Common\ConstConfig;
use Closure;

class AdminLogin
{
    public function handle($request, Closure $next)
    {
        $user = $request->session()->get(ConstConfig::getSessionKey()->ADMIN_USER);
        if ($user == null){
            return redirect()->route('admin.login');
        }
        return $next($request);
    }
}
