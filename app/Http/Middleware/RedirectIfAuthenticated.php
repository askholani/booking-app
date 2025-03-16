<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            // dd($user->role);

            return match ($user->role->name) {
                'admin' => redirect()->route('admin.booking.index'),
                'customer' => redirect()->route('customer.index'),
            };
        }

        return $next($request);
    }
}
