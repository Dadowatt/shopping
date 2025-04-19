<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    protected $table = 'produits'; // Ensure this table name matches your DB table

    // Define the inverse of the relationship
    public function categorie()
    {
        // 'idCategorie' is the foreign key in the 'produits' table
        return $this->belongsTo(Categorie::class, 'idCategorie');
    }

}
