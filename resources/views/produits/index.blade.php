@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Liste des produits</h2>
    <a href="{{ route('produits.create') }}" class="btn btn-primary mb-3">Ajouter produit</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Catégorie</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($produits as $produit)
        <tr>
            <td>{{ $produit->nomProduit }}</td>
            <td>{{ $produit->prix }} FCFA</td>
            <td>{{ $produit->quantite }}</td>
            <td>{{ $produit->categorie->nomCategorie ?? 'Non défini' }}</td>
            <td>{{ $produit->stock ? 'Oui' : 'Non' }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
