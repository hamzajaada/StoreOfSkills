<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/services.css') }}">

    <title>StoreOfSkills - Services</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Alegreya+Sans+SC:ital@1&family=Bebas+Neue&family=Dosis&family=Kanit:ital,wght@0,100;0,200;1,100&family=Open+Sans&family=Oswald&family=Poiret+One&family=Poppins:wght@500&family=Prompt:ital,wght@1,200&family=Questrial&family=Roboto+Condensed&family=Rowdies:wght@700&family=Slabo+27px&family=Unbounded:wght@300&display=swap" rel="stylesheet">
    <style>
        .search-container {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }
        form{
            margin-top: 30px;
            margin-left: -25px;
            box-shadow: 0 0 10px 5px rgb(55 74 97 / 10%);
            padding: 10px
        }
        .form-control {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 16px;
            width: 400px;
            max-width: 100%;
            margin: 3px;ç
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .con{
            display: flex;
        }
        .btn-primary:hover {
            background-color: #0069d9;
        }
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
    <section class="services-p">
        @extends('offres.fixeBarre')
    <section class="P-s">
        <h2 class="titre-liste-services">Les <span id="span-t3">services</span></h2>
        <div class="search-container-services" style="margin-bottom: 50px;margin-top: -8px;">
            <form class="input-barresea" method="POST" action="{{ route('home.services.search') }}" >
                @csrf
                @method('POST')
                <div class="barreSearchser">
                <div class="formInputserv" >
                    <input type="text" name="nom" class="form-control" placeholder="Recherche par nom" value="{{ old('nom') }}">
                    <input type="text" name="location" class="form-control" placeholder="Recherche par adresse" value="{{ old('location') }}">
                    <select class="form-select" aria-label="Default select example" name="categorie" id="exampleFormControlSelect1">
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
                <div class="form-group1" style="margin-top: 2px;">
                    <button type="submit" id="rech" class="btn btn-primary" style="margin-left:2px;margin-right:2px">Rechercher</button>
                    <button type="submit" class="btn btn-danger" style="margin-left: 10px">Réinitialiser</button>
                </div>
            </div>
            </form>
        </div>
        @if(session('error'))
            <div class="alert alert-danger my-4" style="position: absolute; margin-top: -2.5rem!important; margin-left: 12%; width: 65%;">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success my-4" style="position: absolute; margin-top: -2.5rem!important; margin-left: 12%; width: 65%;">
                {{ session('success') }}
            </div>
        @endif
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
                    <h6 class="location"> <i id="loc" class="fa-solid fa-map-pin"></i> {{ $srv->location }}</h6>
                    <div class="prix">
                        <p class="text-prix"><span style="color:#ff3c74"> Prix :</span>{{ $srv->prix }}DH</p>
                    </div>

                    @if (Auth::user()->nom == 'Admin' AND Auth::user()->email == 'admin@gmail.com')
                    <center>
                        <div class="modf"><a class="btn btn-primary" href="{{ route('offres.show',$srv->id) }}" role="button">Détail</a></div>
                    </center>
                    @else
                        <center><div>
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
                                            <form method="POST" style="box-shadow: none" action="{{ route('commande.store') }}">
                                                @csrf
                                                <input type="hidden" name="offre_id" value="{{ $srv->id }}">
                                                <input type="hidden" name="id_user" value="{{ $srv->id_user }}">
                                                <button type="submit" class="btn btn-success">Commander</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></center>
                    @endif

                </article>
            @endforeach
        </div>

        </section>
    </section>
    <script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
