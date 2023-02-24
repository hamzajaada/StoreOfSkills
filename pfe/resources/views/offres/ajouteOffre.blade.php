<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Alegreya+Sans+SC:ital@1&family=Bebas+Neue&family=Dosis&family=Kanit:ital,wght@0,100;0,200;1,100&family=Open+Sans&family=Oswald&family=Poiret+One&family=Poppins:wght@500&family=Prompt:ital,wght@1,200&family=Questrial&family=Roboto+Condensed&family=Rowdies:wght@700&family=Slabo+27px&family=Unbounded:wght@300&display=swap" rel="stylesheet">

</head>
<body>
<div id="app">
    @extends('offres.fixeHeader')
    <section class="services-p">
    <section class="main-sec1">
       @extends('offres.fixeBarre')
    </section>
    <section class="P-2"  >
        <h1 class="titre-part3" style="margin-top: 40px;">Ajoute <span style="color:rgb(36, 189, 36)">d'offre</span> </h1>
    <div class="info-compte" style="margin-left: 96px;">
        <form class="row g-3" method="post" action="{{ route('offres.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="exampleFormControlNom">Nom:</label>
                <input class="form-control" value="{{ Auth::user()->nom }}" name="nom" id="exampleFormControlNom">
            </div>

            <div class="form-group">
                <label for="exampleFormControlPrenom">Prenom:</label>
                <input class="form-control" value="{{ Auth::user()->prenom }}" name="prenom" id="exampleFormControlPrenom">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Type:</label>
                <select class="form-control" name="type" id="exampleFormControlSelect1">
                    <option value="service">Service</option>
                    <option value="demande">Demande</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">Categorie:</label>
                <select class="form-control" name="categorie" id="exampleFormControlSelect1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleFormControlTextarea1">Offre:</label>
                <textarea class="form-control" name="offre" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleFormControlNember">Prix:</label>
                <input type="number" class="form-control" name="prix" id="exampleFormControlNember">
            </div>

            <div class="col-12">
                <label for="inputImage" class="form-label">Image</label>
                <input class="form-control" name="image" type="file" id="formFile">
            </div>

            <div class="col-12">
                <center><button type="submit" class="btn btn-primary" style="width: 50%">Ajouter</button></center>
            </div>
        </form>
    </div>
</section>
<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
