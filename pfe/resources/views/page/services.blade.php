<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
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
    {{--<section class="P-2">
        <h2 class="titre-part3">Les dernières <span id="span-t2">demandes</span></h2>
   <div class="services">

                <article>
                    <div class="info-per">
                         <div class="img-prfl"><img src="images/profil1.jpg" alt="" srcset=""></div>
                         <h4 class="info-prfl">Alyan GETEREZ</h4>
                    </div>
                    <div class="image-dem">
                            <img src="images/dem1.jpg" alt="" srcset="">
                    </div>
                    <div class="desc-dem">
                              <p class="text-dem">Bonjour, nous avons un problème de toilette bouché impossible de le débouché 
                                on apprécierait un coup de main pour ceux qui le peuvent
                              </p>
                    </div>
                </article>
                <article>
                    <div class="info-per">
                        <div class="img-prfl"><img src="images/profil2.jpg" alt="" srcset=""></div>
                        <h4 class="info-prfl">Mamado Sedebi</h4>
                    </div>
                    <div class="image-dem">
                        <img src="images/dem2.jpg" alt="" srcset="">
                    </div>
                    <div class="desc-dem">
                        <p class="text-dem">Bonjour, nous ne sommes pas véhiculé du coup nous recherchons
                             une personne véhiculé pour nous aider à récupérer un salon de jardin au 6 rue Clau
                          </p>
                    </div>
                </article>
                <article>
                    <div class="info-per">
                        <div class="img-prfl"><img src="images/profil3.jpg" alt="" srcset=""></div>
                        <h4 class="info-prfl">Mamado Sedebi</h4>
                    </div>
                    <div class="image-dem">
                        <img src="images/dem3.jpg" alt="" srcset="">

                    </div>
                    <div class="desc-dem">
                        <p class="text-dem">
                            Bonjour, Je souhaiterai que quelqu'un m'installe les étagères murales comme indiqué sur le croquis.
                             Notre mur est en placo, nous avons donc achete
                          </p>
                    </div>
                </article>

   </div>

                    <center><div class="button-serv"><a href="" class="texte-butser">Voir plus</a></div></center>
    </section>

<section class="P-3">
  <h2 class="titre-part4">Les dernières <span>services</span></h2>
<div class="demandes">
            <article>
                <div class="info-per">
                    <div class="img-prfl"><img src="images/profil4.jpg" alt="" srcset=""></div>
                    <h4 class="info-prfl">Ahmad FERAH</h4>
                </div>
                <div class="image-ser">
                    <img src="images/ser11.jpg" alt="" srcset="">
                </div>
                <div class="desc-ser">
                    <p class="text-ser">
                        Électricien de formation, je me propose de vous accompagner dans tous vos travaux d'électricité. Du simple dépannage aux travaux de rénovation ou d'installations les plus complexes. N'hésitez pas à me contacter
                      </p>
                </div>
            </article>
            <article>
                <div class="info-per">
                    <div class="img-prfl"><img src="images/moi.png" alt="" srcset=""></div>
                    <h4 class="info-prfl">Gabriel MARTINELY</h4>
                </div>
                <div class="image-ser">
                    <img src="images/plombier.png" alt="" srcset="">
                </div>
                <div class="desc-ser">
                    <p class="text-ser">
                        Notre entreprise de plomberie est fière de proposer un service professionnel et fiable à tous nos clients. Nous sommes spécialisés dans la réparation et l'installation de toutes sortes de systèmes de plomberie.
                      </p>
                </div>
            </article>
            <article>
                <div class="info-per">
                    <div class="img-prfl"><img src="images/photo-nurse.png" alt="" srcset=""></div>
                    <h4 class="info-prfl">Aya MOUZID</h4>
                </div>
                <div class="image-ser">
                    <img src="images/nurse.png" alt="" srcset="">
                </div>
                <div class="desc-ser">
                    <p class="text-ser">
                        En tant qu'infirmière, mon service est axé sur les soins et le bien-être de mes patients. J'ai une formation approfondie en anatomie, en physiologie et en pharmacologie, ce qui me permet de fournir des soins adaptés à chaque patient. 
                       
                      </p>
                </div>
            </article>
</div>

</section>
    
</div>--}}
<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
