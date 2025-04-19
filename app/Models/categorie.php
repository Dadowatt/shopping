<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $fillable = ['nomCategorie', 'description'];
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
