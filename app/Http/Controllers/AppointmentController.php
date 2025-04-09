<?php

    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use App\Models\Appointment;
    use App\Models\Doctor;
    
    class AppointmentController extends Controller
    {
        
        public function index()
        {
            $appointments = Appointment::all();
            $doctors = Doctor::all();
            return view('admin.appointments', compact('appointments', 'doctors'));
        }
    
        public function store(Request $request)
        {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'doctor_id' => 'required|exists:doctors,id',
                'appointment_date' => 'required|date',
                'appointment_time' => 'required|date_format:H:i',
            ]);
    
            Appointment::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'doctor_id' => $request->doctor_id,
                'email' => '',
                'phone' => '',
    
    
                'appointment_date' => $request->appointment_date,
                'appointment_time' => $request->appointment_time,
            ]);
    
            return redirect()->route('admin.appointments')->with('success', 'Appointment added successfully!');
        }
    
        public function edit(Appointment $appointment)
        {
            $doctors = Doctor::all();
            return view('admin.edit_appointment', compact('appointment', 'doctors'));
        }
    
        public function update(Request $request, Appointment $appointment)
        {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'doctor_id' => 'required|exists:doctors,id',
                'appointment_date' => 'required|date',
                'appointment_time' => 'required|date_format:H:i',
            ]);
    
            $appointment->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'doctor_id' => $request->doctor_id,
    
    
                'appointment_date' => $request->appointment_date,
                'appointment_time' => $request->appointment_time,
            ]);
    
            return redirect()->route('admin.appointments')->with('success', 'Appointment updated successfully!');
        }
    
        public function destroy(Appointment $appointment)
        {
            $appointment->delete();
            return redirect()->route('admin.appointments')->with('success', 'Appointment deleted successfully!');
        }
    
    

    // Afficher le formulaire de réservation pour un utilisateur
    public function showForm()
    {
        return view('book');
    }

    // Enregistrer la réservation d'un utilisateur
    public function bookAppointment(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
        ]);

        // Enregistrer le rendez-vous
        Appointment::create($request->all());

        // Message flash pour le succès
        session()->flash('success', 'Votre rendez-vous a été réservé avec succès!');
        return redirect()->route('book');
    }

    }