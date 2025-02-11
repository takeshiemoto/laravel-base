<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'check.article.permission:create'])->group(function () {
    Route::post('/articles', [ArticleController::class, 'store']);
});

// 認証不要のルート
Route::post('/login', [LoginController::class, 'login'])->name('login');

// 認証必要のルート
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
