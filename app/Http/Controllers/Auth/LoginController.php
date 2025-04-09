<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |----------------------------------------------------------------------
    | Login Controller
    |----------------------------------------------------------------------
    |
    | Ce contrôleur gère l'authentification des utilisateurs de l'application
    | et les redirige vers la page d'accueil après la connexion.
    | Il utilise un trait pour simplifier la logique d'authentification.
    |
    */

    use AuthenticatesUsers;

    /**
     * Où rediriger les utilisateurs après la connexion.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Crée une nouvelle instance du contrôleur.
     *
     * @return void
     */
    public function __construct()
    {
        // Appliquer le middleware 'guest' pour les actions de connexion sauf 'logout'
        $this->middleware('guest')->except('logout');
    }

    /**
     * Afficher le formulaire de connexion.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Gérer la soumission du formulaire de connexion.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // Validation des données du formulaire
        $this->validateLogin($request);

        // Si l'utilisateur est authentifié avec succès
        if (Auth::attempt($this->credentials($request), $request->filled('remember'))) {
            return $this->sendLoginResponse($request);
        }

        // Si la connexion échoue, rediriger avec un message d'erreur
        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Déconnecter l'utilisateur de l'application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Déconnecter l'utilisateur
        $request->session()->invalidate(); // Invalider la session
        $request->session()->regenerateToken(); // Régénérer le token CSRF

        return redirect('/'); // Rediriger l'utilisateur vers la page d'accueil
    }

    /**
     * Valider les informations de connexion de l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateLogin(Request $request)
    {
        // Utiliser la méthode validate sur l'objet request
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    /**
     * Déterminer les informations d'identification de l'utilisateur.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Rediriger l'utilisateur après une connexion réussie.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate(); // Régénérer la session

        $this->clearLoginAttempts($request); // Effacer les tentatives de connexion

        return redirect()->intended($this->redirectPath()); // Rediriger l'utilisateur
    }

    /**
     * Rediriger l'utilisateur après une tentative de connexion échouée.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => trans('auth.failed'),
            ]);
    }
}
