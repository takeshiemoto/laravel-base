<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    /**
     * 記事を作成する
     *
     * @param StoreArticleRequest $request
     * @return JsonResponse
     */
    public function store(StoreArticleRequest $request): JsonResponse
    {
        $user = $request->user();

        $article = Article::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $user->id,
            'organization_id' => $user->organization_id,
        ]);

        return response()->json([
            'message' => '記事を作成しました',
            'article' => $article
        ], 201);
    }
}
