<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
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
        @extends('offres.fixeBarre')
        <section class="P-2">
            <h1 class="titre-part3" style="margin-top: 70px;text-align:center;margin-right:295px">Profile</h1>
            <div class="info-compte">
                <form class="row g-3" method="post" action="{{ route('users.update',$profile->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h2>Informations de compte</h2>
                    <div class="col-md-6">
                        <label for="inputNom" class="form-label">Nom</label>
                        <input type="text" value="{{ $profile->nom }}" class="form-control" id="inputNom">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPrenom" class="form-label">Prenom</label>
                        <input type="text" value="{{ $profile->prenom }}"  class="form-control" id="inputPrenom">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" value="{{ $profile->email }}"  class="form-control" id="inputEmail">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" value="{{ $profile->location }}"  class="form-control" id="inputAddress">
                    </div>
                    <div class="col-12">
                        <label for="inputImage" class="form-label">Image</label>
                        <input class="form-control" type="file" id="formFile">
                    </div>
                    <div class="col-12">
                        <center><button type="submit" class="btn btn-primary" style="width: 50%;">Modifer</button></center>
                    </div>
                </form>
            </div>
            <div class="mot_passe" style="margin-bottom: 30px">
                <form class="row g-3" method="post" enctype="multipart/form-data">
                    <h2>Modification de mot de passe</h2>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Mot de passe actuelle</label>
                        <input type="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="col-12">
                        <center><button type="submit" class="btn btn-primary" style="width: 50%;">Modifer</button></center>
                    </div>
                </form>
            </div>
        </section>
    </section>

<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
