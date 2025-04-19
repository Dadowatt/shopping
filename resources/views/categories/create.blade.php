@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Ajouter une catégorie</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nomCategorie" class="form-label">Nom de la catégorie</label>
            <input type="text" name="nomCategorie" id="nomCategorie" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description (facultatif)</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Enregistrer</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Retour</a>
    </form>
</div>
@endsection
