<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LatestNewsController;
use App\Http\Controllers\JudgmentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\CategoryPageController;
use App\Http\Controllers\TagPageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthorPageController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\JudgmentController as AdminJudgmentController;
use App\Http\Controllers\Admin\InterviewController as AdminInterviewController;
use App\Http\Controllers\Admin\LatestNewsController as AdminLatestNewsController;
use App\Http\Controllers\Admin\OpinionController as AdminOpinionController;
use App\Http\Controllers\Admin\AuthorController as AdminAuthorController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\TagController as AdminTagController;
use App\Http\Controllers\Admin\AdvertisementController as AdminAdvertisementController;

// ─── Frontend Routes ──────────────────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/latest-news', [LatestNewsController::class, 'index'])->name('latest-news');
Route::get('/latest-news/{slug}', [LatestNewsController::class, 'show'])->name('latest-news.show');
Route::get('/judgments', [JudgmentController::class, 'index'])->name('judgments');
Route::get('/judgments/{slug}', [JudgmentController::class, 'show'])->name('judgments.show');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/interviews', [InterviewController::class, 'index'])->name('interviews');
Route::get('/interviews/{slug}', [InterviewController::class, 'show'])->name('interviews.show');
Route::get('/opinions', [OpinionController::class, 'index'])->name('opinions');
Route::get('/opinions/{slug}', [OpinionController::class, 'show'])->name('opinions.show');
Route::get('/search', [SearchController::class, 'index'])->name('search');
Route::get('/category/{slug}', [CategoryPageController::class, 'show'])->name('category.show');
Route::get('/tag/{slug}', [TagPageController::class, 'show'])->name('tag.show');
Route::get('/author/{slug}', [AuthorPageController::class, 'show'])->name('author.show');

// ─── Admin Auth ───────────────────────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// ─── Admin Panel (auth protected) ─────────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('articles',      AdminArticleController::class);
    Route::resource('judgments',     AdminJudgmentController::class);
    Route::resource('interviews',    AdminInterviewController::class);
    Route::resource('latest-news',   AdminLatestNewsController::class);
    Route::resource('opinions',      AdminOpinionController::class);
    Route::resource('authors',       AdminAuthorController::class);
    Route::resource('categories',    AdminCategoryController::class);
    Route::resource('tags',          AdminTagController::class);
    Route::resource('advertisements', AdminAdvertisementController::class);
});
