<?php

// app/Models/Ec.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ec extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'nom', 'coefficient', 'ue_id'
    ];

    public function ue()
    {
        return $this->belongsTo(UE::class,'ue_id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }
}
