<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Enums\Roles;
use App\Models\User;
use Symfony\Component\HttpFoundation\Response;

class Blogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!\Illuminate\Support\Facades\Auth::check() || \Illuminate\Support\Facades\Auth::user()->role != Roles::Blogger){
            return redirect()->route("home")->with('error', 'You do not have admin access.');
        }

        return $next($request);
    }
}
