<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InstructorVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->role !== 'instructor') {
            abort(403, 'Unauthorized access.');
        }

        if (!auth()->user()->is_verified) {
            return redirect()->route('instructor.verify')->with('error', 'Your instructor account is pending verification.');
        }

        return $next($request);
    }
}
