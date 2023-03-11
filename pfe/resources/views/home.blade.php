
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/pageparlogin.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Alegreya+Sans+SC:ital@1&family=Bebas+Neue&family=Dosis&family=Kanit:ital,wght@0,100;0,200;1,100&family=Open+Sans&family=Oswald&family=Poiret+One&family=Poppins:wght@500&family=Prompt:ital,wght@1,200&family=Questrial&family=Roboto+Condensed&family=Rowdies:wght@700&family=Slabo+27px&family=Unbounded:wght@300&display=swap" rel="stylesheet">

</head>
<body>
    <div>
    @extends('offres.fixeHeader')
    </div>
    <div>
        @extends('offres.fixeBarre')
        {{-- hh --}}
    </div>
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
                <a class="lien-part1" href="{{ route('offres.create') }}"><div class="button-part1">Proposer un service</div></a>
                <a class="lien-part2" href="{{ route('offres.create') }}"><div class="button-part2">Demander un service</div></a>
        </div>
    </section>
</body>
</html>




