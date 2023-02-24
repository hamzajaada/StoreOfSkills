
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/pageparlogin.css">
</head>
<body>
    <div>
    @extends('offres.fixeHeader')
    </div>
    <div>
        @extends('offres.fixeBarre')
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




