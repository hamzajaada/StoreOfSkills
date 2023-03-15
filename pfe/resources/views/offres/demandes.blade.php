<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/demandes.css') }}">
    {{--     <link rel="stylesheet" href="{{ asset('css/services.css') }}">--}}
    <title>StoreOfSkills - Demandes</title>

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
        <section class="P-D">
            <h2 class="titre-de-listeDemandes">Les dernières <span id="span-t2">demandes</span></h2>
            <div class="search-container-demandes" >
                <form  id="Searchdem" method="POST" action="{{ route('home.demandes.search') }}" >
                    @csrf
                    @method('POST')
                    <div class="BarreSearch">
                        <div class="input-barreSearch" >
                            <input type="text" name="nom" class="form-control" placeholder="Recherche par nom" value="{{ old('nom') }}">
                            <input type="text" name="prenom" class="form-control" placeholder="Recherche par prénom" value="{{ old('prenom') }}">
                            <input type="text" name="location" class="form-control" placeholder="Recherche par adresse" value="{{ old('location') }}">
                            <select class="form-control" name="categorie" id="exampleFormControlSelect1">
                                <option value="">Recherche par categorie</option>
                                <option value="Design graphique">Design graphique</option>
                                <option value="Développement web et mobile">Développement web et mobile</option>
                                <option value="Rédaction et traduction">Rédaction et traduction</option>
                                <option value="Marketing et publicité">Marketing et publicité</option>
                                <option value="Services informatiques">Services informatiques</option>
                                <option value="Coaching et formation">Coaching et formation</option>
                                <option value="Métier">Métier</option>
                            </select>
                        </div>
                        <div class="BTN_BARRESEARCH" >
                            <button type="submit" class="btn btn-primary">Rechercher</button>
                            <button type="submit" class="btn btn-danger" style="margin-left: 10px">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="demandes">
                @foreach ($demandes as $d)
                    <article class="card1">
                        <div class="info-perso">
                            <div class="img-prfl"><img src="{{asset('image/'.$d->image)}}" alt="" srcset=""></div>
                                <h4 class="info-prfl">{{ $d->prenom }} {{ $d->nom }} </h4>
                            </div>
                            <div class="image-dem">
                                <img src="{{asset('image/'.$d->image_offre)}}" alt="" srcset="">
                            </div>
                            <div class="desc-dem">
                                <p class="text-dem">{{ $d->offre }}</p> <br>
                            </div>
                            <h6 class="locationn"><i id="locat" class="fa-solid fa-map-pin"></i> {{ $d->location }}</h6>
                            <div class="prix">
                                <p class="text-prixdem"><span style="color:#ff3c74"> Prix :</span>{{ $d->prix }}DH</p>
                            </div>
                            <center>
                                <div {{--  class="button-commander"--}}>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirm-delete-modal-{{ $d->id }}">Postuler</button>
                                <div class="modal fade" style="margin-top:300px" id="confirm-delete-modal-{{ $d->id }}" tabindex="-1" aria-labelledby="confirm-delete-modal-label-{{ $d->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirm-delete-modal-label-{{ $d->id }}">Confirmation de postule</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Êtes-vous sûr de vouloir postuler cette demande ?</div>
                                            <div class="modal-footer">
                                                <button id="comf-btn" type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                                <form method="POST" id="comf-btn1" style="box-shadow: none" action="{{ route('commande.store') }}">
                                                    @csrf
                                                    <input type="hidden" name="offre_id" value="{{ $d->id }}">
                                                    <input type="hidden" name="id_user" value="{{ $d->id_user }}">
                                                    <button type="submit" class="btn btn-success">Postuler</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            </div></center>
                        </article>
                    @endforeach
                </div>
            @if(session('error'))
                <div class="alert alert-danger my-4" style="position: absolute; margin-top: -40rem!important; margin-bottom: 46.5rem!important;margin-left: 10%;width: 63%;">
                    {{ session('error') }}
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-danger my-4" style="position: absolute; margin-top: -40rem!important; margin-bottom: 46.5rem!important; margin-left: 10%; width: 63%;">
                    {{ session('success') }}
                </div>
            @endif
            </section>
        </section>


<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
