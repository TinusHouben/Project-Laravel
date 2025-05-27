<?php

namespace App\Http\Controllers;

use App\Models\FaqCategory;
use App\Models\FaqItem;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // Toon alle FAQ-categorieën met hun vragen (publiek)
    public function index()
    {
        $categories = FaqCategory::with('items')->get();
        return view('faq.index', compact('categories'));
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

        FaqCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('faq.index')->with('success', 'Categorie succesvol toegevoegd!');
    }

    // Toon formulier om een nieuw FAQ-item aan te maken (admin)
    public function createItem()
    {
        $categories = FaqCategory::all();
        return view('faq.create-item', compact('categories'));
    }

    // Sla nieuw FAQ-item op (admin)
    public function storeItem(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'faq_category_id' => 'required|exists:faq_categories,id',
        ]);

        FaqItem::create([
            'question' => $request->question,
            'answer' => $request->answer,
            'faq_category_id' => $request->faq_category_id,
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ item succesvol toegevoegd!');
    }
}
