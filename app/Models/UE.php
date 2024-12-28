<?php

// app/Models/UniteEnseignement.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UE extends Model
{
    use HasFactory;
    
    protected $table = 'ues'; // Spécifie le nom de la table

    protected $fillable = [
        'code', 'nom', 'credits_ects', 'semestre'
    ];

    public function ecs()
    {
        return $this->hasMany(Ec::class, 'ue_id'); // Note la colonne 'ue_id'  
}

    public function isValidatedBy($etudiantId)
    {
 
        $notes = $this->ecs->flatMap(function ($ec) use ($etudiantId) {
            return $ec->notes->where('etudiant_id', $etudiantId);
        });

        $totalNotes = $notes->sum('note');
        $nombreNotes = $notes->count();
        $nombreEcs = $this->ecs->count();

        if ($nombreNotes == 0 || $nombreNotes < $nombreEcs) {
            return false; // Notes manquantes
        }

        $moyenne = $totalNotes / $nombreNotes;

        return $moyenne >= 10;
    }
}
