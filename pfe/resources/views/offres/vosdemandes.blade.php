<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Services</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/services.css') }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Alegreya+Sans+SC:ital@1&family=Bebas+Neue&family=Dosis&family=Kanit:ital,wght@0,100;0,200;1,100&family=Open+Sans&family=Oswald&family=Poiret+One&family=Poppins:wght@500&family=Prompt:ital,wght@1,200&family=Questrial&family=Roboto+Condensed&family=Rowdies:wght@700&family=Slabo+27px&family=Unbounded:wght@300&display=swap" rel="stylesheet">

</head>
<body>
<div id="app">
    @extends('offres.fixeHeader')
    <section class="services-p">
        @extends('offres.fixeBarre')
        <section class="P-2">
        <h2 class="titre-part3">Votre <span id="span-t2" style="color:#3cb626">Demandes</span></h2>
        <div class="demandes">
            @foreach ($demandes as $d)
                <article>
                    <div class="info-per">
                        <div class="img-prfl"><img src="{{asset('image/'.$d->image)}}" alt="" srcset=""></div>
                        <h4 class="info-prfl">{{ $d->nom }} {{ $d->prenom }}</h4>
                    </div>
                    <div class="image-dem">
                        <img src="{{asset('image/'.$d->image_offre)}}" alt="" srcset="">
                    </div>
                    <div class="desc-dem">
                        <p class="text-dem">{{ $d->offre }}</p>
                    </div>
                    <div class="prix">
                        <p class="text-prix"><span style="color:#ff3c74"> Prix :</span>{{ $d->prix }}DH</p>
                    </div>
                    <div class="butns">
                        <div class="modf"><a class="btn btn-primary" href="{{ route('offres.edit',$d->id) }}" role="button">Modifier</a></div>
                        {{-- <form action="{{ route('offres.destroy',$d->id) }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="btn btn-danger" type="submit">Supprimer</button>
                        </form> --}}
                        <!-- Modal de confirmation de suppression -->
                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm-delete-modal-{{ $d->id }}">Supprimer</button>
                        <div class="modal fade" style="margin-top:300px" id="confirm-delete-modal-{{ $d->id }}" tabindex="-1" aria-labelledby="confirm-delete-modal-label-{{ $d->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="confirm-delete-modal-label-{{ $d->id }}">Confirmation de suppression</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                Êtes-vous sûr de vouloir supprimer cette demande ? Cette action est irréversible.
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <form method="POST" action="{{ route('users.offre.delete', $d->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Supprimer</button>
                                </form>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</section>
<script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>
</body>
</html>
<script>
    function confirmDelete(button) {
        if (confirm("Êtes-vous sûr de vouloir supprimer ce service?")) {
            button.form.submit();
        }
    }
</script>
