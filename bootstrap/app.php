<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Enums\Roles;

use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\Customer;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Vendor;
use App\Http\Middleware\Blogger;
use App\Http\Middleware\CheckShop;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            "admin" => Admin::class,
            "user" => UserMiddleware::class,
            "blogger" =>Blogger::class,
            "vendor" =>Vendor::class,
            "customer" =>Customer::class,
            "check.shop" => CheckShop::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
