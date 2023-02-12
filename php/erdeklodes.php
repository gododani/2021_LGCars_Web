<?php
require_once('./header.php');
?>
<link rel="stylesheet" href="../style/header_footer.css">
<link rel="stylesheet" href="../style/piac.css">
</head>
<body class="piachtml">
<?php
require_once('./nav.php');
require_once('./modal.php');
require_once('./updatepiac.php');
$termekek = loadUsers("../hirdetesek.txt");
$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
foreach($termekek as $termek){
   if(strpos($fullUrl, $termek['kep']) == true){
    echo '<!-- Részletek felugró ablak ettől -->
        <div id="modal-piac" class="egeszKepernyo vissza" style="top: 0; left: 0; visibility:visible !important;">
            <form class="modal">
                <div class="modal-container">
                    <div style="width: 100%; height: 30px;">
                        <strong><a class="close" href="./piac.php">&#x2715;</a></strong>
                    </div>
                    <h1 class="modal-header">Érdeklődés</h1>
                    <p class="piac-text"><b><em>Érdeklődni az alábbi lehetőségeken tud:</em></b></p>
                    <hr>
                    <div class="modal-erdeklodes">
                        <div>
                            <label>Email:</label>
                            <p>'.$termek['email'].'</p>
                        </div>
                        <hr>
                        <div>
                            <label>Telefonszám:</label>
                            <p>'.$termek['telefonszam'].'</p>
                        </div>
                        <hr>
                        <div>
                            <label>Személyes:</label>
                            <p>'.$termek['atadasIranyitoszam']. ", ".$termek['atadasVaros']. " ".$termek['utca'].'</p>
                        </div>';
                        $termek['utca'] = str_replace(" ", "%20",$termek['utca']);
                        echo '<iframe width="100%" height="280px" src="https://maps.google.com/maps?q='.$termek['atadasIranyitoszam'].'%20'.$termek['atadasVaros'].'%20'.$termek['utca'].'&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                            </div>
                        </div>
                    </form>
                </div>';        
   }
}
require_once('./footer.php');
?>
    