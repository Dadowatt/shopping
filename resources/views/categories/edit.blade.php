@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Modifier la Catégorie</h2>

    <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nomCategorie" class="form-label">Nom de la Catégorie</label>
            <input type="text" name="nomCategorie" class="form-control" value="{{ $categorie->nomCategorie }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $categorie->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
