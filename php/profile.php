<?php
    require_once('./header.php');
?>
<link rel="stylesheet" href="../style/header_footer.css">
<link rel="stylesheet" href="../style/register.css">
<link rel="stylesheet" href="../style/modosit.css">
</head>
<body class="reghtml">
<?php
   require_once('./nav.php');
   require('./functions.php');

   $users = loadUsers("../felhasznalok.txt");
   $name = "";
   $date = "";
   $sex = "";
   $email = "";
   $pwd = "";
   $pwda = "";
   foreach($users as $user){
       if($_SESSION['userEmail'] == $user['email']){
            $name = $user['name'];
            $date = $user['date'];
            $sex = $user['sex'];
            $email = $user['email'];
            $pwd = $user['reg-pwd'];
            $pwda = $user['reg-pwd-again'];
       }
   }
   echo '<form class="form-content" method="POST" action="./modosit.php">
   <div class="container">
   <img class="modal-img" src="../img/user-icon.png" alt="Felhasználó">
     <h1 class="reg-header">Profil</h1>
       <p class="reg-header reg-text"><b>Az ön adatai:</b></p>
       <hr>
       <label for="name"><b>Név:</b></label>
       <label id="regNameErr" style="display: none;">A név nem lehet üres!</label>
       <input type="text" class = "reg-input" id="name" name="name" value="'.$name.'" required>
        
       <label for="date"><b>Születési dátum:</b></label>
       <label id="regDatumErr" style="display: none;">Nem érvényes dátum!</label>
       <input type="date" class = "reg-input" id="date" name="date" min="1900-01-01" max="2021-12-31" value="'.$date.'" required>

       <label for="sex"><b>Nem:</b></label>
       <label id="regNemErr" style="display: none;">A neme nem lehet üres!</label>
       <select id="sex" class = "reg-input" name="sex">';
           if($sex == "Férfi"){
               echo '<option value="Férfi" selected>Férfi</option><option value="Nő">Nő</option>
               <option value="Egyéb">Egyéb</option>';
           }else if($sex == "Nő") {
            echo '<option value="Férfi">Férfi</option><option value="Nő" selected>Nő</option>
            <option value="Egyéb">Egyéb</option>';
           }else if($sex == "Egyéb") {
            echo '<option value="Férfi">Férfi</option><option value="Nő">Nő</option>
            <option value="Egyéb" selected>Egyéb</option>';
           }
           echo '</select>
       <label for="email"><b>Email cím:</b></label>
       <label id="regEmailErr" style="display: none;">Az email cím nem megfelelő!</label>
       <label id="regEmailFoglErr" style="display: none;">Az email cím már foglalt!</label>
       <input type="email" class = "reg-input" id="email" name="email" value="'.$email.'"    required>

       <label for="reg-pwd"><b>Jelszó:</b></label>
       <label id="regPwdErr" style="display: none;">A jelszó nem megfelelő!</label>
       <input type="password" class = "reg-input" id="reg-pwd" name="reg-pwd" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" value="'.$pwd.'" required>
       
       <label for="reg-pwda"><b>Jelszó újra:</b></label>
       <label id="regPwdAErr" style="display: none;">A jelszó nem megfelelő!</label>
       <input type="password" class = "reg-input" id="reg-pwda" name="reg-pwda" value="'.$pwda.'" required>

       <div class="reg-gombok">
       <input type="submit" class="mod-input mod-submit" id="modosit" value="Módosít" name="mod-submit">
       </div>
   </div>
</form>';
?>
    
<?php
    require('./footer.php');
?>