@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des produits</h1>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('produits.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Ajouter un produit
    </a>

    <div class="d-flex justify-content-between">
         {{-- Filtrage par catégorie --}}
    <form method="GET" action="{{ route('produits.index') }}" class="mb-4">
                <select name="categorie_id" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Toutes les catégories --</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ $categorieId == $categorie->id ? 'selected' : '' }}>
                            {{ $categorie->nomCategorie }}
                        </option>
                    @endforeach
                </select> 
    </form>

    <form method="get" action="{{ route('produits.index') }}" class="mb-3 d-flex gap-2">
    <input type="text" name="search" id="search-produit" class="form-control" placeholder="Rechercher un produit..." style="max-width: 300px;" value="{{ request('search') }}" />
    <button type="submit" class="btn btn-primary">Filtrer</button>
    </form>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Catégorie</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produits as $produit)
                <tr>
                    <td>{{ $produit->nomProduit }}</td>
                    <td>{{ $produit->prix }} FCFA</td>
                    <td>{{ $produit->quantite }}</td>
                    <td>{{ $produit->categorie->nomCategorie ?? 'Non défini' }}</td>
                    <td>
                        @if($produit->quantite >= 1)
                            <span class="badge bg-success">Disponible</span>
                        @else
                            <span class="badge bg-danger">Indisponible</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('produits.show', $produit) }}" class="btn btn-secondary">
                            <i class="bi bi-eye"></i>
                        </a>
                        <a href="{{ route('produits.edit', $produit) }}" class="btn btn-primary">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('produits.destroy', $produit) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer ce produit ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Aucun produit trouvé.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
