<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $query = News::where('published_at', '<=', now());

        if ($request->filled('q')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->q . '%')
                  ->orWhere('content', 'like', '%' . $request->q . '%');
            });
        }

        $news = $query->orderBy('published_at', 'desc')->paginate(12);

        return view('frontend.news.index', compact('news'));
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

        return view('frontend.news.show', compact('news', 'relatedNews'));
    }
}
