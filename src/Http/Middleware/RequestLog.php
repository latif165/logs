<?php

namespace Ds\Logs\Http\Middleware;

use Closure;
use Ds\Logs\Models\ApiRequestLog;
use Illuminate\Http\Request;

class RequestLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $requestLog = [];
        $requestLog['uri'] = $request->getUri();
        $requestLog['method'] = $request->getMethod();
        $requestLog['request_body'] = json_encode($request->except('password'));
        $requestLog['response'] = $response->getContent();
        ApiRequestLog::create($requestLog);
        
        return $response;
    }
}
