<?php include_once "inc/top.php"; ?>

<?php
//Henkilötieto Laatikko
print "<div class='row'>";
$tunnus=$_SESSION["tunnus"];
$tyyppi=$_SESSION["tyyppi"];
    $sql = "SELECT * FROM HENKILO";
    print"<div class='col-md-12'>";
        print"<div class='col-md-3'>";
		print"</div>";
	        print"<div class='col-md-6'>";
                print "<h3>Henkilötiedot</h3>";
                
                print "<table class='intra'>";
                print "<tr>";
                   print    "<th class='intra'>" . "Tunnus" . "</th>" . "<th class='intra'>" . "Sukunimi" . "</th>" .
                            "<th class='intra'>" . "Etunimi" . "</th>" . "<th class='intra'>" . "Yritys" . "</th>" .
                            "<th class='intra'>" . "Puh" . "</th>" . "<th class='intra'>" . "Email" . "</th>" .
                            "<th class='intra'>" . "Katuosoite" . "</th>" . "<th class='intra'>" . "postinro" . "</th>" .
                            "<th class='intra'>" . "Postitoimipaikka" . "</th>";
                   print "</tr>";
                $kysely = $tietokanta->query($sql);
                while($tietue = $kysely->fetch()){
                   print "<tr>";
                   print    "<td class='intra'>" . $tietue['id'] . "</td>" . "<td class='intra'>" . $tietue['snimi'] . "</td>" .
                            "<td class='intra'>" . $tietue['enimi'] . "</td>" . "<td class='intra'>" . $tietue['yritys'] . "</td>" .
                            "<td class='intra'>" . $tietue['puh'] . "</td>" . "<td class='intra'>" . $tietue['email'] . "</td>" .
                            "<td class='intra'>" . $tietue['osoite'] . "</td>" . "<td class='intra'>" . $tietue['postinro'] . "</td>" .
                            "<td class='intra'>" . $tietue['postitmp'] . "</td>";
                   print "</tr>";
                }
                print "</table>";
            print"</div>";
        print"<div class='col-md-3'>";
		print"</div>";
    print "</div>";
print "</div>";
?>
<?php
//Tilaukset
print "<div class='row'>";
    $sql = "SELECT * FROM TILAUS";
    //print $sql;
    print"<div class='col-md-12'>";
        print"<div class='col-md-3'>";
		print"</div>";
		    print"<div class='col-md-6'>";
                print "<h3>Tilaukset</h3>";
                    
                print "<table class='intra'>";
                print "<tr>";
                   print    "<th class='intra'>" . "Tilaustunnus" . "</th>" . "<th class='intra'>" . "Asiakastunnus" . "</th>" .
                            "<th class='intra'>" . "Yritysasiakastunnus" . "</th>" . "<th class='intra'>" . "Tilauspäivämäärä" . "</th>" .
                            "<th class='intra'>" . "Tila" . "</th>" ;
                   print "</tr>";
                $kysely = $tietokanta->query($sql);
                while($tietue = $kysely->fetch()){
                       print "<tr>";
                       print    "<td class='intra'>" . $tietue['tilaus_id'] . "</td>" . "<td class='intra'>" . $tietue['astunnus'] . "</td>" .
                                "<td class='intra'>" . $tietue['yritys_astunnus'] . "</td>" . "<td class='intra'>" . $tietue['tilauspvm'] . "</td>" .
                                "<td class='intra'>" . $tietue['tila'] . "</td>";
                       print "</tr>";
                    }
                print "</table>";
            print"</div>";
        print"<div class='col-md-3'>";
		print"</div>";
	print "</div>";
print "</div>";
?>
<?php
//Tuotanto
print "<div class='row'>";
    print"<div class='col-md-12'>";
        print"<div class='col-md-3'>";
		print"</div>";
		    print"<div class='col-md-6'>";
                print "<h3>Tuotantoerät</h3>";
                $sql = "SELECT * FROM TUOTANTOERA";
                print $sql;
                
                $kysely = $tietokanta->query($sql);
                $tietue = $kysely->fetch();
                   print "<table class='intra'>";
                   print "<tr>";
                   print    "<th class='intra'>" . "Erätunnus" . "</th>" . "<th class='intra'>" . "Pakkauspäivämäärä" . "</th>" .
                            "<th class='intra'>" . "Aloituspäivämäärä" . "</th>" . "<th class='intra'>" . "Tavoite(kg)" . "</th>" .
                            "<th class='intra'>" . "Valmistunut(kg)" . "</th>" .
                            "<th class='intra'>" . "Varasto" . "</th>" . "<th class='intra'>" . "Ilmoittaja" . "</th>" .
                            "<th class='intra'>" . "Tuotannon tila" . "</th>";
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

<?php
//Varasto
print "<div class='row'>";
    print"<div class='col-md-12'>";
        print"<div class='col-md-3'>";
		print"</div>";
		    print"<div class='col-md-6'>";
                print "<h3>Varastotiedot</h3>";
                    $sql = "SELECT * FROM VARASTO";
                    print $sql;
                    
                    $kysely = $tietokanta->query($sql);
                    $tietue = $kysely->fetch();
                       print "<table class='intra'>";
                       print "<tr>";
                       print    "<th class='intra'>" . "Tilatunnus" . "</th>" . "<th class='intra'>" . "tilanimi" . "</th>" .
                                "<th class='intra'>" . "Sisältö(kg)" . "</th>" . "<th class='intra'>" . "Sijainti" . "</th>";
                       print "</tr>";
                       print "<tr>";
                       print    "<td class='intra'>" . $tietue['tila_id'] . "</td>" . "<td class='intra'>" . $tietue['tilanimi'] . "</td>" .
                                "<td class='intra'>" . $tietue['maara_kilo'] . "</td>" . "<td class='intra'>" . $tietue['yritys'] . "</td>";
                       print "</tr>";
                       print "</table>";
            print"</div>";
        print"<div class='col-md-3'>";
		print"</div>";
    print "</div>";
print "</div>";
?>

<?php include_once "inc/bottom.php";?>