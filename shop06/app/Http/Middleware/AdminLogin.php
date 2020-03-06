<?php

namespace App\Http\Middleware;

use App\Http\Common\ConstConfig;
use Closure;

class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->session()->get(ConstConfig::getSessionKey()->ADMIN_USER);
        if ($user == null){
            return redirect('Admin/login/index');
        }
        return $next($request);
    }
}
