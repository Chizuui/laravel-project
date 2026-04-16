<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    public function handle(Request $request, Closure $next): Response
    {
        if (($request->age ?? 0) <= 200) {
            return redirect('/login');
        }

        return $next($request);
    }
}