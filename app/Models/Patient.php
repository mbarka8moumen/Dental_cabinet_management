<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // Les champs qu'on peut remplir automatiquement
    protected $fillable = [
        'name', 'age', 'city', 'address', 'phone', 'service',
    ];

    // Si un patient peut avoir plusieurs rendez-vous (relation optionnelle)
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}


