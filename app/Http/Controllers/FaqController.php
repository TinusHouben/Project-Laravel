<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    // Toon de FAQ-pagina met vaste tekst
    public function index()
    {
        return view('faq.index'); // Laad gewoon de view zonder database-interactie
    }

    // Toon formulier om een nieuwe FAQ-categorie aan te maken (admin)
    public function createCategory()
    {
        return view('faq.create-category');
    }

    // Sla nieuwe FAQ-categorie op (admin)
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:faq_categories,name',
        ]);

        // Hier maak je geen gebruik van de database
        // FaqCategory::create([
        //     'name' => $request->name,
        // ]);

        return redirect()->route('faq.index')->with('success', 'Categorie succesvol toegevoegd!');
    }

    // Toon formulier om een nieuw FAQ-item aan te maken (admin)
    public function createItem()
    {
        return view('faq.create-item');
    }

    // Sla nieuw FAQ-item op (admin)
    public function storeItem(Request $request)
    {
        // Validatie en opslaan in de database is niet nodig voor vaste tekst
        // FaqItem::create([
        //     'question' => $request->question,
        //     'answer' => $request->answer,
        //     'faq_category_id' => $request->faq_category_id,
        // ]);

        return redirect()->route('faq.index')->with('success', 'FAQ item succesvol toegevoegd!');
    }
}

