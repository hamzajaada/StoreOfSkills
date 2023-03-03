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
    <!-- Style -->
    <style>
        .search-container {
            display: flex;
            justify-content: center;
            margin-top: 50px;
        }
        form{
            margin-left: 170px;
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
            margin: 3px;
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

        .btn-primary:hover {
            background-color: #0069d9;
        }
    </style>
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
        <h1 style="text-align:center;margin-left:10%;margin-top:40px;">Table d'offres</h1><br><br>
        <div class="search-container" style="margin-bottom: 50px;margin-top: -8px;">
            <form method="POST" action="{{ route('admin.offres.search') }}" >
                <center><h3>Recherche Multicritère </h3> </center>
                @csrf
                @method('POST')
                <div class="form-group" style=" display:flex;">
                    <input type="text" name="nom" class="form-control" placeholder="Recherche par nom" value="{{ old('nom') }}">
                    <input type="text" name="prenom" class="form-control" placeholder="Recherche par prénom" value="{{ old('prenom') }}">
                    <select class="form-control" name="type" id="exampleFormControlSelect1">
                        <option value="">Recherche par type</option>
                        <option value="service">Service</option>
                        <option value="demande">Demande</option>
                    </select>
                    <input type="text" name="adresse" class="form-control" placeholder="Recherche par adresse" value="{{ old('adresse') }}">
                </div>
                <div class="form-group" style="margin-top: 32px; margin-left:813px; display:flex;">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                    <button type="submit" class="btn btn-danger" style="margin-left: 10px">Reset</button>
                </div>
            </form>
        </div>
        <div class="div-table" style="margin-left:17%" >
            <table class="table" style="width: 95%;border-collapse: collapse;" >
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
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-delete-modal-{{ $f->id }}">Supprimer</button>
                                <div class="modal fade" style="margin-top:300px" id="confirm-delete-modal-{{ $f->id }}" tabindex="-1" aria-labelledby="confirm-delete-modal-label-{{ $f->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirm-delete-modal-label-{{ $f->id }}">Confirmation de suppression</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Êtes-vous sûr de vouloir supprimer cette offre ? Cette action est irréversible.</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                                <form action="{{ route('users.offre.delete',$f->id) }}" method="post">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit">Supprimer</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
