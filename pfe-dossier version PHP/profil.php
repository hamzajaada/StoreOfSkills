<?php 
    session_start();
    include 'tools.php';
    $data=getUsers($_SESSION['email'],$_SESSION['password']);
    if(isset($_POST['update_info'])){
        mofifier_profile_info($data['id'],$_POST['nom'],$_POST['prenom'],$_POST['email'],$_POST['location']);
        header('location:pageparlogin.php');
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/style-profil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Bebas+Neue&family=Kanit:ital,wght@0,100;0,200;1,100&family=Poiret+One&family=Poppins:wght@100&family=Raleway:ital,wght@0,100;0,200;1,100;1,200&family=Rowdies:wght@700&family=Slabo+27px&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <nav>
            <div class="logo"><img src="images/logo2.png" alt="" srcset=""></div>
            <h3>Profile</h3>
            <ul>
                <li><a class="inscription" href="pageparlogin.php">Acceuil</a></li>
                <li><a class="inscription" href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header> 

    <div class="profile-information">
        <form action="#" method="post">
            <h2>Information de profile</h2><br>
            <div class="input"><input type="text" value="<?php echo $data['Nom'] ?>" name="nom" placeholder="Nom" class="input-txt"></div><br>
            <div class="input"><input type="text" value="<?php echo $data['Prenom'] ?>" name="prenom" placeholder="Prenom" class="input-txt"></div><br>
            <div class="input"><input type="text" value="<?php echo $data['Location'] ?>" name="location" placeholder="Adresse" class="input-txt"></div><br>
            <div class="input"><input type="email" value="<?php echo $data['Email'] ?>" name="email" placeholder="Email" class="input-txt"></div><br>
            <input type="submit" class="btn-submit" name="update_info" value="Save">
        </form>
    </div>

    <div class="update-password">
        <form action="#" method="post">
            <h2>Modification de mot de passe</h2><br>
            <div class="input"><input type="password" id="password" placeholder="Mot de passe actuelle" class="input-password"></div><br>
            <div class="input"><input type="password" id="nv-password" placeholder="Nouveau mot de passe" class="input-password"></div><br>
            <div class="input"><input type="password" id="cfm-password" placeholder="Confirmer votre mot de passe" class="input-password"></div><br>
            <input type="submit" class="btn-submit" name="update_password" value="Save">
        </form>
    </div>

    <div class="delete-account">
        <h2>Supprimer votre compte</h2>
        <p>Si vous voulez supprimer votre compte il suffit de cliquer sur supprimer mon compte</p>
        <input type="submit" class="btn-submit" value="Supprimer mon compte">
    </div>

    <div class="service-personnel">
        <h2>Service personnel</h2>
        <div class="contenue">
            <article>
                <img src="images/personne.jpg" alt="" srcset="">
                <h3>PRENOM Nom</h3>
                <p>Email</p>
                <p>Location</p>
                <p>Service</p>
                <button type="submit">Modifier</button>
                <button type="submit">Supprimer</button>
            </article>
            <article>
                <img src="images/personne.jpg" alt="" srcset="">
                <h3>PRENOM Nom</h3>
                <p>Email</p>
                <p>Location</p>
                <p>Service</p>
                <button type="submit">Modifier</button>
                <button type="submit">Supprimer</button>
            </article>
            <article>
                <img src="images/personne.jpg" alt="" srcset="">
                <h3>PRENOM Nom</h3>
                <p>Email</p>
                <p>Location</p>
                <p>Service</p>
                <button type="submit">Modifier</button>
                <button type="submit">Supprimer</button>
            </article>
            <article>
                <img src="images/personne.jpg" alt="" srcset="">
                <h3>PRENOM Nom</h3>
                <p>Email</p>
                <p>Location</p>
                <p>Service</p>
                <button type="submit">Modifier</button>
                <button type="submit">Supprimer</button>
            </article>
            <article>
                <img src="images/personne.jpg" alt="" srcset="">
                <h3>PRENOM Nom</h3>
                <p>Email</p>
                <p>Location</p>
                <p>Service</p>
                <button type="submit">Modifier</button>
                <button type="submit">Supprimer</button>
            </article>
            <article>
                <img src="images/personne.jpg" alt="" srcset="">
                <h3>PRENOM Nom</h3>
                <p>Email</p>
                <p>Location</p>
                <p>Service</p>
                <button type="submit">Modifier</button>
                <button type="submit">Supprimer</button>
            </article>
        </div>
    </div>

    <div class="demande-personnel">
        <h2>Demande personnel</h2>
        <div class="contenue">
            <article>
                <img src="images/personne.jpg" alt="" srcset="">
                <h3>PRENOM Nom</h3>
                <p>Email</p>
                <p>Location</p>
                <p></p>
                <button type="submit">Modifier</button>
                <button type="submit">Supprimer</button>
            </article>
            <article>
                <img src="images/personne.jpg" alt="" srcset="">
                <h3>PRENOM Nom</h3>
                <p>Email</p>
                <p>Location</p>
                <p>Demande</p>
                <button type="submit">Modifier</button>
                <button type="submit">Supprimer</button>
            </article>
            <article>
                <img src="images/personne.jpg" alt="" srcset="">
                <h3>PRENOM Nom</h3>
                <p>Email</p>
                <p>Location</p>
                <p>Demande</p>
                <button type="submit">Modifier</button>
                <button type="submit">Supprimer</button>
            </article>
            <article>
                <img src="images/personne.jpg" alt="" srcset="">
                <h3>PRENOM Nom</h3>
                <p>Email</p>
                <p>Location</p>
                <p></p>
                <button type="submit">Modifier</button>
                <button type="submit">Supprimer</button>
            </article>
            <article>
                <img src="images/personne.jpg" alt="" srcset="">
                <h3>PRENOM Nom</h3>
                <p>Email</p>
                <p>Location</p>
                <p>Demande</p>
                <button type="submit">Modifier</button>
                <button type="submit">Supprimer</button>
            </article>
            <article>
                <img src="images/personne.jpg" alt="" srcset="">
                <h3>PRENOM Nom</h3>
                <p>Email</p>
                <p>Location</p>
                <p>Demande</p>
                <button type="submit">Modifier</button>
                <button type="submit">Supprimer</button>
            </article>
            <article>
                <img src="images/personne.jpg" alt="" srcset="">
                <h3>PRENOM Nom</h3>
                <p>Email</p>
                <p>Location</p>
                <p></p>
                <button type="submit">Modifier</button>
                <button type="submit">Supprimer</button>
            </article>
            <article>
                <img src="images/personne.jpg" alt="" srcset="">
                <h3>PRENOM Nom</h3>
                <p>Email</p>
                <p>Location</p>
                <p>Demande</p>
                <button type="submit">Modifier</button>
                <button type="submit">Supprimer</button>
            </article>
            <article>
                <img src="images/personne.jpg" alt="" srcset="">
                <h3>PRENOM Nom</h3>
                <p>Email</p>
                <p>Location</p>
                <p>Demande</p>
                <button type="submit">Modifier</button>
                <button type="submit">Supprimer</button>
            </article>
        </div>
    </div>
</body>
</html>