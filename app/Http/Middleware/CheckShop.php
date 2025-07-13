<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckShop
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            
            // Check if user has no shops and is not already on the create-first-shop route
            if ($user->shops()->count() == 0 && !$request->routeIs('shops.create') && !$request->routeIs('shops.store')) {
                // Check if the current route is not related to shop creation
                if (!$request->routeIs('shops.*')) {
                    return redirect()->route('shops.create')
                        ->with('info', 'Please create your first shop to get started!');
                }
            }
        }

        return $next($request);
    }
}
