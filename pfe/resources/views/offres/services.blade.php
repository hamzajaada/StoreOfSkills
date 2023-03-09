<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Services</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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

    <h2 class="titre-part3">Les dernières <span id="span-t2" style="color:#ff3c74">Services</span></h2>
    <div class="search-container" style="margin-bottom: 50px;margin-top: -8px;">
        <form method="POST" action="{{ route('home.services.search') }}" >
            {{-- <center><h3>Recherche Multicritère </h3> </center> --}}
            @csrf
            @method('POST')
            <div class="con">
            <div class="form-group" >
                <input type="text" name="nom" class="form-control" placeholder="Recherche par nom" value="{{ old('nom') }}">
                <input type="text" name="prenom" class="form-control" placeholder="Recherche par prénom" value="{{ old('prenom') }}">
                <select class="form-control" name="categorie" id="exampleFormControlSelect1">
                    <option value="">Recherche par catégorie</option>
                    <option value="Design graphique">Design graphique</option>
                    <option value="Développement web et mobile">Développement web et mobile</option>
                    <option value="Rédaction et traduction">Rédaction et traduction</option>
                    <option value="Marketing et publicité">Marketing et publicité</option>
                    <option value="Services informatiques">Services informatiques</option>
                    <option value="Coaching et formation">Coaching et formation</option>
                    <option value="Métier">Métier</option>
                </select>
            </div>
            <div class="form-group1">
                <button type="submit" class="btn btn-primary">Rechercher</button>
                <button type="submit" class="btn btn-danger" style="margin-left: 10px">Reset</button>
            </div>
        </div>
        </form>
    </div>
    <div class="services">
        @foreach ($services as $srv)
            <article>
                <div class="info-per">
                    <div class="img-prfl"><img src="{{asset('image/'.$srv->image)}}" alt="" srcset=""></div>
                        <h4 class="info-prfl">{{ $srv->nom }} {{ $srv->prenom }}</h4>
                    </div>
                <div class="image-ser">
                        <img src="{{asset('image/'.$srv->image_offre)}}" alt="" srcset="">
                </div>
                <div class="desc-ser">
                        <p class="text-ser">{{ $srv->offre }}</p>
                </div>
                <div class="prix">
                    <p class="text-prix"><span style="color:#ff3c74"> Prix :</span>{{ $srv->prix }}DH</p>
                </div>
                <center><div {{--  class="button-commander"--}}>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirm-delete-modal-{{ $srv->id }}">Commander</button>
                    <div class="modal fade" style="margin-top:300px" id="confirm-delete-modal-{{ $srv->id }}" tabindex="-1" aria-labelledby="confirm-delete-modal-label-{{ $srv->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirm-delete-modal-label-{{ $srv->id }}">Confirmation de commande</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">Êtes-vous sûr de vouloir commander cette service ?</div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                    <form method="POST" action="{{ route('home.commander') }}">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="id" value="{{ $srv->id }}">
                                        <input type="hidden" name="id_user" value="{{ $srv->id_user }}">
                                        <button type="submit" class="btn btn-success">Commander</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                </div></center>
            </article>
        @endforeach
    </div>
    </section>
</section>
<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
