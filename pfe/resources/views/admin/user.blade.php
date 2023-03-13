<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>StoreOfSkills - Users</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/barre.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
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
.con{
    display: flex;
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
        <h1 style="text-align:center;margin-left:10%;margin-top:40px;">Table d'utilisateurs</h1><br><br>
        {{-- <center>

        </center> --}}

        <div class="search-container" style="margin-bottom: 50px;margin-top: -8px;">

            <form method="POST" action="{{ route('admin.user.search') }}" >
                @csrf
                @method('POST')
                <div class="con">
                <div class="form-group" style=" display:flex;">
                    <input type="text" name="nom" class="form-control" placeholder="Recherche par nom" value="{{ old('nom') }}">
                    <input type="text" name="prenom" class="form-control" placeholder="Recherche par prénom" value="{{ old('prenom') }}">
                    <input type="text" name="email" class="form-control" placeholder="Recherche par email" value="{{ old('email') }}">
                    <input type="text" name="adresse" class="form-control" placeholder="Recherche par adresse" value="{{ old('adresse') }}">

                </div>
                <div class="form-group" style=" display:flex;">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                    <button type="submit" class="btn btn-danger" style="margin-left: 10px">Reset</button>
                </div></div>
            </form>
        </div>


        {{-- {{ route('users.search') }} --}}
        <div class="div-table" style="margin-left:17%" >
            <table class="table" style="width: 95%;border-collapse: collapse;" >
                <thead>
                    <tr>
                        <th scope="col">NOM</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @if(count($users) > 0)
                        @foreach ($users as $u)
                            <tr>
                                <td>{{ $u->nom }}</td>
                                <td>{{ $u->prenom }}</td>
                                <td>{{ $u->location }}</td>
                                <td>{{ $u->email }}</td>
                                <td>
                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-delete-modal-{{ $u->id }}">Supprimer</button>
                                    <div class="modal fade" style="margin-top:300px" id="confirm-delete-modal-{{ $u->id }}" tabindex="-1" aria-labelledby="confirm-delete-modal-label-{{ $u->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirm-delete-modal-label-{{ $u->id }}">Confirmation de suppression</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">Êtes-vous sûr de vouloir supprimer ce utilisateur ? Cette action est irréversible.</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                                                    <form action="{{ route('users.user.delete',$u->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger" type="submit">Supprimer</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                        @endforeach
                    @else
                        <tr><td colspan="6">
                            <center><span style="color:red">l'élement recherché n'existe pas</span></center>
                        </td></tr>
                    @endif
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
