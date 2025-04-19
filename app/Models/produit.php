<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    protected $fillable = [
        'nomProduit',
        'prix',
        'quantite',
        'categorie_id',
        'stock',
    ];

    // Define the inverse of the relationship
    public function categorie()
    {
        // 'idCategorie' is the foreign key in the 'produits' table
        return $this->belongsTo(Categorie::class);
    }

}
