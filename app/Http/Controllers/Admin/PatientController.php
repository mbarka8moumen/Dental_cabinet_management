<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Afficher la liste des patients
    public function index()
    {
        $patients = Patient::all(); // Récupérer tous les patients
        return view('admin.patients.index', compact('patients'));
    }

    // Afficher le formulaire de création d'un patient
    public function create()
    {
        return view('admin.patients.create');
    }

    // Enregistrer un nouveau patient
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'service' => 'required',
        ]);

        Patient::create([
            'name' => $request->name,
            'age' => $request->age,
            'city' => $request->city,
            'address' => $request->address,
            'phone' => $request->phone,
            'service' => $request->service,
        ]);

        return redirect()->route('admin.patients.index');
    }

    // Afficher le formulaire d'édition d'un patient
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('admin.patients.edit', compact('patient'));
    }

    // Mettre à jour un patient
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric',
            'city' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'service' => 'required',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update([
            'name' => $request->name,
            'age' => $request->age,
            'city' => $request->city,
            'address' => $request->address,
            'phone' => $request->phone,
            'service' => $request->service,
        ]);

        return redirect()->route('admin.patients.index');
    }

    // Supprimer un patient
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect()->route('admin.patients.index');
    }
}
