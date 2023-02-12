<?php
    require_once('./header.php');
?>
<link rel="stylesheet" href="../style/header_footer.css">
<link rel="stylesheet" href="../style/register.css">
</head>
<body class="reghtml">
<?php
    require_once('./nav.php');
?>
<form class="form-content" method="POST" action="./register.php">
        <div class="container">
          <h1 class="reg-header">Regisztráció</h1>
            <p class="reg-header reg-text"><b>Töltse ki az adatokat</b></p>
            <hr>
            <label for="name"><b>Név:</b></label>
            <label id="regNameErr" style="display: none;">A név nem lehet üres!</label>
            <input type="text" class = "reg-input" id="name" name="name" placeholder="Vezetéknév Keresztnév" required>
                
            <label for="date"><b>Születési dátum:</b></label>
            <label id="regDatumErr" style="display: none;">Nem érvényes dátum!</label>
            <input type="date" class = "reg-input" id="date" name="date" min="1900-01-01" max="2021-12-31" required>
    
            <label for="sex"><b>Nem:</b></label>
            <label id="regNemErr" style="display: none;">A neme nem lehet üres!</label>
            <select id="sex" class = "reg-input" name="sex" required>
                <option hidden value="">Válasszon</option>
                <option value="Férfi">Férfi</option>
                <option value="Nő">Nő</option>
                <option value="Egyéb">Egyéb</option>
            </select>
    
            <label for="email"><b>Email cím:</b></label>
            <label id="regEmailErr" style="display: none;">Az email cím nem megfelelő!</label>
            <label id="regEmailFoglErr" style="display: none;">Az email cím már foglalt!</label>
            <input type="email" class = "reg-input" id="email" name="email" placeholder="valami@valami.com" required>
    
            <label for="reg-pwd"><b>Jelszó: (legalább 8 karakter, 1 kisbetű, nagybetű és szám)</b></label>
            <label id="regPwdErr" style="display: none;">A jelszó nem megfelelő!</label>
            <input type="password" class = "reg-input" id="reg-pwd" name="reg-pwd" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" placeholder="Minta123" required>
    
            <label for="reg-pwd-again"><b>Jelszó újra:</b></label>
            <label id="regPwdAErr" style="display: none;">A megadott két jelszó nem egyezik!</label>
            <input type="password" class = "reg-input" id="reg-pwd-again" name="reg-pwd-again" placeholder="Minta123" required>
    
            <div class="reg-gombok">
                <input type="reset" class="reg-input reg-submit" id="reset" value="Visszaállítás" style="border-radius: 10px;">
                <input type="submit" class = "reg-input reg-submit" id="register" value="Regisztráció" name="reg-submit">   
            </div>
            <div>
                <b>Van már fiókja?</b>
                <a href="./reg.php#modal-fooldal"><strong>Jelentkezzen be</strong></a>
            </div>
        </div>
      </form>
<?php
    require_once('./footer.php');
?>