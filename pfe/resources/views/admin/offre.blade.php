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
    <nav style="position: fixed;width: 100%" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}" >
                Store <span style="color:orangered">of</span>  Skills
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->nom}} {{ Auth::user()->prenom}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <section class="main-sec1">
        <div class="barre">
            <div class="botton">
                <i class="fa-sharp fa-solid fa-address-card"></i><a class="vos" href="profil.php">Profil</a><br>
                <i class="fa-solid fa-wrench"></i><a class="vos" href="profil.php">Services</a><br>
                <i class="fa-solid fa-toolbox"></i><a class="vos" href="profil.php">Demandes</a><br>
                <i class="fa-solid fa-wrench"></i><a class="vos" href="profil.php">vos services</a><br>
                <i class="fa-solid fa-toolbox"></i><a class="vos" href="profil.php">vos demandes</a><br>
            </div>
        </div>
    </section>
    <br>
    <h1 style="text-align:center;margin-right:20%;margin-top:30px">Table d'offres</h1><br><br>
    <table class="table" style="width: 85%;" >
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">NOM</th>
            <th scope="col">Prenom</th>
            <th scope="col">Type</th>
            <th scope="col">Categorie</th>
            <th scope="col">Offre</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        <tr>
            <th scope="row">1</th>
            <td>Elgallati</td>
            <td>Abdelilah</td>
            <td>Type</td>
            <td>Categorie</td>
            <td>Offre</td>
            <td><button type="submit" class="btn btn-danger">Supprimer</button></td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jaada</td>
            <td>Hamza</td>
            <td>Type</td>
            <td>Categorie</td>
            <td>Offre</td>
            <td><button type="submit" class="btn btn-danger">Supprimer</button></td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Elgallati</td>
            <td>Mahdi</td>
            <td>Type</td>
            <td>Categorie</td>
            <td>Offre</td>
            <td><button type="submit" class="btn btn-danger">Supprimer</button></td>
        </tr>
        </tbody>
    </table>
</div>
<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
