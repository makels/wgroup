<?php
namespace App\Http\Middleware;

use Closure;

class EnsureUserHasRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $roles = !empty($roles) ? explode(':', $roles[0]) : [];

        if (!is_null(auth()->user()) && in_array($request->user()->role, $roles)) {
            return $next($request);
        }

        return redirect(route('blog'));
    }

}
