<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     * Accepts a comma separated list of allowed role ids, e.g. '1,2'
     */
    public function handle(Request $request, Closure $next, string $roles = null)
    {
        $user = $request->user();

        if (! $user) {
            abort(403);
        }

        if (is_null($roles) || $roles === '') {
            // if no roles provided, deny access
            abort(403);
        }

        $allowed = array_map('trim', explode(',', $roles));

        if (! in_array((string) $user->role_id, $allowed, true)) {
            abort(403);
        }

        return $next($request);
    }
}
