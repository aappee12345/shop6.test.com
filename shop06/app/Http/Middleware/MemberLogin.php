<?php


namespace App\Http\Middleware;


use App\Http\Common\ConstConfig;
use Closure;

class MemberLogin
{
    public function handle($request, Closure $next)
    {
        $user = $request->session()->get(ConstConfig::getSessionKey()->WEB);
        if ($user == null){
            return redirect()->route('home.index');
        }
        return $next($request);
    }
}