<?php
/**
 * Created by PhpStorm.
 * User: artem.petrov
 * Date: 2019-02-20
 * Time: 15:19
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RegistrationCompleted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::user()->is_registration_completed) {
            return response()->json(['message' => 'Please complete registration'], 400);
        }

        return $next($request);
    }
}
