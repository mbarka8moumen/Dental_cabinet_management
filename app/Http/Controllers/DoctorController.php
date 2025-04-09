<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Afficher la liste des médecins.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer tous les médecins
        $doctors = Doctor::all();
        
        // Retourner la vue avec la liste des médecins
        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Afficher le formulaire pour ajouter un nouveau médecin.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Retourner la vue pour le formulaire d'ajout d'un médecin
        return view('admin.doctors.create');
    }

    /**
     * Enregistrer un nouveau médecin dans la base de données.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:22',
            'city' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
        ]);

        // Créer un nouveau médecin et l'enregistrer
        Doctor::create($request->all());

        // Retourner une réponse avec un message de succès
        return redirect()->route('admin.doctors.index')->with('success', 'Doctor added successfully!');
    }

    /**
     * Afficher le formulaire pour éditer un médecin existant.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\View\View
     */
    public function edit(Doctor $doctor)
    {
        // Retourner la vue pour le formulaire d'édition avec les données du médecin
        return view('admin.doctors.edit', compact('doctor'));
    }

    /**
     * Mettre à jour les informations d'un médecin existant.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Doctor $doctor)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:22',
            'city' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
        ]);

        // Mettre à jour les informations du médecin
        $doctor->update($request->all());

        // Retourner une réponse avec un message de succès
        return redirect()->route('admin.doctors.index')->with('success', 'Doctor updated successfully!');
    }

    /**
     * Supprimer un médecin de la base de données.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Doctor $doctor)
    {
        // Supprimer le médecin
        $doctor->delete();

        // Retourner une réponse avec un message de succès
        return redirect()->route('admin.doctors.index')->with('success', 'Doctor deleted successfully!');
    }
}
