<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogRequests
{
    public function handle(Request $request, Closure $next)
    {
        $startTime = microtime(true);
        $response = $next($request);
        $endTime = microtime(true);
        $duration = $endTime - $startTime;

        if (config('logging.enable_request_logging')) 
        {
            DB::table('request_logs')->insert([
                'method' => $request->method(),
                'url' => $request->fullUrl(),
                'status_code' => $response->getStatusCode(),
                'response_time' => $duration,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return $response;
    }
}
