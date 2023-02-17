<?php 
    session_start();
    include 'tools.php';
    $data=getUsers($_SESSION['Email'],$_SESSION['Password']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store of skills</title>
    <link rel="stylesheet" href="css/style-connexion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Bebas+Neue&family=Kanit:ital,wght@0,100;0,200;1,100&family=Poiret+One&family=Poppins:wght@100&family=Raleway:ital,wght@0,100;0,200;1,100;1,200&family=Rowdies:wght@700&family=Slabo+27px&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <div class="logo"><img src="images/logo2.png" alt="" srcset=""></div>
            <ul>
                <li><a class="inscription" href="service.php">Services</a></li>
                <li><a class="inscription" href="demande.php">Demandes</a></li>
            </ul>
        </nav>
    </header> 
    <section>
        <div class="barre">
            <div class="infoper"><img src="<?php echo $data['Image'] ?>" alt="" srcset=""><h3><?php echo $data['Nom'].' '.$data['Prenom'] ?></h3></div>
            <div class="botton">
            <i class="fa-sharp fa-solid fa-address-card"></i><a class="profil" href="profil.php">Profil</a><br>
            <i class="fa-solid fa-toolbox"></i><a class="vosdemande" href="profil.php">vos demandes</a><br>
            <i class="fa-solid fa-wrench"></i><a class="vosservice" href="profil.php">vos services</a><br>
            <i class="fa-solid fa-arrow-right-from-bracket"></i><a class="vosservice" href="logout.php">logout</a><br>
            </div>
        </div>
        <div class="intro">
            <div class="p1">
                <div class="logo1"><img src="images/logo2.png" alt="" srcset=""></div>
                <h2> <span>Proposez</span>  & <span>trouvez</span> <br>
                    les services et les emplois près de chez vous.</h2>
            </div>
            <center><div class="p2">
                <a href="add-service.php"><div class="button1">proposer un service</div></a>
                <a href="add-demande.php"><div class="button2">demander un service</div></a>
            </div></center>
        </div>
    </section>
    <footer>
        <a href=""><i class="fa-brands fa-instagram"></i></a>
        <a href=""><i class="fa-brands fa-facebook"></i></a>
        <a href=""><i class="fa-regular fa-envelope"></i></a>
        <a href=""><i class="fa-solid fa-location-dot"></i></a>
    </footer>


    <script src="https://kit.fontawesome.com/6fe423de62.js" crossorigin="anonymous"></script>

</body>
</html>

