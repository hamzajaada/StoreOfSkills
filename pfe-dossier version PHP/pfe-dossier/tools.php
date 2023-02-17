<?php
	//get users avec nom et password
    function getUsers($email,$password){
        try{
            $con=new PDO('mysql:host=localhost;dbname=services','root','');
            $req = $con->prepare('SELECT * FROM utilisateurs WHERE email = :email and password = :password ;');
            $req->execute([ 'email'=>$email , 'password'=>$password ]);
            $res=$req->fetch();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $res;
    }

    //verification user
    function Users($email,$password){
        try{
            $con=new PDO('mysql:host=localhost;dbname=services','root','');
            $req = $con->prepare('SELECT password FROM utilisateurs WHERE email = :email;');
            $req->execute(['email'=>$email]);
            $res=$req->fetch();
            if($res['password']===$password){
                header('location:pageparlogin.php');
            }else{
                header('location:page-principale.php');
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

	//ajoute users
    function add_user($nom,$prenom,$email,$password,$location,$role,$image){
        try{
            $db = new PDO('mysql:host=localhost;dbname=services','root',''); 
            $req = $db->prepare('insert into utilisateurs(nom,prenom,email,password,location,role,image) values (:nom,:prenom,:email,:password,:location,:role,:image)');
            $req->execute(['nom'=>$nom,'prenom'=>$prenom,'email'=>$email,'password'=>$password,'location'=>$location,'role'=>$role,'image'=>$image]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

	//get service
    function get_service(){
        try{
            $con=new PDO('mysql:host=localhost;dbname=services','root','');
            $req=$con->prepare("SELECT * FROM services");
            $req->execute();
            $res=$req->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $res;
    }

	//get service filtrer
    function get_service_filtrer($nom,$email){
        try{
            $con=new PDO('mysql:host=localhost;dbname=services','root','');
            $req=$con->prepare("SELECT * FROM services WHERE nom=:nom AND email=:email ");
            $req->execute(["nom"=>$nom, "email"=>$email]);
            $res=$req->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $res;
    }

	//ajoute service
    function ajouter_srv($nom,$prenom,$service,$email,$img){
        try{
            $con=new PDO('mysql:host=localhost;dbname=services','root','');
            $req=$con->prepare('INSERT INTO services(nom,prenom,nom_service,email,image) values (:nom,:prenom,:service,:email,:img);');
            $req->execute(["nom"=>$nom,"prenom"=>$prenom,"service"=>$service,"email"=>$email,"img"=>$img]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
	
	//modifier service
    function modifier_srv($id,$nom,$prenom,$service,$email,$img){
        try{
            $con=new PDO('mysql:host=localhost;dbname=services','root','');
            $req=$con->prepare(' UPDATE services SET (nom =:nom,prenom =:prenom,nom_service=:service,email=:email,image=:img) WHERE id_service = :id ;');
            $req->execute(["id"=>$id,"nom"=>$nom,"prenom"=>$prenom,"service"=>$service,"email"=>$email,"img"=>$img]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

	//suprimer service
    function supprimer_service($id){
        try{
            $con=new PDO('mysql:host=localhost;dbname=services','root','');
            $req=$con->prepare("DELETE * FROM services WHERE id_service = :id");
            $req->execute(["id"=>$id]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

	//get demande
    function get_demande(){
        try{
            $con=new PDO('mysql:host=localhost;dbname=services','root','');
            $req=$con->prepare("SELECT * FROM demande");
            $req->execute();
            $res=$req->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $res;
    }
	//get demande filtrer
    function get_demande_filtrer($nom,$email){
        try{
            $con=new PDO('mysql:host=localhost;dbname=services','root','');
            $req=$con->prepare("SELECT * FROM demande where nom_dem=:nom and email=:email");
            $req->execute([ "nom"=>$nom , "email"=>$email ]);
            $res=$req->fetchAll();
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $res;
    }

	//ajoute demande
    function ajouter_dem($nom,$prenom,$service,$email){
        try{
            $con=new PDO('mysql:host=localhost;dbname=services','root','');
            $req=$con->prepare('INSERT INTO demande(nom_dem,prenom_dem,service,email) values (:nom,:prenom,:service,:email);');
            $req->execute(["nom"=>$nom,"prenom"=>$prenom,"service"=>$service,"email"=>$email]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

	//modifier demande
    function modifier_dem($id,$nom,$prenom,$service,$email){
        try{
            $con=new PDO('mysql:host=localhost;dbname=services','root','');
            $req=$con->prepare(' UPDATE demande SET (nom_dem =:nom,prenom_dem =:prenom,service=:service,email=:email) WHERE id_demande = :id ;');
            $req->execute(["id"=>$id,"nom"=>$nom,"prenom"=>$prenom,"service"=>$service,"email"=>$email]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

	//supprimer demande
    function supprimer_demande($id){
        try{
            $con=new PDO('mysql:host=localhost;dbname=services','root','');
            $req=$con->prepare("DELETE * FROM demande WHERE id_demande = :id");
            $req->execute(["id"=>$id]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //modification de nom et prenom et email
    function mofifier_profile_info($id,$nom,$prenom,$email,$location){
        try{
            $con=new PDO('mysql:host=localhost;dbname=services','root','');
            $req=$con->prepare('update utilisateurs set Nom= :nom, Prenom= :prenom, Email= :email,Location= :location where id=:id');
            $req->execute(["id"=>$id,"nom"=>$nom,"prenom"=>$prenom,"email"=>$email,"location"=>$location]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
?>