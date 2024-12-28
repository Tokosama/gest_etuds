<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    // Les attributs qui peuvent être remplis via des formulaires
    protected $fillable = [
        'numero_etudiant',
        'nom',
        'prenom',
        'niveau',
    ];

    /**
     * Relation avec le modèle Note.
     * Un étudiant peut avoir plusieurs notes.
     */
    public function notes()
    {
        return $this->hasMany(Note::class, 'etudiant_id');
    }
}

