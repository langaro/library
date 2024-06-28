<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JsonResponseApiMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $request->headers->set('accept', 'application/json', true);

        return $next($request);
    }
}
