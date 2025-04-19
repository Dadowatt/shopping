@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Liste des catégories</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Ajouter une catégorie</a>

    @if($categories->count())
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $categorie)
                <tr>
                    <td>{{ $categorie->nomCategorie }}</td>
                    <td>{{ $categorie->description }}</td>
                    <td>
                        <a href="{{ route('categories.show', $categorie->id) }}" class="btn btn-sm btn-secondary">Voir</a>
                        <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-sm btn-warning">Modifier</a>
                        <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Confirmer la suppression ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Aucune catégorie disponible.</p>
    @endif
</div>
@endsection
