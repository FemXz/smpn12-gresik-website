<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::where('published_at', '<=', now());

        // ✅ Search by q
        if ($request->filled('q')) {
            $search = $request->q;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('content', 'like', '%' . $search . '%')
                  ->orWhere('category', 'like', '%' . $search . '%');
            });
        }

        // ✅ Filter by category (optional)
        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        // Paginate
        $news = $query->orderBy('published_at', 'desc')->paginate(12);

        return view('information.news.index', compact('news'));
    }

    public function show($slug)
    {
        $news = News::where('slug', $slug)->firstOrFail();
        $news->increment('view_count');

        $relatedNews = News::where('id', '!=', $news->id)
            ->where('category', $news->category)
            ->where('published_at', '<=', now())
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('information.news.show', compact('news', 'relatedNews'));
    }
}
