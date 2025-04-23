<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Produit::query();

    // Filtrage par catégorie
    $categorieId = $request->get('categorie_id');
    if ($categorieId) {
        $query->where('categorie_id', $categorieId);
    }

    // Filtrage par nom
    $search = $request->get('search');
    if ($search) {
        $query->where('nomProduit', 'LIKE', '%' . $search . '%');
    }

    $produits = $query->with('categorie')->get(); // ou ->paginate() si tu veux la pagination
    $categories = Categorie::all();

    return view('produits.index', compact('produits', 'categories', 'categorieId'));

    
        $categorieId = $request->input('categorie_id');

        $produits = Produit::with('categorie')
            ->when($categorieId, function ($query, $categorieId) {
                $query->where('categorie_id', $categorieId);
            })
            ->orderBy('nomProduit')
            ->get();

        $categories = Categorie::orderBy('nomCategorie')->get();

        return view('produits.index', compact('produits', 'categories', 'categorieId'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::orderBy('nomCategorie')->get();
        return view('produits.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomProduit' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer|min:0',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        Produit::create([
            'nomProduit' => $request->nomProduit,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'categorie_id' => $request->categorie_id,
            'stock' => $request->quantite >= 1 ? 'Disponible' : 'Indisponible',
        ]);

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        return view('produits.show', compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produit $produit)
    {
        $categories = Categorie::orderBy('nomCategorie')->get();
        return view('produits.edit', compact('produit', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate([
            'nomProduit' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'quantite' => 'required|integer|min:0',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $produit->update([
            'nomProduit' => $request->nomProduit,
            'prix' => $request->prix,
            'quantite' => $request->quantite,
            'categorie_id' => $request->categorie_id,
            'stock' => $request->quantite >= 1 ? 'Disponible' : 'Indisponible',
        ]);

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('produits.index')->with('success', 'Produit supprimé.');
    }
    
}
