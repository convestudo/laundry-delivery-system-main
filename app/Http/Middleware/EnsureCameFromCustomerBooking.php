<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCameFromCustomerBooking
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $referer = $request->headers->get('referer');

        // Allow only if came from /customer-booking
        if ($referer && str_contains($referer, '/customer-booking')) {
            return $next($request);
        }

        // Otherwise redirect or abort
        return redirect('/customer-booking')->with('error', 'Access denied. Please start from the booking page.');
    }
}
