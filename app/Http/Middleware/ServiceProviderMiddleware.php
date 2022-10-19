<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ServiceProviderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()&& auth()->user()->is_provider)
        {
            return $next($request);
        }
        else{
            abort(403,"You can't acces this page");
        }

    }
}
