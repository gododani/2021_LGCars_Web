<?php 
$aktold = $_SESSION['aktold'];
if($aktold == "index.php"){
    echo '<!-- Részletek felugró ablak ettől -->
    <div id="modal-fooldal" class="egeszKepernyo vissza" style="z-index: 100 !important;">
                <form class="modal" method="POST" action="./php/login.php">
                    <div class="modal-container">
                        <div style="width: 100%; height: 30px;">
                            <strong><a class="close" href="'.$aktold.'">&#x2715;</a></strong>
                        </div>
                        <img class="modal-img" src="./img/user-icon.png" alt="Felhasználó">
                        <h1 class="modal-header">Belépés</h1>
                            <p class="modal-header"></p>
                        <hr>
                            <label for="modal-email"><b>Email:</b></label>
                            <label id="logErrorEmail" style="display: none;">Az email nem lehet üres!</label>
                            <label id="logError" style="display: none;">Ez az email cím és jelszó páros nem létezik!</label>
                            <input type="email" class = "modal-input" id="modal-email" name="login-email" required>
                            
                            <label for="modal-password"><b>Jelszó:</b></label>
                            <label id="logErrorPwd" style="display: none;">A jelszó nem lehet üres!</label>
                            <input type="password" class = "modal-input" id="modal-password" name="login-password" required>
                
                            <input type="submit" class = "modal-input modal-submit" value="Belépés" name="login">
                            <div class="reg-link">
                                <b>Nincs még fiókja?</b>
                                <a href="./php/reg.php"><strong>Regisztráljon</strong></a>
                            </div>
                    </div>
                </form>
    </div>';
}
else{
    echo '<!-- Részletek felugró ablak ettől -->
    <div id="modal-fooldal" class="egeszKepernyo vissza" style="z-index: 100 !important;">
                    <form class="modal" method="POST" action="./login.php">
                        <div class="modal-container">
                            <div style="width: 100%; height: 30px;">
                                <strong><a class="close" href="'.$aktold.'">&#x2715;</a></strong>
                            </div>
                            <img class="modal-img" src="../img/user-icon.png" alt="Felhasználó">
                            <h1 class="modal-header">Belépés</h1>
                                <p class="modal-header"></p>
                            <hr>
                                <label for="modal-email"><b>Email:</b></label>
                                <label id="logErrorEmail" style="display: none;">Az email nem lehet üres!</label>
                                <label id="logError" style="display: none;">Ez az email cím és jelszó páros nem létezik!</label>
                                <input type="email" class = "modal-input" id="modal-email" name="login-email" required>
                                
                                <label for="modal-password"><b>Jelszó:</b></label>
                                <label id="logErrorPwd" style="display: none;">A jelszó nem lehet üres!</label>
                                <input type="password" class = "modal-input" id="modal-password" name="login-password" required>
                    
                                <input type="submit" class = "modal-input modal-submit" value="Belépés" name="login">
                                <div class="reg-link">
                                    <b>Nincs még fiókja?</b>
                                    <a href="./reg.php"><strong>Regisztráljon</strong></a>
                                </div>
                        </div>
                    </form>
    </div>';
}
?>
