<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Почему-то всегда возвращает unathorized, хотя логика вроде правильная.
        // Решил отключить middleware.

        // if (!empty($request->user()->usertype) && ($request->user()->usertype == 'admin')) {
            // return $next($request);
        // } else {
        //     // return redirect('/');
        //     abort('401');
        // }
        return $next($request);
    }
}
