<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lOGIN</title>
    <link rel="stylesheet" href="css/style-login.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Bebas+Neue&family=Kanit:ital,wght@0,100;0,200;1,100&family=Poiret+One&family=Poppins:wght@100&family=Raleway:ital,wght@0,100;0,200;1,100;1,200&family=Rowdies:wght@700&family=Slabo+27px&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo"><img src="images/logo2.png" alt="" srcset=""></div>
        <nav>
            <li><a href="page-principale.php">Accueil</a></li>
            <li><a href="inscription.php">inscription</a></li>
        </nav>
    </header>
    <center>
        <article>
            <div class="image"><img src="images/logo2.png" alt="" srcset=""></div>
            <div class="form">
                <form action="connexion.php" method="post">
                    <div class="inputemail"><input type="email" name="email" placeholder="Email" id="email"></div><br>
                    <div class="inputpass"><input type="password" placeholder="Mot de passe" name="password" id="password"></div><br>
                    <input id="connexion" type="submit" name="connexion" value="connexion"><br>
                    <a id="ss" href="inscription.php">S'inscrire?</a>
                </form>
            </div>
        </article>
    </center>
</body>
</html>