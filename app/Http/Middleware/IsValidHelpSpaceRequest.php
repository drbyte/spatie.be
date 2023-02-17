<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IsValidHelpSpaceRequest
{
    public function handle(Request $request, Closure $next): Response
    {
        $payloadJson = $request->getContent();

        $expectedSignature = hash_hmac(
            'sha256',
            $payloadJson,
            config('services.helpSpace.secret')
        );
        $validRequest = $request->header('signature') === $expectedSignature;

        if (! $validRequest) {
            abort(Response::HTTP_FORBIDDEN, 'Invalid HelpSpace request');
        }

        return $next($request);
    }
}
