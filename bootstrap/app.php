<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware(['web', 'auth', 'role:super-admin'])
                ->prefix('super')
                ->group(base_path('routes/super.php'));

            Route::middleware(['web', 'auth', 'role:coordinator|super-admin'])
                ->prefix('coordinator')
                ->group(base_path('routes/coordinator.php'));

            Route::middleware(['web', 'auth', 'role:teacher|super-admin'])
                ->prefix('teacher')
                ->group(base_path('routes/teacher.php'));

            Route::middleware(['web', 'auth', 'role:administrator|super-admin'])
                ->prefix('administrator')
                ->group(base_path('routes/administrator.php'));


        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
