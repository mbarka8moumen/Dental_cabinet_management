<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DoctorController;

use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CallBackController;

Route::post('/callback', [CallBackController::class, 'store'])->name('callback.store');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);



Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


// Route pour afficher le tableau de bord




// Routes d'authentification
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Routes principales (pages publiques)
Route::view('/', 'home')->name('home');
Route::view('/home', 'home')->name('home');
Route::view('/services', 'services')->name('services');
Route::view('/about', 'about')->name('about');
Route::view('/projects', 'projects')->name('projects');
Route::view('/team', 'team')->name('team');
Route::view('/blog', 'blog')->name('blog');

// Formulaire de réservation publique
Route::get('/book', [AppointmentController::class, 'showForm'])->name('book');
Route::post('/book', [AppointmentController::class, 'bookAppointment'])->name('book.appointment');

// Contact
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Administration (protégée par middleware auth)
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    
    // Tableau de bord

    // Gestion des docteurs
    Route::resource('doctors', DoctorController::class);

    // Gestion des rendez-vous
    Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments');
    Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');

    // Gestion des patients
    Route::get('patients', [PatientController::class, 'index'])->name('patients.index');
    Route::get('patients/create', [PatientController::class, 'create'])->name('patients.create');
    Route::post('patients', [PatientController::class, 'store'])->name('patients.store');
    Route::get('patients/{id}/edit', [PatientController::class, 'edit'])->name('patients.edit');
    Route::put('patients/{id}', [PatientController::class, 'update'])->name('patients.update');
    Route::delete('patients/{id}', [PatientController::class, 'destroy'])->name('patients.destroy');

    // Pages statiques pour l'administration
    Route::view('notifications', 'admin.notifications')->name('notifications');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
