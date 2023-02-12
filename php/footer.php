    <?php
    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if($_SESSION['aktold'] != "piac.php" && $_SESSION['aktold'] != "visszajel.php" && $_SESSION['aktold'] != "profile.php"){
        if($_SESSION['aktold'] == "index.php" && !isset($_SESSION['userEmail'])){
            require('./php/modal.php');
        }
        else if($_SESSION['aktold'] == "index.php"){
            require('./php/modal.php');
        }else{
            require('./modal.php');
        }
    }
    echo '<footer class="footer">';
    if(strpos($fullUrl, "index.php") == true){
       echo '<img class="img2" src="./img/animation.png" alt="Autó">';
    }
    else {
        echo '<img class="img2" src="../img/animation.png" alt="Autó">';
    }
    ?>
        <p>&copy; LG Cars 2020-<?php echo date("Y");?>   |  Made by Original LG</p>
    </footer>
</body>
</html>