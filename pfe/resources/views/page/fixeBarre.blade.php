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
                <div class="btnn"><a class="vos" href="{{ route('homee') }}"><i class="fa-solid fa-house"></i></i></a><br></div>
                 <div class="btnn"><a class="vos" href="{{ route('profil') }}"><i class="fa-solid fa-user-gear"></i></a><br></div>
                <div class="btnn"><a class="vos" href="{{ route('pageservices') }}"> <i class="fa-solid fa-wrench"></i></a><br></div>
                <div class="btnn"><a class="vos" href="{{ route('pagedemanes') }}"> <i class="fa-solid fa-toolbox"></i></a><br></div>
                    <div class="btnn"><a class="vos" href="{{ route('reponse') }}"><i class="fa-solid fa-reply"></i></a><br></div>
                        <div class="btnn"><a class="vos" href="{{ route('page.ajouteOffre') }}"><i class="fa-solid fa-plus"></i></a><br></div>
            </div>
        </div>
    </section>
    <script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
