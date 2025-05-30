@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Ajouter un produit</h1>

    <form action="{{ route('produits.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nomProduit" class="form-label">Nom du produit</label>
            <input type="text" name="nomProduit" id="nomProduit" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" step="0.01" name="prix" id="prix" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" name="quantite" id="quantite" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="text" id="stock" name="stock" class="form-control" readonly>
        </div>

        <div class="mb-3">
            <label for="categorie_id" class="form-label">Catégorie</label>
            <select name="categorie_id" id="categorie_id" class="form-select" required>
                <option value="">-- Choisir une catégorie --</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nomCategorie }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Enregistrer</button>
        <a href="{{ route('produits.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>

<script>
    document.getElementById('quantite').addEventListener('input', function () {
        const stockField = document.getElementById('stock');
        const quantite = parseInt(this.value);
        stockField.value = quantite >= 1 ? 'Disponible' : 'Indisponible';
    });
</script>
@endsection
