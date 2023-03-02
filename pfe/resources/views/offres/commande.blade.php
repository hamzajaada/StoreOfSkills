<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <br><h2 style="text-align:center;margin-left:10%;margin-top:40px;">Table de <span style="color:#ff3c74">Reponses</span></h2><br>
    <div class="div-table" style="margin-left:17%" >
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
                </tr>
            </thead> 
            <tbody class="table-group-divider">
                   @foreach ($commandes as $com )
                <tr>
                    <td>{{ $com->nom }}</td>
                    <td>{{ $com->prenom }}</td>
                    <td>{{ $com->email }}</td>
                    <td>{{ $com->typeOffre }}</td>
                    <td>{{ $com->Offre  }}</td>
                    <td>{{ $com->prix}}</td>
                    <td>
                        @if ($com->status==1)
                           <span style="color: rgb(46, 175, 46)"> la commande était acceptée .</span>
                        @elseif ($com->status==2)
                      <span style="color: red">la commande était refusée .</span>  
                         @endif


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
 