<?php

use Filament\Facades\Filament;
use Illuminate\Auth\Access\AuthorizationException;
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
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
        $exceptions->renderable(function (AuthorizationException $e, $request) {
            if (Filament::hasPanels() && $request->is(Filament::getCurrentPanel()->getPath() . '/*')) {
                return response()->view('errors.403', [], 403);
            }
        });

        $exceptions->renderable(function (AuthorizationException $e, $request) {
            if (Filament::hasPanels() && $request->is(Filament::getCurrentPanel()->getPath() . '/*')) {
                return response()->view('errors.404' [], 404);
            }
        });
    })->create();
