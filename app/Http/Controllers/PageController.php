<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use App\Models\PageVisit;
use App\Models\Lead;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function index()
    {
        PageVisit::create([
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        $products = Product::latest()->take(20)->get();
        $articles = Article::latest()->take(3)->get();
        
        return Inertia::render('Landing', [
            'products' => $products,
            'articles' => $articles,
        ]);
    }

    public function articles()
    {
        $articles = Article::latest()->paginate(9);
        
        return Inertia::render('Articles', [
            'articles' => $articles,
        ]);
    }


    public function submitLead(Request $request)
    {
        // Honeypot check: If the hidden field is filled, it's a bot.
        if ($request->filled('company_website')) {
            // Silently pretend it was successful so the bot doesn't know
            return redirect()->back()->with('success', 'Pesanan Anda telah diterima.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string',
        ]);

        Lead::create($validated);

        return redirect()->back()->with('success', 'Pesanan Anda telah diterima. Kami akan segera menghubungi Anda!');
    }
}
