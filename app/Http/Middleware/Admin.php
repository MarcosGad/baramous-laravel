<?php

namespace baramous\Http\Middleware;

use Closure;
use Auth;
class Admin
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
        if(Auth::user()){

            if (!Auth::user()->admin) {
                
                return redirect()->back() ;
            }
            return $next($request);

        }else{

            return redirect()->route('index');
        }
    }
}
