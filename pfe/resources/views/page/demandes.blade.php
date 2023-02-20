<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demmandes</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Alegreya+Sans+SC:ital@1&family=Bebas+Neue&family=Dosis&family=Kanit:ital,wght@0,100;0,200;1,100&family=Open+Sans&family=Oswald&family=Poiret+One&family=Poppins:wght@500&family=Prompt:ital,wght@1,200&family=Questrial&family=Roboto+Condensed&family=Rowdies:wght@700&family=Slabo+27px&family=Unbounded:wght@300&display=swap" rel="stylesheet">

</head>
<body>
<div id="app">
    @extends('page.fixeHeader')
    <section class="services-p">
                @extends('page.fixeBarre')

        <section class="P-2">
                <h2 class="titre-part3">Les dernières <span id="span-t2" style="color:#4fdd36">demandes</span></h2>
                        <div class="demandes">
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
                                    <center><div class="button-postuller"><a href="" class="but-post">Postuler</a></div></center>

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
                                    <center><div class="button-postuller"><a href="" class="but-post">Postuler</a></div></center>

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
                                    <center><div class="button-postuller"><a href="" class="but-post">Postuler</a></div></center>

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
                                    <center><div class="button-postuller"><a href="" class="but-post">Postuler</a></div></center>

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
                                    <center><div class="button-postuller"><a href="" class="but-post">Postuler</a></div></center>

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
                                    <center><div class="button-postuller"><a href="" class="but-post">Postuler</a></div></center>

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
                                    <center><div class="button-postuller"><a href="" class="but-post">Postuler</a></div></center>

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
                                    <center><div class="button-postuller"><a href="" class="but-post">Postuler</a></div></center>
                                </article>


                        </div>


         </section>
        </section>


<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
