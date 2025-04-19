@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Modifier le produit</h1>

    <form action="{{ route('produits.update', $produit) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nomProduit" class="form-label">Nom du produit</label>
            <input type="text" name="nomProduit" id="nomProduit" class="form-control" value="{{ $produit->nomProduit }}" required>
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" step="0.01" name="prix" id="prix" class="form-control" value="{{ $produit->prix }}" required>
        </div>

        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" name="quantite" id="quantite" class="form-control" value="{{ $produit->quantite }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Stock</label>
            <input type="text" id="stock" name="stock" class="form-control" readonly value="{{ $produit->quantite >= 1 ? 'Disponible' : 'Indisponible' }}">
        </div>

        <div class="mb-3">
            <label for="categorie_id" class="form-label">Catégorie</label>
            <select name="categorie_id" id="categorie_id" class="form-select" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $produit->categorie_id == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nomCategorie }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Modifier</button>
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
