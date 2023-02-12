<header>
    <nav>
    <?php
        session_start();
        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        if(strpos($fullUrl, "index.php") == true){
            echo '<img class="img" src="./img/animation.png" alt="Autó">';
        }
        else{
            echo '<img class="img" src="../img/animation.png" alt="Autó">';
        }
    ?>
        <ul class="nav-lista">
            <li class="web-name">LG Cars</li>
            <?php
            $fullecho = "";
            $aktold = $_SESSION['aktold'];
            if(strpos($fullUrl, "index.php") == true){
            $fullecho .= '<li class="lista-elemek"><a class="links login-gomb"';
                if(isset($_SESSION['userEmail'])){
                    $fullecho .= ' href="./php/logout.php">Kijelentkezés</a></li>
                    <li class="lista-elemek aktiv5"><a class="links" href="php/profile.php">Profil</a></li>';
                }
                else{
                    $fullecho .= ' href="./'.$aktold.'#modal-fooldal">Belépés</a></li>
                    <li class="lista-elemek aktiv5"><a class="links" href="php/reg.php">Regisztráció</a></li>';
                    
                }
                $fullecho .= '<li class="lista-elemek aktiv4"><a class="links" href="php/visszajel.php">Visszajelzés</a></li>
                <li class="lista-elemek aktiv3"><a class="links" href="php/piac.php">Piac</a></li>
                <li class="lista-elemek aktiv2"><a class="links" href="php/hirdetes.php">Hirdetés</a></li>
                <li class="lista-elemek aktiv1"><a class="links" href="./index.php">Főoldal</a></li>';
            }
            else{
                $fullecho .= '<li class="lista-elemek"><a class="links login-gomb"';
                if(isset($_SESSION['userEmail'])){
                    $fullecho .= ' href="./logout.php">Kijelentkezés</a></li>
                    <li class="lista-elemek aktiv5"><a class="links" href="profile.php">Profil</a></li>';
                }
                else{
                    $fullecho .= ' href="./'.$aktold.'#modal-fooldal">Belépés</a></li>
                    <li class="lista-elemek aktiv5"><a class="links" href="reg.php">Regisztráció</a></li>';
                }
                $fullecho .= '<li class="lista-elemek aktiv4"><a class="links" href="visszajel.php">Visszajelzés</a></li>
                <li class="lista-elemek aktiv3"><a class="links" href="piac.php">Piac</a></li>
                <li class="lista-elemek aktiv2"><a class="links" href="hirdetes.php">Hirdetés</a></li>
                <li class="lista-elemek aktiv1"><a class="links" href="../index.php">Főoldal</a></li>';
            }
            echo $fullecho;
            ?>
        </ul>
    </nav>
</header>