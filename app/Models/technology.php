<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Technology extends Model
{
    // Permet d’utiliser les factories pour ce modèle (utile pour tests, seeders, faker etc.)
    use HasFactory;
    // Liste blanche pour éviter les failles de type de Mass Assignment
    protected $fillable = [
        'nom_fr', 'nom_en',
        'description_fr', 'description_en',
        'image'
    ];

    /**
     * Génère automatiquement l'URL publique de l'image.
     * Cette méthode est un accessor Eloquent. 
     * @return string  URL publique complète de l’image
     */
    public function getImageUrlAttribute()
    {
        return Storage::url($this->image);
    }

}
