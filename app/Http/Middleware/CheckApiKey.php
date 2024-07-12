<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ApiKey;

class CheckApiKey
{
    public function handle($request, Closure $next)
    {
        $apiKey = $request->header('x-api-key');

        if (!$apiKey) {
            return response()->json(['message' => 'API Key is missing'], 401);
        }

        $key = ApiKey::where('key', $apiKey)->first();

        if (!$key) {
            return response()->json(['message' => 'Invalid API Key'], 401);
        }

        $request->user = $key->user;

        return $next($request);
    }
}

