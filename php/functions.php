<?php
function saveUsers($utvonal, $felhasznalok) {
    $fajl = fopen($utvonal, "w");
    if ($fajl === FALSE)
      die("HIBA: A fájl megnyitása nem sikerült!");
      foreach($felhasznalok as $felhasznalo) {
      $serialized_user = serialize($felhasznalo);
      fwrite($fajl, $serialized_user . "\n");
      }
    fclose($fajl);
  }
  
  function loadUsers($utvonal) {
    $felhasznalok = [];
    $fajl = fopen($utvonal, "r");
    if ($fajl === FALSE)
      die("HIBA: A fájl megnyitása nem sikerült!");
  
    while (($sor = fgets($fajl)) !== FALSE) {
      $felhasznalo = unserialize($sor);
      $felhasznalok[] = $felhasznalo;
    }
    fclose($fajl);
    return $felhasznalok;
  }

  function changeUsers($utvonal, $name, $date, $sex, $email, $pwd, $pwda) {
    $felhasznalok = loadUsers("../felhasznalok.txt");
    $felhasznalokVegleges = [];
    foreach($felhasznalok as $felhasznalo){
      if($_SESSION['userEmail'] === $felhasznalo['email']){
          $felhasznalo["name"] = $name;
          $felhasznalo["date"] = $date;
          $felhasznalo["sex"] = $sex;
          $felhasznalo["email"] = $email;
          $felhasznalo["reg-pwd"] = $pwd;
          $felhasznalo["reg-pwd-again"] = $pwda;
          $_SESSION["userEmail"] = $email;
      }
      $felhasznalokVegleges[] = ["name" => $felhasznalo["name"], "date" => $felhasznalo["date"],
       "sex" => $felhasznalo["sex"], "email" => $felhasznalo["email"], "reg-pwd" => $felhasznalo["reg-pwd"],
        "reg-pwd-again" => $felhasznalo["reg-pwd-again"]];
  }
  saveUsers($utvonal, $felhasznalokVegleges);
    return $felhasznalok;
  }
?>