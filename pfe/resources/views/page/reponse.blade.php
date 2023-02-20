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
    @extends('page.fixeHeader')
    <section class="main-sec1">
        @extends('page.fixeBarre')
    </section>

    <br><h2 style="text-align:center;margin-right:20%;margin-top:30px">Table de <span style="color:#ff3c74">services</span></h2><br>
    <div class="div-table" style="height: 350px; overflow-y: auto;" >
        <table class="table" style="width: 85%;border-collapse: collapse;" >
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Service</th>
                    <th scope="col">Demander par</th>
                    <th scope="col">Email</th>
                    <th scope="col" colspan="2">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td>Elgallati</td>
                    <td>Abdelilah</td>
                    <td>Service</td>
                    <td>Hamza</td>
                    <td>Hamza@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Jaada</td>
                    <td>Hamza</td>
                    <td>Service</td>
                    <td>Abdelilah</td>
                    <td>Abdelilah@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Elgallati</td>
                    <td>Abdelilah</td>
                    <td>Service</td>
                    <td>Hamza</td>
                    <td>Hamza@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Jaada</td>
                    <td>Hamza</td>
                    <td>Service</td>
                    <td>Abdelilah</td>
                    <td>Abdelilah@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Elgallati</td>
                    <td>Abdelilah</td>
                    <td>Service</td>
                    <td>Hamza</td>
                    <td>Hamza@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Jaada</td>
                    <td>Hamza</td>
                    <td>Service</td>
                    <td>Abdelilah</td>
                    <td>Abdelilah@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Elgallati</td>
                    <td>Abdelilah</td>
                    <td>Service</td>
                    <td>Hamza</td>
                    <td>Hamza@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Jaada</td>
                    <td>Hamza</td>
                    <td>Service</td>
                    <td>Abdelilah</td>
                    <td>Abdelilah@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Elgallati</td>
                    <td>Abdelilah</td>
                    <td>Service</td>
                    <td>Hamza</td>
                    <td>Hamza@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Jaada</td>
                    <td>Hamza</td>
                    <td>Service</td>
                    <td>Abdelilah</td>
                    <td>Abdelilah@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
            </tbody>
        </table>
    </div>

    <br><h2 style="text-align:center;margin-right:20%;margin-top:30px">Table de <span style="color:#3cb626">demandes</span></h2><br>
    <div class="div-table" style="height: 350px; overflow-y: auto;margin-bottom:30px" >
        <table class="table" style="width: 85%;" >
            <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Service</th>
                <th scope="col">Prestater par</th>
                <th scope="col">Email</th>
                <th scope="col" colspan="2">Action</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <td>Elgallati</td>
                    <td>Abdelilah</td>
                    <td>Demandes</td>
                    <td>Hamza</td>
                    <td>Hamza@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Jaada</td>
                    <td>Hamza</td>
                    <td>Demandes</td>
                    <td>Abdelilah</td>
                    <td>Abdelilah@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Elgallati</td>
                    <td>Abdelilah</td>
                    <td>Demandes</td>
                    <td>Hamza</td>
                    <td>Hamza@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Jaada</td>
                    <td>Hamza</td>
                    <td>Demandes</td>
                    <td>Abdelilah</td>
                    <td>Abdelilah@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Elgallati</td>
                    <td>Abdelilah</td>
                    <td>Demandes</td>
                    <td>Hamza</td>
                    <td>Hamza@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Jaada</td>
                    <td>Hamza</td>
                    <td>Demandes</td>
                    <td>Abdelilah</td>
                    <td>Abdelilah@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Elgallati</td>
                    <td>Abdelilah</td>
                    <td>Demandes</td>
                    <td>Hamza</td>
                    <td>Hamza@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Jaada</td>
                    <td>Hamza</td>
                    <td>Demandes</td>
                    <td>Abdelilah</td>
                    <td>Abdelilah@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Elgallati</td>
                    <td>Abdelilah</td>
                    <td>Demandes</td>
                    <td>Hamza</td>
                    <td>Hamza@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
                <tr>
                    <td>Jaada</td>
                    <td>Hamza</td>
                    <td>Demandes</td>
                    <td>Abdelilah</td>
                    <td>Abdelilah@gmail.com</td>
                    <td><button type="submit" class="btn btn-success">Accepter</button></td>
                    <td><button type="submit" class="btn btn-danger">Reffuser</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
