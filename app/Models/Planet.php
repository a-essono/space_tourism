<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Planet extends Model
{
    // Permet d’utiliser les factories pour ce modèle (utile pour tests, seeders, faker etc.)
    use HasFactory;
    // Liste blanche pour éviter les failles de type de Mass Assignment
    protected $fillable = [
        'nom_fr',
        'nom_en',
        'description_fr',
        'description_en',
        'distance_fr',
        'distance_en',
        'duree_fr',
        'duree_en',
        'image'
    ];

    /**
     * Nettoie ce qui est stocké
     * Cette méthode est un Mutator Eloquent 
     * @param mixed $value
     * @return void
     */
    public function setImageAttribute($value)
    {
        $this->attributes['image'] = str_replace('/storage/', '', $value);
    }
    
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
