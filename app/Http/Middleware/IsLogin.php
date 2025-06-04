<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class IsLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if(Auth::check()){
            return $next($request);
            $response->headers->set('Content-Security-Policy', "script-src 'self';"); // Atur sesuai kebutuhan
        }
        return redirect('login')->withErrors('Silakan Login Terlebih Dahulu');
    }
}
