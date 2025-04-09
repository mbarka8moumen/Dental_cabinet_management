<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Patient</title>
    <link rel="stylesheet" href="path_to_your_css_file.css"> <!-- Remplacer par votre fichier CSS -->
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">



<style>
    /* form-style.css */

/* Reset & body */
* {
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
}

body {
    background: #f0f4f8;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    padding: 60px 20px;
    min-height: 100vh;
}

/* Title */
h1 {
    text-align: center;
    margin-bottom: 30px;
    color: #2c3e50;
}

/* Form container */
form {
    background-color: #ffffff;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    width: 100%;
}

/* Fields */
.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #34495e;
}

input[type="text"],
input[type="number"],
select {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background: #f9f9f9;
    transition: border-color 0.3s ease, background-color 0.3s ease;
}

input:focus,
select:focus {
    outline: none;
    border-color: #3498db;
    background-color: #fff;
}

/* Button */
.btn-primary {
    display: inline-block;
    width: 100%;
    background-color: #3498db;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 8px;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #2980b9;
}

a{
    text-decoration: none;
    text-align: center;
}

</style>





</head>
<body>

    <!-- <h1>Modifier le patient</h1> -->

    <form action="{{ route('admin.patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $patient->name }}" required>
        </div>
        <div class="form-group">
            <label for="age">Âge</label>
            <input type="number" name="age" id="age" class="form-control" value="{{ $patient->age }}" required>
        </div>
        <div class="form-group">
            <label for="city">Ville</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ $patient->city }}" required>
        </div>
        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $patient->address }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $patient->phone }}" required>
        </div>

        <!-- Sélection du service avec pré-sélection -->
        <div class="form-group">
            <label for="service">Sélectionner le service</label>
            <select name="service" id="service" class="form-control" required>
                <option value="Pose de prothèses dentaires" {{ $patient->service == 'Pose de prothèses dentaires' ? 'selected' : '' }}>Pose de prothèses dentaires</option>
                <option value="Extraction des dents" {{ $patient->service == 'Extraction des dents' ? 'selected' : '' }}>Extraction des dents</option>
                <option value="Détartrage et nettoyage" {{ $patient->service == 'Détartrage et nettoyage' ? 'selected' : '' }}>Détartrage et nettoyage</option>
                <option value="Orthodontie : dents et correction faciale" {{ $patient->service == 'Orthodontie : dents et correction faciale' ? 'selected' : '' }}>Orthodontie : dents et correction faciale</option>
                <option value="Restauration des dents abîmées ou cassées" {{ $patient->service == 'Restauration des dents abîmées ou cassées' ? 'selected' : '' }}>Restauration des dents abîmées ou cassées</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour le patient</button>
        <br><br>
        <a href="{{ url('/admin/dashboard') }}" class="btn btn-primary">cancel</a>
    </form>

</body>
</html>
