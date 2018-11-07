<?php include_once "inc/top.php";?>

<?php
print "<div class='row'>";
//Henkilötieto Laatikko
$tunnus=$_SESSION["tunnus"];
$tyyppi=$_SESSION["tyyppi"];
    $sql = "SELECT * FROM HENKILO where id='$tunnus'";
    print"<div class='col-md-12'>";
        print"<div class='col-md-3'>";
		print"</div>";
	        print"<div class='col-md-6'>";
                print "<h3>Tietosi</h3>";
                $kysely = $tietokanta->query($sql);
                $tietue = $kysely->fetch();
                   print "<table class='intra'>";
                   print "<tr>";
                   print    "<th class='intra'>" . "Tunnus" . "</th>" . "<th class='intra'>" . "Sukunimi" . "</th>" .
                            "<th class='intra'>" . "Etunimi" . "</th>" . "<th class='intra'>" . "Yritys" . "</th>" .
                            "<th class='intra'>" . "Puh" . "</th>" . "<th class='intra'>" . "Email" . "</th>" .
                            "<th class='intra'>" . "Katuosoite" . "</th>" . "<th class='intra'>" . "postinro" . "</th>" .
                            "<th class='intra'>" . "Postitoimipaikka" . "</th>";
                   print "</tr>";
                   print "<tr>";
                   print    "<td class='intra'>" . $tietue['id'] . "</td>" . "<td class='intra'>" . $tietue['snimi'] . "</td>" .
                            "<td class='intra'>" . $tietue['enimi'] . "</td>" . "<td class='intra'>" . $tietue['yritys'] . "</td>" .
                            "<td class='intra'>" . $tietue['puh'] . "</td>" . "<td class='intra'>" . $tietue['email'] . "</td>" .
                            "<td class='intra'>" . $tietue['osoite'] . "</td>" . "<td class='intra'>" . $tietue['postinro'] . "</td>" .
                            "<td class='intra'>" . $tietue['postitmp'] . "</td>";
                   print "</tr>";
                   print "</table>";
            print"</div>";
        print"<div class='col-md-3'>";
		print"</div>";
       $_SESSION["yritys"]=$tietue["yritys"];
    print "</div>";
print "</div>";
?>

<?php
//Sovittu tuote kuukaudessa määrä
print "<div class='row'>";
    print"<div class='col-md-12'>";
        print"<div class='col-md-3'>";
		print"</div>";
        $yritys=$_SESSION["yritys"];
            print"<div class='col-md-6'>";

                print "<h3>Tuotantoeräsi</h3>";
                $sql = "SELECT * FROM TUOTANTOERA WHERE valmistaja_yritys='$yritys'";
                //print $sql;
                
                $kysely = $tietokanta->query($sql);
                $tietue = $kysely->fetch();
                   print "<table class='intra'>";
                   print "<tr>";
                   print    "<th class='intra'>" . "ERÄ ID" . "</th>" . "<th class='intra'>" . "PAKKAUS PVM" . "</th>" .
                            "<th class='intra'>" . "ERA ALOITUS" . "</th>" . "<th class='intra'>" . "TAVOITE KILOMAARA" . "</th>" .
                            "<th class='intra'>" . "VALMISTUNUT KILOMAARA" . "</th>" .
                            "<th class='intra'>" . "VARASTO" . "</th>" . "<th class='intra'>" . "ILMOITTAJA" . "</th>" .
                            "<th class='intra'>" . "TUOTANNON TILA" . "</th>";
                   print "</tr>";
                   print "<tr>";
                   print    "<td class='intra'>" . $tietue['id'] . "</td>" . "<td class='intra'>" . $tietue['era_pakkaus_pvm'] . "</td>" .
                            "<td class='intra'>" . $tietue['era_aloitus_pvm'] . "</td>" . "<td class='intra'>" . $tietue['era_tavoite_kilomaara'] . "</td>" .
                            "<td class='intra'>" . $tietue['era_valmistunut_kilomaara'] . "</td>" .
                            "<td class='intra'>" . $tietue['varasto'] . "</td>" . "<td class='intra'>" . $tietue['ilmoittaja_id'] . "</td>" .
                            "<td class='intra'>" . $tietue['era_tila'] . "</td>";
                   print "</tr>";
                   print "</table>";
            print"</div>";
        print"<div class='col-md-3'>";
		print"</div>";
    print "</div>";
print "</div>";
?>


//ilmoitetaan sato


<?php include_once "inc/bottom.php";?>