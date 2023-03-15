<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/reponse.css') }}">

    <title>StoreOfSkills - Reponses</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

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
    <br><h2 style="text-align:center;margin-left:10%;margin-top:40px;">Table de <span style="color:#ff3c74">Reponses</span></h2><br>
    <div class="div-table">
        <table class="table" style="width: 95%;border-collapse: collapse;" >
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Type</th>
                    <th scope="col">Offre</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                    @foreach ($userReponses as $rep )
                <tr>
                    <td>{{ $rep->nom }}</td>
                    <td>{{ $rep->prenom }}</td>
                    <td>{{ $rep->email }}</td>
                    <td>{{ $rep->type }}</td>
                    <td>{{ $rep->offre  }}</td>
                    <td>{{ $rep->prix}}</td>
                    <td>
                        @if ($rep->statut == 'acceptee')
                            <span style="color: rgb(46, 175, 46)"> la commande était acceptée .</span>
                        @elseif ($rep->statut == 'refusee')
                            <span style="color: red">la commande était refusée .</span>
                        @else
                            <span style="color: blue">la commande est en attent .</span>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-delete-modal-{{ $rep->id }}">Supprimer</button>
                        <div class="modal fade" style="margin-top:300px" id="confirm-delete-modal-{{ $rep->id }}" tabindex="-1" aria-labelledby="confirm-delete-modal-label-{{ $rep->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirm-delete-modal-label-{{ $rep->id }}">Confirmation de suppression</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">Êtes-vous sûr de vouloir supprimer cette commande ? Cette action est irréversible.</div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                        <form action="" method="post">
                                            @method('delete')
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $rep->id }}">
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
    @if(session('error'))
        <div class="alert alert-danger my-4" style="position: absolute; margin-top: -40rem!important; margin-bottom: 46.5rem!important; margin-left: 10%; width: 63%;">
            {{ session('error') }}
        </div>
    @endif
    @if(session('success'))
        <div class="alert alert-success my-4" style="position: absolute; margin-top: -40rem!important; margin-bottom: 46.5rem!important; margin-left: 10%; width: 63%;">
            {{ session('success') }}
        </div>
    @endif
</div>
<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
