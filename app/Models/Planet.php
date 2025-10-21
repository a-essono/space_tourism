<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    // Permet d’utiliser les factories pour ce modèle (utile pour tests, seeders, faker etc.)
    use HasFactory;
    // Liste blanche pour éviter les failles de type de Mass Assignment
    protected $fillable = [
    'nom_fr', 'nom_en',
    'description_fr', 'description_en',
    'distance_fr', 'distance_en',
    'duree_fr', 'duree_en',
    'image'
];
}
