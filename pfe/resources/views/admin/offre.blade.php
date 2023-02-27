<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/barre.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div id="app">
    @extends('offres.fixeHeader')
    <section class="main-sec1">
        @extends('offres.fixeBarre')
    </section>
    <br>
    <h1 style="text-align:center;margin-right:20%;margin-top:30px">Table d'offres</h1><br><br>
    <table class="table" style="width: 85%;" >
        <thead>
        <tr>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Type</th>
            <th scope="col">Categorie</th>
            <th scope="col">Offre</th>
            <th scope="col">Prix</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($offres as $f)
                <tr>
                    <td>{{ $f->nom }}</td>
                    <td>{{ $f->prenom }}</td>
                    <td>{{ $f->type }}</td>
                    <td>{{ $f->categorie }}</td>
                    <td>{{ $f->offre }}</td>
                    <td>{{ $f->prix }}</td>
                    <td>
                        <form action="{{ route('users.offre.delete',$f->id) }}" method="post">
                            @method('GET')
                            @csrf
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>
<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
