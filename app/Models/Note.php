<?php
// app/Models/Note.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id', 'ec_id', 'note', 'session', 'date_evaluation'
    ];

    protected $casts = [
        'date_evaluation' => 'date', // Cast le champ en date
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function ec()
    {
        return $this->belongsTo(Ec::class);
    }
}
