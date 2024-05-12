<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class CacheResponseMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Cache::has($this->cacheKey($request))) {
            $cachedContent = Cache::get($this->cacheKey($request));
            $response = new Response($cachedContent);
            $response->headers->set('Cache-Control', 'public, max-age=2592000'); // Set cache control header
            return $response;
        }

        return $next($request);
    }

    /**
     * Handle tasks after the response has been sent to the browser.
     */
    public function terminate(Request $request, Response $response): void
    {
        if (!Cache::has($this->cacheKey($request))) {
            Cache::put($this->cacheKey($request), $response->getContent(), 2592000);
        }
    }

    private function cacheKey($request)
    {
        return md5($request->fullUrl() . '-' . '254majed');
    }
}
