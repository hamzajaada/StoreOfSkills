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
    </style>
</head>
<body>
<div id="app">
    @extends('offres.fixeHeader')
    <section class="main-sec1">
        @extends('offres.fixeBarre')
    </section>
    <br><h2 class="TitreCommande" >Table de <span >Commandes</span></h2><br>
    <div class="div-table" >
        <table class="table">
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
                <tr>
                    <td>{{ $com->nom }}</td>
                    <td>{{ $com->prenom }}</td>
                    <td>{{ $com->email }}</td>
                    <td>{{ $com->type }}</td>
                    <td>{{ $com->offre }}</td>
                    <td>{{ $com->prix }}</td>
                    {{-- <td>
                        <form class="BTNFORM"  action="" method="POST">
                            @csrf
                            <input type="hidden" name="commande_id" value="{{ $com->id }}">
                            <button type="submit" class="btn btn-primary">Accepter</button>
                        </form>
                    </td>
                    <td>
                        <form class="BTNFORM"  action="" method="POST">
                            @csrf
                            <input type="hidden" name="commande_id" value="{{ $com->id }}">
                            <button type="submit" class="btn btn-danger">Refuser</button>
                        </form>
                    </td> --}}
                    <td>
                        <form class="BTNFORM" action="{{ route('commandes.update') }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="commande_id" value="{{ $com->id }}">
                            <button type="submit" name="accepter" class="btn btn-primary">Accepter</button>
                            <button type="submit" name="refuser" class="btn btn-danger">Refuser</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if(session('error'))
        <div class="alert alert-danger my-4" style="position: absolute; margin-top: -40rem!important; margin-bottom: 46.5rem!important; margin-left: 10%; width: 63%;">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success" style="position: absolute; margin-top: -51rem!important; margin-bottom: 46.5rem!important; margin-left: 20%; width: 63%;">
            {{ session('success') }}
        </div>
    @endif
    </div>
    <script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>

</body>
</html>
