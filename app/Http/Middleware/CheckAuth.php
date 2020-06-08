<?php

namespace App\Http\Middleware;

use Closure;
use Enum\UserRole;
use Illuminate\Support\Facades\Auth;

class CheckAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role == UserRole::ADMINISTRATOR)
        {
            return $next($request);
        }
        return redirect()->route('dashboard', ['user_id' => Auth::user()->id]);
    }
}
