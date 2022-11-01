<?php

namespace App\Http\Middleware;

use App\Models\Card;
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
        if (auth()->check() && auth()->user()->is_provider&& Card::where('user_id', auth()->id())->exists()) {
            return $next($request);
        } else {
            if(!auth()->check()){
                return to_route('login');
            }if(auth()->user()->is_provider){
                return to_route('serviceprovider.register');
            }
        }
    }
}
