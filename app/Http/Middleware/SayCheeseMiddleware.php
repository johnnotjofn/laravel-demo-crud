<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SayCheeseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
//        dump("Hello World");
        return $next($request);
//        return new JsonResponse([
//            'data' => 'Hello',
//        ]);
    }

    public function terminate($request, $response)
    {
//        dump("Bye");
    }
}
