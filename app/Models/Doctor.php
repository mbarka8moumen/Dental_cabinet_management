<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'age', 'city', 'phone_number',
    ];

    // Relation : un docteur peut avoir plusieurs rendez-vous
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    // Si tu veux obtenir uniquement les docteurs disponibles aujourd'hui (exemple fictif)
    public static function availableToday()
    {
        // Logique personnalisée ici, par exemple :
        return self::all(); // à adapter selon ta logique métier
    }
}
