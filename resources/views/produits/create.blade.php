@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un produit</h2>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('produits.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nomProduit" class="form-label">Nom du produit</label>
            <input type="text" class="form-control" name="nomProduit" id="nomProduit" value="{{ old('nomProduit') }}">
        </div>

        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <input type="number" class="form-control" step="0.01" name="prix" id="prix" value="{{ old('prix') }}">
        </div>

        <div class="mb-3">
            <label for="quantite" class="form-label">Quantité</label>
            <input type="number" class="form-control" name="quantite" id="quantite" value="{{ old('quantite') }}">
        </div>

        <div class="mb-3">
            <label for="idCategorie" class="form-label">Catégorie</label>
            <select name="idCategorie" id="idCategorie" class="form-select">
                <option value="" disabled selected>-- Choisir une catégorie --</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ old('idCategorie') == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nomCategorie }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">En stock ?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stock" value="1" checked>
                <label class="form-check-label">Oui</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="stock" value="0">
                <label class="form-check-label">Non</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</div>
@endsection
