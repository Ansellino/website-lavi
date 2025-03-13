<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\URL;

class PreloadAssets
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if ($request->path() === '/' && !$request->ajax() && !$request->wantsJson()) {
            // Use headers->set() instead of header()
            $response->headers->set('Link', '<' . URL::asset('images1/banner.webp') . '>; rel=preload; as=image', false);

            // Preload first 4 product images
            for ($i = 1; $i <= 4; $i++) {
                $response->headers->set('Link', '<' . URL::asset("images1/{$i}.webp") . '>; rel=preload; as=image', false);
            }
        }

        return $response;
    }
}
