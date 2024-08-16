<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class WebGard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        if (Auth::check()) {
            return $next($request);
        } else {
            return redirect()->route('index');
        }
        // echo "I AM IN THE MIDDLE WARE ";
        // return $next($request);
    }

    // public function terminate(Request $request, Response $response):void
    // {
    //     echo '<h1>WE ARE NOW TERMINATING VALID USERS</h1>';
    // }
}
