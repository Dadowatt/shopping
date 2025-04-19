@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Liste des catégories</h1>

    <a href="{{ route('categories.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle"></i> Ajouter une catégorie
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $categorie)
                <tr>
                    <td>{{ $categorie->id }}</td>
                    <td>{{ $categorie->nomCategorie }}</td>
                    <td>{{ $categorie->description }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $categorie) }}" class="btn btn-primary btn-sm">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <form action="{{ route('categories.destroy', $categorie) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Aucune catégorie trouvée.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
