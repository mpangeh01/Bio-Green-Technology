<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, ...$allowedRoles)
    {
        // Check if user is logged in
        if (Auth::check()) {
            // Check if user's role matches any allowed roles
            $user = Auth::user();
            foreach ($allowedRoles as $role) {
                if ($user->role === $role) {
                    return $next($request);
                }
            }
        }

        // Redirect or deny access
        return redirect()->back()->with('status', 'Not Authorised');
    }
}
