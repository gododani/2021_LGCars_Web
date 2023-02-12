<?php 
include('./functions.php');
include('./style.php');
if(isset($_POST['login'])){
    $userEmail = $_POST["login-email"];
    $userPassword = $_POST["login-password"];
    $felhasznalok = loadUsers("../felhasznalok.txt");
    if(!isset($userEmail) || trim($userEmail) === ""){
        header("Location: ../index.php?error=emptyEmail#modal-fooldal");
    }
    else if(!isset($userPassword) || trim($userPassword) === ""){
        header("Location: ../index.php?error=emptyPwd#modal-fooldal");
    }
    else{
        foreach($felhasznalok as $felhasznalo){
            if ($felhasznalo["email"] === $userEmail && $felhasznalo["reg-pwd"] === $userPassword){
                session_start();
                $_SESSION["userEmail"] = $userEmail;
                header("Location: ../index.php?login=success");
                exit();
            }
        }
        session_start();
        header("Location: ../index.php?logError#modal-fooldal");
        exit();
    }
}else{
    header("Location: ../index.php?logError#modal-fooldal");
}