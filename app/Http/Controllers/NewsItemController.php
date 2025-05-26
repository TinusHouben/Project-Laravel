<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsItemController extends Controller
{
    public function __construct()
    {
        // Voor index en show hoef je niet ingelogd te zijn
        $this->middleware('auth')->except(['index', 'show']);

        // Alleen admins mogen create en store routes gebruiken
        $this->middleware('is_admin')->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index()
    {
        $newsItems = NewsItem::orderByDesc('published_at')->get();
        return view('news.index', compact('newsItems'));
    }

    public function show(NewsItem $newsItem)
    {
        return view('news.show', compact('newsItem'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'content' => 'required|string',
            'published_at' => 'required|date',
        ]);

        $path = $request->file('image')->store('news_images', 'public');

        NewsItem::create([
            'title' => $validated['title'],
            'image_path' => $path,
            'content' => $validated['content'],
            'published_at' => $validated['published_at'],
        ]);

        return redirect()->route('news.index')->with('success', 'Nieuwsitem toegevoegd!');
    }

    // Voeg hier eventueel nog edit, update en destroy methodes toe
}
