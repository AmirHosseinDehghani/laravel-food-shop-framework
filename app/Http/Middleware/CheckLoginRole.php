<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLoginRole
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( empty(session('user'))) {
            return redirect()->route('login')->withErrors('شما اول باید وارد حساب کاربری شوید. اگر حساب ندارید ثبت نام کنید.');
        }
        return $next($request);
    }
}
