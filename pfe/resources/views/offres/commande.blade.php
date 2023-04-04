<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>StoreOfSkills - Commandes</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/reponse.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Tablecommande.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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

        .acceptee {
            background-color: #00800038;
        }

        .refusee {
            background-color: #ff00004f;
        }
    </style>
</head>
<body>
<div id="app">
    @extends('offres.fixeHeader')
    <section class="main-sec1">
        @extends('offres.fixeBarre')
    </section>
    <br><h2 class="TitreCommande" >Table de <span style="color: rgb(11, 181, 11)" >commandes</span></h2><br>
    <div class="search-container-services" style="margin-bottom: 50px;margin-top: -8px;margin-left:247px">
        <form class="input-barresea" method="POST" action="{{ route('home.commande.search') }}" >
            @csrf
            @method('POST')
            <div class="barreSearchser">
            <div class="formInputserv" >
                <input type="text" name="nom" class="form-control" style="margin-right:2px" placeholder="Recherche par nom" value="{{ old('nom') }}">
                <input type="text" name="email" class="form-control" style="margin-left:2px;margin-right:2px" placeholder="Recherche par email" value="{{ old('email') }}">
                <select class="form-select" value="{{ old('type') }}" style="margin-left:2px;margin-right:2px" aria-label="Default select example" name="type" id="exampleFormControlSelect1">
                    <option value="">Recherche par type</option>
                    <option value="service">Service</option>
                    <option value="demande">Demande</option>
                </select>
                <select class="form-select" value="{{ old('statut') }}" style="margin-left:2px;margin-right:2px" aria-label="Default select example" name="statut" id="exampleFormControlSelect1">
                    <option value="">Recherche par statut</option>
                    <option value="en_attente">En attent</option>
                    <option value="acceptee">Acceptée</option>
                    <option value="refusee">Refusée</option>
                </select>
            </div>
            <div class="form-group1" style="margin-top: 2px; " style="margin-left:2px">
                <button type="submit" class="btn btn-primary" name="search">Rechercher</button>
                <button type="submit" class="btn btn-danger" name="reset" style="margin-left: 10px">Réinitialiser</button>
            </div>
        </div>
        </form>
    </div>
    @if(session('error'))
        <div class="alert alert-danger my-4" style="position: absolute; margin-top: -2rem!important; margin-left: 23%; width: 65%;">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" style="position: absolute; margin-top: -2rem!important; margin-left: 23%; width: 65%;">
            {{ session('success') }}
        </div>
    @endif
    <div class="div-table" >
        <table class="table" style="width: 95%;border-collapse: collapse; margin-top:85px">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Type</th>
                    <th style="height: auto;overflow:auto;" scope="col">Offre</th>
                    <th scope="col">Prix</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($userCommandes as $com )
                <tr class="@if($com->statut == 'en_attente') en-attente @elseif($com->statut == 'acceptee') acceptee @elseif($com->statut == 'refusee') refusee @endif">
                    <td>{{ $com->nom }}</td>
                    <td>{{ $com->prenom }}</td>
                    <td>{{ $com->email }}</td>
                    <td>{{ $com->type }}</td>
                    <td>{{ $com->offre }}</td>
                    <td>{{ $com->prix }}</td>
                    <td>
                        <form class="BTNFORM" action="{{ route('commandes.update') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="commande_id" value="{{ $com->id }}">
                            <button type="submit" name="accepter" class="btn btn-primary">Accepter</button>
                        </form>
                    </td>
                    <td>
                        <form class="BTNFORM" action="{{ route('commandes.update') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="commande_id" value="{{ $com->id }}">
                            <button type="submit" name="refuser" class="btn btn-danger">Refuser</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    </div>
    <script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
    <script>

    </script>

</body>
</html>
