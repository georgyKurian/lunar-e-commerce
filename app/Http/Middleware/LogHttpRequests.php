<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class LogHttpRequests
{
    public function handle(Request $request, Closure $next)
    {
        // Log the incoming request
        Log::info('Incoming Request', [
            'url' => $request->fullUrl(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'input' => $request->all(),
        ]);

        /** @var Response */
        $response = $next($request);

        // Log the outgoing response
        Log::info('Outgoing Response', [
            'response' => $response,
            'content' => $response->getContent(),
        ]);

        return $response;
    }
}
