
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Store of Skills</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{--<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store of skills</title>--}}
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Phudu&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Acme&family=Alegreya+Sans+SC:ital@1&family=Bebas+Neue&family=Dosis&family=Kanit:ital,wght@0,100;0,200;1,100&family=Open+Sans&family=Oswald&family=Poiret+One&family=Poppins:wght@500&family=Prompt:ital,wght@1,200&family=Questrial&family=Roboto+Condensed&family=Rowdies:wght@700&family=Slabo+27px&family=Unbounded:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <nav style="position: fixed;width: 100%" class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" >
            Store <span style="color:#ff3c74">of</span>  Skills
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
    {{--<header class="main-header">
        <div class="container">
            <h2 class="container-h2">Store of  Skills</h2>
          <nav class="main-nav">
            <ul>
              <li><a href="{{ route('login') }}">Connexion</a></li>
              <li><a href="{{ route('register') }}">Inscription</a></li>
            </ul>
          </nav>
        </div>
      </header>--}}
      <section class="P-1">
        <div class="main-part1">
                 <div class="part1">
                        <div class="logo-part1"><img src="images/pinse-remove.png" alt="" srcset=""></div>
                        <h2 id="text-part1"> <span class="PROPOSER">Proposez</span>  & <span class="TROUVER">Trouvez</span> <br>
                            Les services et Les emplois près de chez vous.
                        </h2>
                </div>
        </div>
        <div class="part2">
                <a class="lien-part1" href="{{ route('login') }}"><div class="button-part1">Proposer un service</div></a>
                <a class="lien-part2" href="{{ route('login') }}"><div class="button-part2">Demander un service</div></a>
        </div>
    </section>
    <section class="P-2">
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
               <center><div class="button-serv"><a href="{{ route('login') }}" class="texte-butser">Voir plus</a></div></center>
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

              <center><div class="button-dem"><a href="{{ route('login') }}" class="texte-butdem">Voir plus</a></div></center>
</section>
<section class="P-4">
   <center><h1  class="store">Store Of <span class="skills">Skills</span></h1></center>
   <div class="cont-img">
    <div class="img-1"> <img src="images/homepage-bricolage-l.png" alt="" srcset="">
        <h3>1. Je réponds aux demandes <br> et réalise des prestations. </h3>
    </div>
    <div class="img-1">
        <img src="images/homepage-telephone-l.png" alt="" srcset="">
        <h3>2. Je suis payé et évalué.

        </h3>
    </div>
    <div class="img1">
        <img src="images/homepage-telephone-vibre-l.png" alt="" srcset="">
        <h3>3. Je suis alerté en temps réel des <br> demandes postées autour de moi.</h3>
    </div>
   </div>
   <center><div class="button-pre-ser"><a href="{{ route('login') }}" class="texte-pre-ser"> Je propose mes services</a></div></center>
</section>
<section class="P-5">
  <center> <h1 class="notif-titre">Développez votre activité avec <span class="S">Store </span> of <span class="K">Skills</span> </h1></center>
    <div class="notif">
        <div class="not1">
             <h1 class="titre-not1">Trouvez <br> des clients</h1>
             <div class="desc">
             <h3 class="h3-notif"><i class="fa-sharp fa-regular fa-handshake"></i>4 millions de membres</h3>
             <h3 class="h3-notif"><i class="fa-brands fa-shopify"></i> Des milliers de demandes chaque jour</h3>
             <h3 class="h3-notif"><i class="fa-solid fa-globe"></i>Partout en Maroc</h3>
            </div>
        </div>
        <div class="not2">
            <h1 class="titre-not2">Développez <br> votre visibilité</h1>
            <div class="desc">
            <h3 class="h3-notif"><i class="fa-solid fa-magnifying-glass"></i>Référencement de votre profil sur les moteurs de recherche</h3>
             <h3 class="h3-notif"><i class="fa-regular fa-star"></i>Collecte de vos avis clients</h3>
             <h3 class="h3-notif"><i class="fa-regular fa-address-card"></i>Cartes de visite et prospectus personnalisés</h3>
            </div>
        </div>
        <div class="not3">
            <h1 class="titre-not3">Gérez <br> votre activité</h1>
            <div class="desc">
            <h3 class="h3-notif"><i class="fa-solid fa-file-invoice"></i>Création et envoi de vos devis et factures à tous vos clients</h3>
             <h3 class="h3-notif"><i class="fa-regular fa-credit-card"></i>Paiement par carte bancaire sans commission</h3>
             <h3 class="h3-notif"><i class="fa-solid fa-arrow-up-right-dots"></i>Suivi de votre chiffre d'affaires</h3>
            </div>
        </div>
</div>
<center><div class="button-inscr"><a href="{{ route('register') }}" class="texte-inscr"> Je m'inscrire</a></div></center>

</section>
@extends('page.footer')
<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
