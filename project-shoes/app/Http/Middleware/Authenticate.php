<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
       if(!Auth::check()){
           return redirect()->route('admin.login');

       }
       $user = Auth::user();
       
       $route = $request->route()->getName();
       //$user->can($route);
       if ($user->cant($route)) {
        return redirect()->route('admin.error',['code'=>403]);
       }
       return $next($request);
    }
}
