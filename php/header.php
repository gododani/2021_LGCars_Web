<?php
    session_start();
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
        if(strpos($fullUrl, "reg.php") || strpos($fullUrl, "hirdetes.php") || strpos($fullUrl, "piac.php") || strpos($fullUrl, "visszajel.php") || strpos($fullUrl, "profile.php") || strpos($fullUrl, "erdeklodes.php")){
            require('./style.php');
            echo '<link rel="stylesheet" href="../style/modal.css">';
        }
        else if(strpos($fullUrl, "index.php")){
            echo '<link rel="stylesheet" href="./style/modal.css">';
            require('./php/style.php');
        }
        else{
            echo '<link rel="stylesheet" href="./style/modal.css">';
            require('./php/style.php');
            header('Location: ./index.php');
        }
    ?>
    <title>LG Cars</title>
    <?php
        if(strpos($fullUrl, "index.php") == true){
           echo '<link rel="icon" href="./img/auto.jpg">';
        }
        else {
            echo '<link rel="icon" href="../img/auto.jpg">';
        }
    ?>