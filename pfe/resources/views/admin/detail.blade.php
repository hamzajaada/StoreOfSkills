<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/ajouteOffre.css') }}">
    <title>StoreOfSkills - Détail d'offre</title>

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
    <section class="AF" >
        <h1 class="titre-Ajouteoffre">Détail <span style="color:rgb(44, 8, 247)">d'offre</span></h1>
        <div class="info-compte" style="margin-left: 102px;">
        <form style="border-radius: 7px" class="row g-3" method="post" action="" enctype="multipart/form-data">
            @csrf
            {{-- @method('PUT') --}}

                <div class="info-per" style="display:flex;">
                    <div class="img-prfl"><img src="{{asset('image/'.$offre->image)}}" style="width: 60px;height: 60px;border-radius: 50%"></div>
                    <h3 class="info-prfil" style="margin-left: 25px;font-family: 'Open Sans', sans-serif;font-size: 2.5em;font-weight: 200;color: #333333;">{{ $offre->nom }} {{ $offre->prenom }}</h3>
                </div>
                <br>
            <center>
                <img src="{{asset('image/'.$offre->image_offre)}}" style="width:400px;height:200px">
            </center>
            <div class="form-group2" style="display: block">
                <h4 for="exampleFormControlSelect1">Email:</h4>
                {{-- <p  name="email">{{ $offre->email }}</p> --}}
                <input class="form-control" disabled style="background-color: white" name="email" value="{{ $offre->email }}" id="exampleFormControlSelect1">
            </div>
            <div class="form-group2" style="display: block">
                <h4 for="exampleFormControlSelect1">Adresse:</h4>
                {{-- <p   name="location">{{ $offre->location }}</p> --}}
                <input class="form-control" disabled style="background-color: white" name="location" value="{{ $offre->location }}" id="exampleFormControlSelect1">
            </div>
            <div class="form-group2" style="display: block">
                <h4 for="exampleFormControlSelect1">Type:</h4>
                {{-- <p  name="type">{{ $offre->type }}</p> --}}
                <input class="form-control" disabled style="background-color: white" name="type" value="{{ $offre->type }}" id="exampleFormControlSelect1">
            </div>
            <div class="form-group2" style="display: block">
                <h4 for="exampleFormControlSelect1">Categorie:</h4>
                {{-- <p  name="categorie">{{ $offre->categorie }}</p> --}}
                <input class="form-control" disabled style="background-color: white" value="{{ $offre->categorie }}" name="categorie" id="exampleFormControlSelect1">
            </div>
            <div class="form-group2" style="display: block">
                <h4 for="exampleFormControlTextarea1">Offre:</h4>
                {{-- <p  name="offre">{{ $offre->offre }}</p> --}}
                <textarea class="form-control" disabled name="offre" style="background-color: white" id="exampleFormControlTextarea1" rows="3">{{ $offre->offre }}</textarea>
            </div>
            <div class="form-group2" style="display: block">
                <h4 for="exampleFormControlNember">Prix:</h4>
                {{-- <p  name="prix">{{ $offre->prix }} DH</p> --}}
                <input type="number" disabled value="{{ $offre->prix }}" style="background-color: white" class="form-control" name="prix" id="exampleFormControlNember">
            </div>
            {{-- <div class="form-group2" style="display: block">
                <h4 for="exampleFormControlNember">Image d'offre:</h4><br>
                <img src="{{asset('image/'.$offre->image_offre)}}" style="width:200px;height:200px">
            </div> --}}
        </form>
    </div>
</section>
<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>

</body>
</html>
