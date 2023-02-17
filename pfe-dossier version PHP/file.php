<?php
    if(isset($_POST["inscription"])){
        $file=$_FILES['image'];
        $fileName=$_FILES['image']['name'];
        $fileTmpname=$_FILES['image']['tmp_name'] ;
        $fileSize=$_FILES['image']['size'] ;
        $fileError=$_FILES['image']['error'] ;
        $fileType=$_FILES['image']['type'] ;
        $fileExt=explode('.',$fileName);
        $fileActualExt=strtolower(end($fileExt));
        $allowed=array('jpg','jpge','png','jpeg');
        if(in_array($fileActualExt,$allowed)){
            if($fileError===0){
                if($fileSize<500000){
                    $fileNameNew=uniqid('',true).".".$fileActualExt;
                    $fileDestination="images/".$fileNameNew;
                    move_uploaded_file($fileTmpname,$fileDestination);
                }else{
                    echo 'photo de grand taille';
                }
            }else{
                echo 'on a une erreur de chargement de votre image!!';
            }
        }
        else{
            echo 'tu peut pas utiliser cette extension!!';
        }
    }

    if(isset($_POST["update_info"])){
        $file=$_FILES['image'];
        $fileName=$_FILES['image']['name'];
        $fileTmpname=$_FILES['image']['tmp_name'] ;
        $fileSize=$_FILES['image']['size'] ;
        $fileError=$_FILES['image']['error'] ;
        $fileType=$_FILES['image']['type'] ;
        $fileExt=explode('.',$fileName);
        $fileActualExt=strtolower(end($fileExt));
        $allowed=array('jpg','jpge','png','jpeg');
        if(in_array($fileActualExt,$allowed)){
            if($fileError===0){
                if($fileSize<500000){
                    $fileNameNew=uniqid('',true).".".$fileActualExt;
                    $fileDestination="images/".$fileNameNew;
                    move_uploaded_file($fileTmpname,$fileDestination);
                }else{
                    echo 'photo de grand taille';
                }
            }else{
                echo 'on a une erreur de chargement de votre image!!';
            }
        }
        else{
            echo 'tu peut pas utiliser cette extension!!';
        }
    }
?>