<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBuyerRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (session(['user']!==null)){
            if (auth()->check() && auth()->user()->role !== 'buyer') {
                Auth::logout();
                return redirect()->route('dashboard')->withErrors('شما دسترسی به این بخش ندارید.');
            }
        }


        return $next($request);
    }
}
