<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;



Route::get('/home', function () {
    return view('welcome');
});

// Route::resource('produits', ProduitController::class);
// Route::resource('categories', CategorieController::class);

Route::get('/', function () {
    return redirect()->route('produits.index');
});

// Routes Produits
Route::resource('produits', ProduitController::class);

// Routes Catégories
Route::resource('categories', CategorieController::class);