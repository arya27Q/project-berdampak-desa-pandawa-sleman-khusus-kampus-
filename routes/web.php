<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthController;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/articles', [PageController::class, 'articles'])->name('articles.index');
Route::post('/lead', [PageController::class, 'submitLead'])->name('lead.submit')->middleware('throttle:10,1');

Route::prefix('admin-pandawa')->group(function () {
    Route::middleware('guest')->controller(AuthController::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login')->middleware('throttle:5,1');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::resource('products', \App\Http\Controllers\Admin\ProductController::class)->except(['show'])->names('admin.products');
        Route::resource('articles', \App\Http\Controllers\Admin\ArticleController::class)->except(['show'])->names('admin.articles');

        Route::get('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.settings');
        Route::post('/settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.settings.update');
    });
});
