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
               <i class="fa-solid fa-house"></i> <a class="vos" href="{{ route('homee') }}"></i> Home</a><br>
                <i class="fa-solid fa-user-gear"></i> <a class="vos" href="{{ route('profil') }}">Profil</a><br>
                <i class="fa-solid fa-wrench"></i><a class="vos" href="{{ route('pageservices') }}"> Services</a><br>
                <i class="fa-solid fa-toolbox"></i><a class="vos" href="{{ route('pagedemanes') }}"> Demandes</a><br>
                  <i class="fa-solid fa-reply"></i>  <a class="vos" href="{{ route('reponse') }}">Reponses</a><br>
                    <i class="fa-solid fa-plus"></i>    <a class="vos" href="{{ route('page.ajouteOffre') }}">Offres</a><br>
                    <i class="fa-solid fa-wrench"></i><a class="vos" href="{{ route('vosservices') }}">Votre services</a><br>
                    <i class="fa-solid fa-wrench"></i><a class="vos" href="{{ route('pageservices') }}">Votre demandes</a><br>

            </div>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
