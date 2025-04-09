<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CallBack;

class CallBackController extends Controller
{
    public function store(Request $request)
    {
        // Validation de l'email
        $request->validate([
            'email' => 'required|email',
        ]);

        // Vérification si l'email existe déjà
        if (CallBack::where('email', $request->email)->exists()) {
            // Si l'email existe, redirection avec message d'erreur
            return redirect()->back()->with('error', 'Cet email est déjà utilisé.');
        }

        // Insertion dans la base de données
        CallBack::create([
            'email' => $request->email,
        ]);

        // Redirection avec message de succès
        return redirect()->back()->with('success', 'Votre demande a été envoyée avec succès !');
    }
}
