<?php  
    session_start();
    if(isset($_POST['email']) && isset($_POST['password']) ){
        include 'tools.php';
        $_SESSION['email']=$_POST['email'];
        $_SESSION['password']=$_POST['password'];
        Users($_POST['email'],$_POST['password']);
    }
?> 