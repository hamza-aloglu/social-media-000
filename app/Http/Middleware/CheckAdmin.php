<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check())
        {
            $userRoles  = Auth::user()->roles->pluck('name');
            if (!$userRoles->contains('admin') && Auth::id() !== 1 )
            {
                return redirect(route('loginadmin'))->with('error', 'You do not have permission');
            }
            return $next($request);
        }
        return redirect(route('loginadmin'))->with('error', 'Please login');

    }
}
