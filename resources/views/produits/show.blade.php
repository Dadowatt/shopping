@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Détails du produit</h1>

    <div class="card">
        <div class="card-body">
            <h4 class="card-title">{{ $produit->nomProduit }}</h4>
            <p class="card-text"><strong>Prix :</strong> {{ $produit->prix }} €</p>
            <p class="card-text"><strong>Quantité :</strong> {{ $produit->quantite }}</p>
            <p class="card-text"><strong>Stock :</strong>
                @if($produit->quantite >= 1)
                    <span class="badge bg-success">Disponible</span>
                @else
                    <span class="badge bg-danger">Indisponible</span>
                @endif
            </p>
            <p class="card-text"><strong>Catégorie :</strong> {{ $produit->categorie->nomCategorie ?? 'Non définie' }}</p>
        </div>
    </div>

    <a href="{{ route('produits.index') }}" class="btn btn-secondary mt-3">← Retour à la liste</a>
</div>
@endsection
