@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des produits</h1>

    <a href="{{ route('produits.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Ajouter un produit
    </a>

    {{-- Filtrage par catégorie --}}
    <form method="GET" action="{{ route('produits.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <select name="categorie_id" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Toutes les catégories --</option>
                    @foreach($categories as $categorie)
                        <option value="{{ $categorie->id }}" {{ $categorieId == $categorie->id ? 'selected' : '' }}>
                            {{ $categorie->nomCategorie }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </form>

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
                    <td>{{ $produit->prix }} €</td>
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
