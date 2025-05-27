<?php

namespace App\Http\Controllers;

use App\Models\NewsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsItemController extends Controller
{
    // De middleware is nu niet meer nodig in de constructor
    public function __construct()
    {
        // Middleware wordt in de routes gedefinieerd, niet meer in de controller zelf
    }

    // Toon alle nieuwsitems, gesorteerd op publicatiedatum
    public function index()
    {
        // Verkrijg alle nieuwsitems gesorteerd op publicatiedatum
        $newsItems = NewsItem::orderByDesc('published_at')->get();

        // Retourneer de weergave van de index met de nieuwsitems
        return view('news.index-news', compact('newsItems'));  // index-news.blade.php
    }

    // Toon een specifiek nieuwsitem op de detailpagina
    public function show(NewsItem $newsItem)
    {
        // Retourneer de weergave van het specifieke nieuwsitem
        return view('news.show-news', compact('newsItem'));  // show-news.blade.php
    }

    // Toon het formulier om een nieuw nieuwsitem toe te voegen
    public function create()
    {
        // Retourneer de weergave van het formulier voor het maken van een nieuwsitem
        return view('news.create-news');  // create-news.blade.php
    }

    // Sla een nieuw nieuwsitem op
    public function store(Request $request)
    {
        // Valideer de ingevoerde gegevens
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'content' => 'required|string',
            'published_at' => 'required|date',
        ]);

        // Sla de afbeelding op in de 'public' schijf (disk) onder de map 'news_images'
        $path = $request->file('image')->store('news_images', 'public');

        // Maak het nieuwsitem aan en sla het op in de database
        NewsItem::create([
            'title' => $validated['title'],
            'image_path' => $path,
            'content' => $validated['content'],
            'published_at' => $validated['published_at'],
        ]);

        // Redirect naar de nieuwsindex met een succesbericht
        return redirect()->route('news.index')->with('success', 'Nieuwsitem toegevoegd!');
    }

    // Toon het formulier om een bestaand nieuwsitem te bewerken
    public function edit(NewsItem $newsItem)
    {
        // Retourneer het formulier voor het bewerken van een nieuwsitem
        return view('news.edit-news', compact('newsItem'));  // edit-news.blade.php
    }

    // Werk een bestaand nieuwsitem bij
    public function update(Request $request, NewsItem $newsItem)
    {
        // Valideer de ingevoerde gegevens
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048', // Afbeelding is optioneel voor update
            'content' => 'required|string',
            'published_at' => 'required|date',
        ]);

        // Als er een nieuwe afbeelding is geüpload, sla deze dan op
        if ($request->hasFile('image')) {
            // Verwijder de oude afbeelding van de server
            Storage::disk('public')->delete($newsItem->image_path);
            
            // Sla de nieuwe afbeelding op
            $path = $request->file('image')->store('news_images', 'public');
            $newsItem->image_path = $path; // Update het pad naar de nieuwe afbeelding
        }

        // Werk het nieuwsitem bij met de gevalideerde gegevens
        $newsItem->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'published_at' => $validated['published_at'],
        ]);

        // Redirect naar de nieuwsindex met een succesbericht
        return redirect()->route('news.index')->with('success', 'Nieuwsitem bijgewerkt!');
    }

    // Verwijder een nieuwsitem
    public function destroy(NewsItem $newsItem)
    {
        // Verwijder de afbeelding van de server
        Storage::disk('public')->delete($newsItem->image_path);

        // Verwijder het nieuwsitem uit de database
        $newsItem->delete();

        // Redirect naar de nieuwsindex met een succesbericht
        return redirect()->route('news.index')->with('success', 'Nieuwsitem verwijderd!');
    }
}
