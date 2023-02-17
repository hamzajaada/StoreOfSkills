<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style-add-demande.css">
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Bebas+Neue&family=Kanit:ital,wght@0,100;0,200;1,100&family=Poiret+One&family=Poppins:wght@100&family=Raleway:ital,wght@0,100;0,200;1,100;1,200&family=Rowdies:wght@700&family=Slabo+27px&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo"><img src="images/logo2.png" alt="" srcset=""></div>
        <nav>
            <li><a href="pageparlogin.php">Accueil</a></li>
            <li><a href="logout.php">Logout</a></li>
        </nav>
    </header>
        <center>
            <article>
            <div class="image"><img src="logo2.png" alt="" srcset=""></div>
            <div class="form">
                <form action="">
                    <section>
                    <div class="inputemail"><input type="nom" name="nom" placeholder="Nom" id="nom"></div><br>
                    <div class="inputpass"><input type="prenom" placeholder="Prenom" name="prenom" id="prenom"></div><br>
                    <div class="inputpass"><input type="email" placeholder="Email" name="email" id="email"></div><br>
                    <div class="inputadresse"><input type="adresse" placeholder="Adresse" name="adresse" id="adresse"></div><br>
                    </section>
                    <section>
                        <div class="inputdemande"><textarea name="message" placeholder="ecrivez votre sevice" id="" ></textarea></div>
                        <div class="inputimage"><label for="file">Sélectionner une photo de votre service</label> </div>
                        <div class="fileinput"><input type="file" id="file" name="file" multiple> </div><br>
                        <input id="connexion" type="submit" value="envoyer"> <br>
                    </section>
                </form>
            </div>
        </article>
    </center>
</body>
</html>