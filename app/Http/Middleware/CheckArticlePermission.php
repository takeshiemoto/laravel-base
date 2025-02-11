<?php

namespace App\Http\Middleware;

use App\Models\Article;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckArticlePermission
{
    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next, string $ability): Response
    {
        if (!$request->user()->can($ability, Article::class)) {
            return response()->json([
                'message' => 'Permission denied.'
            ], 403);
        }

        return $next($request);
    }
}
