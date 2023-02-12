<?php
  session_start();
  include('./functions.php');
  $feedbacks = loadUsers("../visszajelzesek.txt");
  $hibak = [];
if(isset($_GET['vissz-submit']) && isset($_SESSION['userEmail'])){
  //Név
  $visszName = $_GET["visz-form-name"];
  if(!isset($visszName) || trim($visszName) === ""){
    $hibak[] = "visszNameErr";
  }
  //Értékelés
  $visszrate = $_GET["vissz-rate-opt"];
  if(!isset($visszrate) || trim($visszrate) === ""){
    $hibak[] = "visszRateErr";
  }
  //Megjegyzés
  $visszErtekeles = $_GET["megjegyzes"];
  if(!isset($visszErtekeles) || trim($visszErtekeles) === ""){
    $hibak[] = "visszMegjErr";
  }
  //Sikeres regisztráció
  if(count($hibak) === 0){
    $feedbacks[] = ["name" => $visszName, "date" => date("Y M d") , "rate" => $visszrate, "ertekeles" => $visszErtekeles];
    saveUsers("../visszajelzesek.txt",  $feedbacks);
    header('Location: ./visszajel.php?feedback=success');
  }else{
    $_SESSION['hibatomb'] = $hibak;
    header('Location: ./visszajel.php?feedback=failed');
  }
}else{
  header('Location: ./visszajel.php#modal-fooldal');
}
?>