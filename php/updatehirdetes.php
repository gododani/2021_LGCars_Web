<?php 

include('./functions.php');
session_start();
$hirdetesek = loadUsers("../hirdetesek.txt");

if(isset($_POST['hird-submit']) && isset($_SESSION['userEmail'])){
    $hibak = [];

    //Név
    $name = $_POST['hirdetes-nev'];
    if(!isset($name) || trim($name) === ""){
        $hibak[] = "adNameErr";
    }

    //Telefonszám
    $telefonszam = $_POST['hird-telefonszam'];
    $telPattern = '/^[0-9]{2}[0-9]{9}/';
    if(!preg_match($telPattern,$telefonszam)){
        $hibak[] = "adTelFormatErr";
    }

    //Irányítószám
    $atadasIranyitoszam = $_POST['hird-postcode'];
    $iranyitoszamValidation = '/^[1-9]{1}[0-9]{3}/';
    if(!preg_match($iranyitoszamValidation,$atadasIranyitoszam)){
        $hibak[] = "adAtadasPostcodeErr";
    }

    //Város
    $atadasVaros = $_POST['hird-city'];
    $VarosValidation = '/^([A-Z]|[ÍÉÁŐŰÚÓ]){1}([a-z]|[íéáőűúó]){1,}$/';
    if(!preg_match($VarosValidation,$atadasVaros)){
        $hibak[] = "adAtadasCityFormatErr";
    }

    //Utca
    $utca = $_POST['hird-street'];
    if(!isset($utca) || trim($utca) === ""){
        $hibak[] = "adAtadasStreetEmptyErr";
    }

    //Email
    $email = $_POST['hird-email'];
    $emailValidation = '/^([A-Z|a-z|0-9](\.|_){0,1})+[A-Z|a-z|0-9]\@([A-Z|a-z|0-9])+((\.){0,1}[A-Z|a-z|0-9]){2}\.[a-z]{2,3}$/';
    if(!preg_match($emailValidation,$email)){
        $hibak[] = "adEmailErr";
    }

    //Ár
    $ar = $_POST['hirdetes-ar'];
    $arPatter = '/^[1-9]{1}[0-9]{1,}/';
    if(!preg_match($arPatter,$ar)){
        $hibak[] = "adPriceErr";
    }

    //Adatok
    $adatok = $_POST['hird-adatok'];
    if(!isset($adatok) || trim($adatok) === ""){
        $hibak[] = "adAdatokErr";
    }

    //Gép tipus
    $geptipus = $_POST['gep-tipusok'];
    if(!isset($geptipus) || trim($geptipus) === ""){
        $hibak[] = "adTypeErr";
    }
    if($geptipus === "egyeb"){
        if(!isset($_POST['egyeb-input']) || trim($_POST['egyeb-input']) === ""){
            $hibak[] = "adEgyebTypeErr";
        }
        else{
            $geptipus = $_POST['egyeb-input'];
        }
    }

    foreach($hirdetesek as $hirdetes){
        if($hirdetes['name'] == $name && $hirdetes['telefonszam'] == $telefonszam && $hirdetes['atadasIranyitoszam'] == $atadasIranyitoszam && 
         $hirdetes['atadasVaros'] == $atadasVaros && $hirdetes['utca'] == $utca && $hirdetes['email'] == $email && 
         $hirdetes['ar'] == $ar && $hirdetes['adatok'] == $adatok && $hirdetes['geptipus'] == $geptipus){
            $hibak[] = "error";
            header('Location: ./hirdetes.php?hirdetes=existing');
        }
    }

    //Kép
    $fajlnev = $_FILES['hird-kepfelt']['name'];
    $kep = $fajlnev;
    $kiterjesztesek = array("jpg", "png", "jpeg");
    $darabok = explode(".", $fajlnev);            
    $kiterjesztes = strtolower(end($darabok)); 
    $cel_utvonal = "../feltoltesek/".$fajlnev;
    
    if(!in_array($kiterjesztes, $kiterjesztesek)){
        $hibak[] = "kepKiterjError";
    }
    else{
        if(file_exists($cel_utvonal)){
            $hibak[] = "kepExistError";
        }else{
            if(count($hibak) === 0){
                if (!move_uploaded_file($_FILES['hird-kepfelt']['tmp_name'], $cel_utvonal)) {
                    $hibak[] = "kepFeltError";
                }
            }
        }
    }

    if(count($hibak) === 0){
        $hirdetesek[] = ["name" => $name, "telefonszam" =>  $telefonszam, "atadasIranyitoszam" => $atadasIranyitoszam, "atadasVaros" => $atadasVaros, 
        "utca" => $utca, "email" => $email, "ar" => $ar, "kep" => $kep, "adatok" => $adatok, "geptipus" => $geptipus];
        saveUsers("../hirdetesek.txt",  $hirdetesek);
        header('Location: ./hirdetes.php?hirdetes=success');
    }
    else{
        $_SESSION['hibatomb'] = $hibak;
        header('Location: ./hirdetes.php?hirdetes=failed');
    }
}else{
    header('Location: ./hirdetes.php#modal-fooldal');
}
?>