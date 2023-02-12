<?php
    session_start();
    require_once('./functions.php');
    require_once('./style.php');

    $hibak = [];
    $felhasznalok = loadUsers("../felhasznalok.txt");
    //Név
    $name = $_POST['name'];
    if(!isset($name) || trim($name) === ""){
        $hibak[] = "regNameErr";
    }

    //Dátum
    $date = $_POST['date'];
    $dateValidation = '/^(19[0-9]{2}|2[0-9]{3})-(0[1-9]|1[012])-([123]0|[012][1-9]|31)$/';
    if(!preg_match($dateValidation, $date)){
        $hibak[] = "regDatumErr";
    }

    //Nem
    $sex = $_POST['sex'];
    if(!isset($sex) || trim($sex) ===  ""){
        $hibak[] = "regNemErr";
    }
     //Már létező felhasználó
    foreach ($felhasznalok as $felhasznalo) {
        if($felhasznalo['email'] === $_POST["email"] && $_SESSION['userEmail'] !== $_POST["email"])
        $hibak[] = "regEmailFoglErr";
    }
    //Email
    $email = $_POST['email'];
    $emailValidation = '/^([A-Z|a-z|0-9](\.|_){0,1})+[A-Z|a-z|0-9]\@([A-Z|a-z|0-9])+((\.){0,1}[A-Z|a-z|0-9]){2}\.[a-z]{2,3}$/';
    if(!preg_match($emailValidation,$email)){
        $hibak[] = "regEmailErr";
    }
    //Jelszó
    $pwd = $_POST['reg-pwd'];
    $password = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/';
    if(!preg_match($password,$pwd)){
        $hibak[] = "regPwdErr";
    }
    $pwda = $_POST['reg-pwda'];
    if($pwd !== $pwda){
        $hibak[] = "regPwdAErr";
    }
    // Módosítás
    if(count($hibak) === 0){
        changeUsers("../felhasznalok.txt", $name, $date, $sex, $email, $pwd, $pwda);
        header('Location: ./profile.php?changes=success');
    }
    else{
        $_SESSION['hibatomb'] = $hibak;
        header('Location: ./profile.php?modify=failed');
    }
?>