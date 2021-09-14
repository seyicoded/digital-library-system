<?php

namespace App\Http\Middleware;

use Closure;

class user_auth
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
        if(!(isset($_COOKIE[sha1('is_user_signed_in_bidemi_project')]))){
            //echo 'a';
            return redirect(url('/'));
            // echo '1';
            // return $next($request);
        }
        return $next($request);
    }
}
