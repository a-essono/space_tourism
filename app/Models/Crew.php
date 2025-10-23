<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    // Permet d’utiliser les factories pour ce modèle (utile pour tests, seeders, faker etc.)
    use HasFactory;
    // Liste blanche pour éviter les failles de type de Mass Assignment
    protected $fillable = [
        'role_fr', 'role_en',
        'description_fr', 'description_en',
        'nom',
        'image'
    ];
}
