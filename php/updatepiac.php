<?php 
include('./functions.php');
$termekek = loadUsers("../hirdetesek.txt");
$fullecho = '<main>
<div class="piac">';
foreach($termekek as $termek){
        $fullecho .= '<div class="card megj">
        <img class="piac-auto" src="../feltoltesek/'.$termek['kep'].'" width="300" height="200" alt="termék kép">
        <h1 class="piac-nev">'.$termek['name'].'</h1>
        <p class="piac-ar">'.$termek['ar'].'Ft</p>
        <p class="piac-leiras"><b>Adatok</b></p>
        <p class="piac-leiras">'.$termek['adatok'].'</p>
        <p><a class="links modal-gomb" href="./erdeklodes.php?'.$termek['kep'].'">Érdeklődés</a></p>
    </div>';
}
$fullecho .= '</div></main>';
echo $fullecho;

?>