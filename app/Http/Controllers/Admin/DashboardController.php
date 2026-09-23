<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Product;
use App\Models\PageVisit;
use App\Models\Lead;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Dashboard', [
            'totalProducts' => Product::count(),
            'totalArticles' => Article::count(),
            'totalVisits' => PageVisit::count(),
            'newOrders' => Lead::count(),
            'recentProducts' => Product::latest()->take(5)->get(),
            'recentArticles' => Article::latest()->take(5)->get(),
        ]);
    }
}
