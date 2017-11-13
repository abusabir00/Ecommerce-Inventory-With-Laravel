<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Session;
class IsAdminMiddleware
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
        if (Session::get('adminId')) {
            return $next($request);
        } else {
            return redirect('/admin');
        }
    }
}//End IsAdminMiddleware Class.....
