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
    <header class="main-header">
        <div class="container">
            <h2 class="container-h2">Store of  Skills</h2>
          <nav class="main-nav">
            <ul>
              <li><a href="{{ route('welcome') }}">Accueil</a></li>
              <li><a href="{{ route('welcome') }}">logout</a></li>
            </ul>
          </nav> 
        </div>
      </header> 
      <section class="main-sec1">
        <div class="barre">
            <div class="infoper"><img src=" " alt="" srcset=""><h3>Hamza JAADA</h3></div>
            <div class="botton">
            <i class="fa-sharp fa-solid fa-address-card"></i><a class="vos" href="profil.php">Profil</a><br>
            <i class="fa-solid fa-toolbox"></i><a class="vos" href="profil.php">vos demandes</a><br>
            <i class="fa-solid fa-wrench"></i><a class="vos" href="profil.php">vos services</a><br>
            <i class="fa-solid fa-arrow-right-from-bracket"></i><a class="vos" href="logout.php">logout</a><br>
            </div>
        </div>
      </section>
      <section class="P-1">
        <div class="main-part1">
                 <div class="part1">
                        <h2 id="text-part1"> <span class="PROPOSER">Proposez</span>  & <span class="TROUVER">Trouvez</span> <br>
                            Les services et Les emplois près de <br> chez vous.
                        </h2>
                </div>
        </div>
        <div class="part2">
                <a class="lien-part1" href="login.php"><div class="button-part1">Proposer un service</div></a>
                <a class="lien-part2" href="login.php"><div class="button-part2">Demander un service</div></a>
        </div>
    </section>

        <script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>

</body>
</html>