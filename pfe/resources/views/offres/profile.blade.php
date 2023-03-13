<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
    <title>StoreOfSkills - Profile</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Alegreya+Sans+SC:ital@1&family=Bebas+Neue&family=Dosis&family=Kanit:ital,wght@0,100;0,200;1,100&family=Open+Sans&family=Oswald&family=Poiret+One&family=Poppins:wght@500&family=Prompt:ital,wght@1,200&family=Questrial&family=Roboto+Condensed&family=Rowdies:wght@700&family=Slabo+27px&family=Unbounded:wght@300&display=swap" rel="stylesheet">
    <style>
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-danger {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
    </style>
</head>
<body>
<div id="app">
    @extends('offres.fixeHeader')
    <section class="services-profil">
        @extends('offres.fixeBarre')
        <section class="P-3" >
            <h1 class="titre-Modfprofil"><span style="color:rgb(15, 15, 236)">Modifier</span>  votre Profile</h1>
            <div class="info-compte">
                <form class="row g-3" method="post" action="{{ route('users.update',$profile->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h2>Informations de compte</h2>
                    <div class="col-md-6">
                        <label for="inputNom" class="form-label">Nom</label>
                        <input type="text" name="nom" value="{{ $profile->nom }}" class="form-control" id="inputNom">                    </div>
                    <div class="col-md-6">
                        <label for="inputPrenom" class="form-label">Prenom</label>
                        <input type="text" name="prenom" value="{{ $profile->prenom }}"  class="form-control" id="inputPrenom">                    </div>
                    <div class="col-12">
                        <label for="inputEmail" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ $profile->email }}"  class="form-control" id="inputEmail">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" name="location" value="{{ $profile->location }}"  class="form-control" id="inputAddress">
                    </div>
                    <div class="col-12">
                        <label for="inputImage" class="form-label">Image</label>
                        <input class="form-control" type="file" name="image" id="formFile">
                    </div>
                    <div class="col-12">
                        <center><button type="submit" class="btn btn-primary" style="width: 50%;">Modifer</button></center>
                    </div>
                </form>
            </div>
            <div class="mot_passe" >
                <form class="row g-3" method="post"  action="{{ route('users.password') }}">
                    @csrf
                    @method('POST')
                    <h2>Modification de mot de passe</h2>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Mot de passe actuelle</label>
                        <input type="password" class="form-control" id="inputPassword4" name="current_password">
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="inputPassword4" name="password">
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Confirmer le mot de passe</label>
                        <input type="password" class="form-control" id="inputPassword4" name="password_confirmation">
                    </div>
                    <div class="col-12">
                        <center><button type="submit" class="btn btn-primary" style="width: 50%;">Modifer</button></center>
                    </div>
                </form>
            </div>
        </section>
    </section>
    @if(session('error'))
            <div class="alert alert-danger my-4" style="position: absolute; margin-top: -40rem!important; margin-bottom: 46.5rem!important; margin-left: 10%; width: 63%;">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" style="position: absolute; margin-top: -61rem!important; margin-bottom: 46.5rem!important; margin-left: 20%; width: 63%;">
                {{ session('success') }}
            </div>
        @endif
    </div>

<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
