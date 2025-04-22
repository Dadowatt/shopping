@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Liste des Catégories</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Ajouter une Catégorie</a>

    <table class="table table-bordered">
        <thead>
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
                    <a href="{{ route('categories.edit', $categorie->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-fill"></i>
                    </a>
                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Supprimer cette catégorie ?')"><i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
