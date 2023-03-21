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
        <h1 class="titre-Ajouteoffre">Détail <span style="color:rgb(44, 8, 247)">d'offre</span> </h1>
        <div class="info-compte" style="margin-left: 102px;">
        <form style="border-radius: 7px" class="row g-3" method="post" action="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group2" style="display: block">
                <label for="exampleFormControlSelect1">Type:</label>
                <input class="form-control" disabled {{-- aria-label="Default select example" --}} name="type" value="{{ $offre->type }}" id="exampleFormControlSelect1">
            </div>
            <div class="form-group2" style="display: block">
                <label for="exampleFormControlSelect1">Categorie:</label>
                <input class="form-control" disabled {{-- aria-label="Default select example" --}} value="{{ $offre->categorie }}" name="categorie" id="exampleFormControlSelect1">
            </div>
            <div class="form-group2" style="display: block">
                <label for="exampleFormControlTextarea1">Offre:</label>
                <textarea class="form-control" disabled name="offre" id="exampleFormControlTextarea1" rows="3">{{ $offre->offre }}</textarea>
            </div>
            <div class="form-group2" style="display: block">
                <label for="exampleFormControlNember">Prix:</label>
                <input type="number" disabled value="{{ $offre->prix }}" class="form-control" name="prix" id="exampleFormControlNember">
            </div>
            <div class="col-12">
                <label for="inputImage" class="form-label">Image:</label>
                <input class="form-control" disabled name="image" value="{{ $offre->image_offre }}" type="file" id="formFile">
            </div>
        </form>
    </div>
</section>
<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>

</body>
</html>
