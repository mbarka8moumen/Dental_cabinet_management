<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Appointment extends Model
{
    use HasFactory;

    // Indique les colonnes de la table qui peuvent être remplis massivement
    protected $fillable = [
        'first_name', 'last_name', 'email', 'phone', 'appointment_date', 'appointment_time',
    ];

    // Définir la relation entre les rendez-vous et les médecins (si vous avez cette relation)
    public function doctor()
    {
        return $this->belongsTo(Doctor::class); // Relation avec le modèle Doctor
    }

    // Vous pouvez aussi ajouter une méthode pour obtenir les rendez-vous d'aujourd'hui :
    public static function getAppointmentsForToday()
    {
        return self::whereDate('appointment_date', Carbon::today())->get();
    }
    

public function patient()
{
    return $this->belongsTo(Patient::class);
}

}

