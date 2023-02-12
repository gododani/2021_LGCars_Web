<?php
    require_once('./header.php');
?>
<link rel="stylesheet" href="../style/header_footer.css">
<link rel="stylesheet" href="../style/visszajel.css">
</head>
<body class="viszhtml">
<?php
    require_once('./nav.php');
    require_once('./modal.php');
?>
<div class="visz-tartalom">
        <?php
            require('./updatefeedback.php');
        ?>
        <div class="vissz-form">
            <form class="form-content" method="GET" action="./feedback.php">
                <div class="container">
                  <h1 class="vissz-header">Visszajelzés</h1>
                  <hr>
                        <label for="visz-form-name"><b>Név:</b></label>
                        <label id="visszNameErr" style="display: none;">A név nem maradhat üresen!</label>
                        <label id="visszRateErr" style="display: none; float: right; margin-right: 100px;">A név nem maradhat üresen!</label>
                        <br>
                        <input type="text" class = "vissz-input" id="visz-form-name" name="visz-form-name" required>
                        <select class="vissz-input" name="vissz-rate-opt" id="vissz-rate-opt" required>
                            <option value="" hidden>Értékelés</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                        <label for="megjegyzes"><b>Megjegyzés:</b></label>
                        <label id="visszMegjErr" style="display: none;">A megjegyzés nem lehet üres!</label>
                        <textarea class="vissz-input" name="megjegyzes" id="megjegyzes" cols="30" rows="10" required></textarea>
                        <input type="submit" class = "vissz-input vissz-submit" value="Küldés" name="vissz-submit">
                </div>
              </form>
        </div>
    </div>
<?php
    require_once('./footer.php');
?>