
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
    
    <form>
        <h2>Ajoute d'offre</h2>
        <label for="type">type:</label>
        <select id="type" name="type" required>
            <option value="dervice">Service</option>
            <option value="demande">Demande</option>
        </select>
        <label for="name">Catégorie:</label>
        <input type="text" id="name" name="name" placeholder="Categorie d'offre" required>
        <label for="message">Offre:</label>
        <textarea id="message" name="message" placeholder="Votre offre" required></textarea>
        <label for="image">Image d'offre:</label>
        <input type="file" id="email" name="image" required>
        <input type="submit" value="Ajoute">
    </form>
</body>
</html>
