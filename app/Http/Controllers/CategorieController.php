<?php

namespace App\Http\Controllers;

use App\Models\categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categorie::orderBy('nomCategorie')->get();
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomCategorie' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Categorie::create([
            'nomCategorie' => $request->nomCategorie,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(categorie $categorie)
    {
        return view('categories.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categorie $categorie)
    {
        return view('categories.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, categorie $categorie)
    {
        $request->validate([
            'nomCategorie' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $categorie->update([
            'nomCategorie' => $request->nomCategorie,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categorie $categorie)
    {
        $categorie->delete();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée.');
    }
}
