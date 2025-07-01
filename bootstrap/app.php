<?php

use App\Http\Middleware\CheckAdminRole;
use App\Http\Middleware\CheckBuyerRole;
use App\Http\Middleware\CheckLoginRole;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'check.admin' => CheckAdminRole::class,
            'check.buyer' => CheckBuyerRole::class,
            'check.login' => CheckLoginRole::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
