<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Méthode pour afficher le formulaire de contact
    public function showForm()
    {
        return view('contact'); // Assure-toi que la vue contact.blade.php existe
    }

    // Méthode pour traiter le formulaire de contact
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required|string',
        ]);

        // Redirection avec un message de succès
        return redirect()->route('contact')->with('success', 'Message sent successfully!');
    }
}
