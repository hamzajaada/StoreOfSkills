<!DOCTYPE html>
    <!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
        <link rel="stylesheet" href="css/barre.css">
        <!-- Boxicons CDN Link -->
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="sidebar">
            <div class="logo-details">
                <i class='bx bxl-c-plus-plus icon'></i>
                <div class="logo_name">Store <span style="color: rgb(234, 19, 170)">of</span> Skills</div>
                <i class="fa-solid fa-angle-right" id="btn"></i>
            </div>
            <div class="links">
                <ul class="nav-list">

                    {{--
                        <li>
                            <i class='bx bx-search' ></i>
                            <input type="text" placeholder="Search...">
                            <span style="color:black" class="tooltip">Search</span>
                        </li>
                    --}}
                    <li>
                        <a href="{{ route('home') }}">
                        <i class='bx bx-grid-alt'></i>
                        <span class="links_name">Accueil</span>
                        </a>
                        <span style="color:black" class="tooltip">Accueil</span>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}">
                            <i class='bx bx-user' ></i>
                            <span class="links_name">Profile</span>
                        </a>
                        <span style="color:black" class="tooltip">Profile</span>
                    </li>
                    <li>
                        <a href="{{ route('home.services') }}">
                            <i class="fa-solid fa-wrench"></i>
                            <span class="links_name">Services</span>
                        </a>
                        <span style="color:black" class="tooltip">Services</span>
                    </li>
                    <li>
                        <a href="{{ route('home.demandes') }}">
                            <i class="fa-solid fa-toolbox"></i>
                            <span class="links_name">Demandes</span>
                        </a>
                        <span style="color:black" class="tooltip">Demandes</span>
                    </li>
                    @if (Auth::user()->nom != 'Admine' AND Auth::user()->email != 'admin@gmail.com')
                        <li>
                            <a href="{{ route('home.reponses') }}">
                                <i class="fa-solid fa-reply"></i>
                                <span class="links_name">Commandes</span>
                            </a>
                            <span style="color:black" class="tooltip">Commades</span>
                        </li>
                        <li>
                            <a href="{{ route('home.reponse') }}">
                                <i class="fa-solid fa-reply"></i>
                                <span class="links_name">Reponses</span>
                            </a>
                            <span style="color:black" class="tooltip">Reponses</span>
                        </li>
                        <li>
                            <a href="{{ route('offres.create') }}">
                                <i class="fa-solid fa-plus"></i>
                                <span class="links_name"> offre</span>
                            </a>
                            <span  style="color:black"class="tooltip">Offre</span>
                        </li>
                        <li>
                            <a href="{{ route('home.vosservices') }}">
                                <i class="fa-solid fa-layer-group"></i>
                                <span class="links_name">vos services</span>
                            </a>
                            <span style="color:black" class="tooltip">vos services</span>
                        </li>
                        <li>
                            <a href="{{ route('home.vosdemandes') }}">
                                <i class="fa-solid fa-hand-holding"></i>
                                <span class="links_name">vos demandes</span>
                            </a>
                            <span style="color:black" class="tooltip">vos demandes</span>
                        </li>
                    @endif

                    @if (Auth::user()->nom == 'Admine' AND Auth::user()->email == 'admin@gmail.com')
                        <li>
                            <a href="{{ route('users.home.offres') }}">
                                <i class="fa-sharp fa-solid fa-list"></i>
                                <span class="links_name">Liste d'offres</span>
                            </a>
                            <span style="color:black" class="tooltip">Liste d'offres</span>
                        </li>
                        <li>
                            <a href="{{ route('admin.users') }}">
                                {{-- <i class="fa-solid fa-layer-group"></i> --}}
                                <i class="fa-sharp fa-solid fa-list"></i>
                                <span class="links_name">Liste d'utilisateurs</span>
                            </a>
                            <span style="color:black" class="tooltip">Liste d'utilisateurs</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>

        <script>
            let sidebar = document.querySelector(".sidebar");
            let closeBtn = document.querySelector("#btn");
            let searchBtn = document.querySelector(".bx-search");

            closeBtn.addEventListener("click", ()=>{
                sidebar.classList.toggle("open");
                menuBtnChange();//calling the function(optional)
            });

            searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
                sidebar.classList.toggle("open");
                menuBtnChange(); //calling the function(optional)
            });

            // following are the code to change sidebar button(optional)
            function menuBtnChange() {
            if(sidebar.classList.contains("open")){
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
            }else {
                closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
            }
            }
            </script>
            <script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>

    </body>
</html>

