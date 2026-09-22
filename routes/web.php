<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Landing');
});

Route::get('/articles', function () {
    return Inertia::render('Articles');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Admin/Dashboard');
    })->name('admin.dashboard');

    Route::get('/products', function () {
        return Inertia::render('Admin/Products/Index');
    })->name('admin.products');

    Route::get('/articles', function () {
        return Inertia::render('Admin/Articles/Index');
    })->name('admin.articles');

    Route::get('/settings', function () {
        return Inertia::render('Admin/Settings/Index');
    })->name('admin.settings');
});
