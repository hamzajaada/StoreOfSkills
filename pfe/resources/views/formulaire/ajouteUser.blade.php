
<!DOCTYPE html>
<html>
<head>
    <title>Professional Form</title>
    <link rel="stylesheet" href="{{ asset('css/forme.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,400;1,500&family=Phudu:wght@300;400&display=swap" rel="stylesheet">
</head>
<body>
    @extends('page.fixeHeader')
<form class="forme_user">
    <h2>Ajoute d'utilisateur</h2>
    <label for="nom">Nom:</label>
    <input type="text" id="nom" name="nom" placeholder="Nom d'utilisateur" required>
    <label for="prenom">Prenom:</label>
    <input type="text" id="prenom" name="prenom" placeholder="Prenom d'utilisateur" required>
    <label for="localisation">Adresse:</label>
    <input type="text" id="localisation" name="localisation" placeholder="Adresse d'utilisateur" required>
    <label for="image">Image d'utilisateur:</label>
    <input type="file" id="email" name="image" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" placeholder="Email d'utilisateur" required>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" placeholder="Mot de passe d'utilisateur" required>
    <label for="password">Confirmation:</label>
    <input type="password" id="password" name="password" placeholder="Confirmer le mot de passe" required>
    <input type="submit" value="Ajoute">
</form>
</body>
</html>
