@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Modifier la catégorie</h1>

    <form action="{{ route('categories.update', $categorie) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nomCategorie" class="form-label">Nom de la catégorie</label>
            <input type="text" name="nomCategorie" id="nomCategorie" class="form-control" value="{{ $categorie->nomCategorie }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (facultatif)</label>
            <textarea name="description" id="description" class="form-control" rows="3">{{ $categorie->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Modifier</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
