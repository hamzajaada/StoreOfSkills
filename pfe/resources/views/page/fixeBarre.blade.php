<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/barre.css">
</head>
<body>
    <section class="main-sec1">
        <div class="barre">
            <div class="botton">
                <i class="fa-sharp fa-solid fa-address-card"></i><a class="vos" href="{{ route('profil') }}">Profil</a><br>
                <i class="fa-solid fa-wrench"></i><a class="vos" href="{{ route('pageservices') }}">Services</a><br>
                <i class="fa-solid fa-toolbox"></i><a class="vos" href="{{ route('pagedemanes') }}">Demandes</a><br>
                <i class="fa-solid fa-wrench"></i><a class="vos" href="profil.php">vos services</a><br>
                <i class="fa-solid fa-toolbox"></i><a class="vos" href="profil.php">vos demandes</a><br>
            </div>
        </div>
    </section>
</body>
</html>