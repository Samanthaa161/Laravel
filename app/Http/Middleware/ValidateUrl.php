<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidateUrl
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->has('title') || empty($request->title)) {
            return redirect('/')
                ->with('error', 'Invalid URL or missing film title');
        }

        return $next($request);
    }
}
