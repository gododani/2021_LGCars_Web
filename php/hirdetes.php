<?php
    require_once('./header.php');
?>
    <link rel="stylesheet" href="../style/header_footer.css">
    <link rel="stylesheet" href="../style/hirdetes.css">
</head>
    <body class="hirdeteshtml">
<?php
    require_once('./nav.php');
?>
    <form class="form-content" method="POST" action="./updatehirdetes.php" enctype="multipart/form-data">
        <div class="container">
          <h1 class="hirdetes-header">Hirdetés feladása</h1>
                <p class="hirdetes-header hirdetes-text"><b>Töltse ki az adatokat</b></p>
          <hr>
          <div>
              <div class="hird-float-left">
                <label for="hirdetes-nev"><b>Gépjármű neve:</b></label>
                <label id="adNameErr" style="display: none;">A név nem lehet üres!</label>
                <input type="text" class="hirdetes-input" id="hirdetes-nev" name="hirdetes-nev" placeholder="Gépjármű neve" required>
                <div>
                    <div class="hird-float-left">
                        <label for="hird-postcode"><b>Irányítószám:</b></label>
                        <label id="adAtadasPostcodeErr" style="display: none;">Rossz írányítószám!</label>
                        <br>
                        <input type="text" class ="hirdetes-input" id="hird-postcode" name="hird-postcode" placeholder="6723" required>
                    </div>
                    <div class="hird-float-right">
                        <label for="hird-city"><b>Város:</b></label>
                        <label id="adAtadasCityFormatErr" style="display: none;">A formátum nem megfelelő!</label>
                        <br>
                        <input type="text" class ="hirdetes-input" id="hird-city" name="hird-city" placeholder="Szeged" required>
                    </div>
                </div>
                <label for="hird-street"><b>Utca:</b></label>
                <label id="adAtadasStreetEmptyErr" style="display: none;">Az utca nem lehet üres!</label>
                <input type="text" class ="hirdetes-input" id="hird-street" name="hird-street" placeholder="Sárosi utca 11" required>


                <label for="hird-adatok"><b>Adatok:</b></label>
                <label id="adAdatokErr" style="display: none;">Az adatok nem lehet üres!</label>
                <input type="text" class = "hirdetes-input" id="hird-adatok" name="hird-adatok" placeholder="Adatok a gépjárműről" required>
              </div>
              <div class="hird-float-right">
                <label for="hird-telefonszam"><b>Telefonszám:</b></label>
                <label id="adTelFormatErr" style="display: none;">A telefonszám formátuma nem megfelelő!</label>
                <input type="tel" class = "hirdetes-input" id="hird-telefonszam" name="hird-telefonszam" pattern="[0-9]{2}[0-9]{9}" placeholder="06301234567" required>
                <label for="hird-email"><b>Email cím:</b></label>
                <label id="adEmailErr" style="display: none;">Az email nem lehet üres!</label>
                <input type="email" class = "hirdetes-input" id="hird-email" name="hird-email" placeholder="valami@valami.com" required>
                <label for="hirdetes-ar"><b>Ár (Ft):</b></label>
                <label id="adPriceErr" style="display: none;">Az ár nem lehet üres!</label>
                <input type="text" class="hirdetes-input" id="hirdetes-ar" name="hirdetes-ar" placeholder="4999999" required>
                <label for="hird-kepfelt"><b>Kép feltöltése (jpg, jpeg, png):</b></label>
                <label id="adImgErr" style="display: none;">Kötelező legalább 1 képet feltölteni!</label>
                <label id="kepFeltError" style="display: none;">A képt feltöltése sikertelen!</label>
                <label id="kepExistError" style="display: none;">Ez a kép már létezik a megadott névvel!</label>
                <label id="kepKiterjError" style="display: none;">A kép kiterjesztése nem megfelelő!</label>
                <br>
                <input type="file" class = "hirdetes-input" id="hird-kepfelt" name="hird-kepfelt" required>
              </div>
          </div>
          <div>
            <label><b>Gépjármű típusa:</b></label>
            <label id="adTypeErr" style="display: none;">Kötelező gépjármű típust választani!</label>
            <label id="adEgyebTypeErr" style="display: none;">Ha egyéb típust kíván megadni, akkor töltse ki a megfelelő mezőt!</label>
            <br>
            <br>
            <div class="radio-sor">
                <div class="szelesseg">
                    <label>Motorkerékpár</label>
                    <input type="radio" name="gep-tipusok" id="motorkerekpar" value="motorkerekpar">
                </div>
                <div class="szelesseg">
                    <label>Személyautó</label>
                    <input type="radio" name="gep-tipusok" id="szemelyauto" value="szemelyauto">
                </div>
                <div class="szelesseg">
                    <label>Haszonjármű</label>
                    <input type="radio" name="gep-tipusok" id="haszonjarmu" value="haszonjarmu">
                </div>
            </div>
            <div class="radio-sor">
                <div class="szelesseg">
                    <label>Kishaszonjármű</label>
                    <input type="radio" name="gep-tipusok" id="kishaszonjarmu" value="kishaszonjarmu">
                </div>
                <div class="szelesseg">
                    <label>Pótkocsi/Utánfutó</label>
                    <input type="radio" name="gep-tipusok" id="potkocsiutanfuto" value="potkocsiutanfuto">
                </div>
                <div class="szelesseg">
                    <label>Munkagép</label>
                    <input type="radio" name="gep-tipusok" id="munkagep" value="munkagep">
                </div>
            </div>
            <div class="radio-sor">
                <div class="szelesseg">
                    <label>Autóbusz</label>
                    <input type="radio" name="gep-tipusok" id="autobusz" value="autobusz">
                </div>
                <div class="szelesseg">
                    <label>Lakókocsi</label>
                    <input type="radio" name="gep-tipusok" id="lakokocsi" value="lakokocsi">
                </div>
                <div class="szelesseg">
                    <label>Hajó</label>
                    <input type="radio" name="gep-tipusok" id="hajo" value="hajo">
                </div>
            </div>
            <div class="radio-sor">
                <div class="szelesseg2">
                    <label>Egyéb</label>
                    <input type="radio" name="gep-tipusok" id="egyeb" value="egyeb">
                </div>
            </div>
            <div>
                <input class="egyeb-input" type="text" name="egyeb-input" id="egyeb-input" placeholder="Egyéb típus">
                <input type="submit" class = "hirdetes-input hirdetes-submit" name="hird-submit" value="Hirdetés feladása">
            </div>
          </div>
        </div>
      </form>
<?php
    require_once('./footer.php');
?>