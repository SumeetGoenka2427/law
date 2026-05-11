<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LatestNewsController;
use App\Http\Controllers\JudgmentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\InterviewController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/latest-news', [LatestNewsController::class, 'index'])->name('latest-news');
Route::get('/judgments', [JudgmentController::class, 'index'])->name('judgments');
Route::get('/judgments/{id}', [JudgmentController::class, 'show'])->name('judgments.show');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/interviews', [InterviewController::class, 'index'])->name('interviews');
