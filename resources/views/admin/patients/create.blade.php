<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Patient</title>
    <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

    <link rel="stylesheet" href="path_to_your_css_file.css"> <!-- Remplacer par votre fichier CSS -->
</head>

<style>
    /* General Reset */
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

/* Page Title */
h1 {
    text-align: center;
    margin-bottom: 50px;
    color: #2c3e50;
}

/* Form Container */
form {
    background-color: #ffffff;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    max-width: 500px;
    width: 100%;
}

/* Form Group */
.form-group {
    margin-bottom: 20px;
}

/* Labels */
label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #34495e;
}

/* Inputs & Select */
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

/* Submit Button */
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



<body>
    

    <!-- <h1>Ajouter un patient</h1> -->

    <form action="{{ route('admin.patients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="age">Âge</label>
            <input type="number" name="age" id="age" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="city">Ville</label>
            <input type="text" name="city" id="city" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" name="address" id="address" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="text" name="phone" id="phone" class="form-control" required>
        </div>

        <!-- Sélection du service -->
        <div class="form-group">
            <label for="service">Sélectionner le service</label>
            <select name="service" id="service" class="form-control" required>
                <option value="Pose de prothèses dentaires">Pose de prothèses dentaires</option>
                <option value="Extraction des dents">Extraction des dents</option>
                <option value="Détartrage et nettoyage">Détartrage et nettoyage</option>
                <option value="Orthodontie : dents et correction faciale">Orthodontie : dents et correction faciale</option>
                <option value="Restauration des dents abîmées ou cassées">Restauration des dents abîmées ou cassées</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter le patient</button>
        <br><br>
        <a href="{{ url('/admin/dashboard') }}" class="btn btn-primary">cancel</a>
    </form>

</body>
</html>
