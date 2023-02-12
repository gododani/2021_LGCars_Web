<?php 
     $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
     if(strpos($fullUrl, "index.php") == true){
         $_SESSION['aktold'] = "index.php";
        echo '<style> .aktiv1{background-color: dimgray}</style>';
     }
     else if(strpos($fullUrl, "hirdetes.php") == true){
        $_SESSION['aktold'] = "hirdetes.php";
        echo '<style> .aktiv2{background-color: dimgray}</style>';

    }else if(strpos($fullUrl, "piac.php") == true){
        $_SESSION['aktold'] = "piac.php";
        echo '<style> .aktiv3{background-color: dimgray}</style>';
    }else if(strpos($fullUrl, "visszajel.php") == true){
        $_SESSION['aktold'] = "visszajel.php";
        echo '<style> .aktiv4{background-color: dimgray}</style>';
    }else if(strpos($fullUrl, "reg.php") == true){
        $_SESSION['aktold'] = "reg.php";
        echo '<style> .aktiv5{background-color: dimgray}</style>';
    }else if(strpos($fullUrl, "profile.php") == true){
        $_SESSION['aktold'] = "profile.php";
        echo '<style> .aktiv5{background-color: dimgray}</style>';
    }
    if(strpos($fullUrl, "emptyEmail") == true){
        echo '<style>label[id="logErrorEmail"]{display: inline-block !important; color: red; font-size: 12px;}</style>';
    }
    if(strpos($fullUrl, "emptyPwd") == true){
        echo '<style>label[id="logErrorPwd"]{display: inline-block !important; color: red; font-size: 12px;}</style>';
    }
    if(strpos($fullUrl, "logError") == true){
        echo '<style>label[id="logError"]{display: inline-block !important; color: red; font-size: 12px;}</style>';
    }
    if(isset($_SESSION['hibatomb'])){
        $tomb = $_SESSION['hibatomb'];
        foreach($tomb as $hiba){
            echo '<style>label[id="'.$hiba.'"]{display: inline-block !important; color: red; font-size: 12px;}</style>';
        }
        $_SESSION['hibatomb'] = null;
    }
?>