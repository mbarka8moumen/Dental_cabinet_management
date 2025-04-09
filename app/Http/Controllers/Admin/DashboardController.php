<?php

namespace App\Http\Controllers\Admin;

use App\Models\Patient;
use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        // Récupérer le total des patients
        $totalPatients = Patient::count();

        // Récupérer le nombre de rendez-vous pour aujourd'hui
        $appointmentsToday = Appointment::whereDate('appointment_date', Carbon::today())->count();

        // Récupérer le nombre total de médecins (car la colonne 'is_available' n'existe pas)
        $availableDoctors = Doctor::count();

        // Retourner la vue avec les données
        return view('admin.adminDashboard', compact('totalPatients', 'appointmentsToday', 'availableDoctors'));
    }
}
