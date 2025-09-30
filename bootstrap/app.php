<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Illuminate\Foundation\Configuration\Middleware $middleware) {
    $middleware->alias([
        'auth' => \App\Http\Middleware\Authenticate::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'prevent-back-history' => \App\Http\Middleware\PreventBackHistory::class,
    ]);

    // Apply globally (runs on every request)
    $middleware->append(\App\Http\Middleware\PreventBackHistory::class);
})

    ->withExceptions(function (Illuminate\Foundation\Configuration\Exceptions $exceptions) {
        //
    })
    ->create();
