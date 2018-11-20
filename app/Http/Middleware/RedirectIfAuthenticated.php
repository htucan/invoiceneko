<?php

namespace App\Http\Middleware;

use App\Library\Poowf\Unicorn;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $routeKey = Unicorn::getCompanyKey();
            dd($routeKey);
            return redirect()->route('dashboard', ['company' => $routeKey]);
        }

        return $next($request);
    }
}
