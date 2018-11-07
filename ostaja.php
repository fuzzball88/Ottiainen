<?php include_once "inc/top.php";?>
<?php
$tuote_id=0;
$maara=0;
$tunnus=$_SESSION["tunnus"];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tuote_id = filter_input(INPUT_POST,'tuote',FILTER_SANITIZE_NUMBER_INT);
    $maara = filter_input(INPUT_POST,'maara',FILTER_SANITIZE_NUMBER_INT);
    
        try{
            $tietokanta->beginTransaction();
            $sql= "INSERT INTO TILAUSRIVI(tuote,kilomaara)
                        VALUES (:tuote, :kilomaara,);
                        INSERT INTO TILAUS(astunnus,tilauspvm)
                        VALUES (:tunnus, curdate());";
                        $output = $tietokanta->prepare($sql);
                        $output->bindvalue(':tuote',$tuote_id, PDO::PARAM_STR);
                        $output->bindvalue(':maara',$maara, PDO::PARAM_STR);
                        $output->bindvalue(':tunnus',$tunnus, PDO::PARAM_STR);
                        $output->execute();
                        
                        $tietokanta->commit();
            }
            catch(Exception $ex){
                $tietokanta->rollback();
                print"<p>Virhe tilauksessa</p>";
            }
    }
print "Tulostetaan tuotetunnus " . $tuote_id . " ja maara " . $maara .  "";
?>

<?php
print "<div class='row'>";
    print"<div class='col-md-12'>";
    
    //Henkilötieto Laatikko
            $tyyppi=$_SESSION["tyyppi"];
            $sql = "SELECT * FROM HENKILO where tyyppi='$tyyppi' AND id='$tunnus'";
            print"<div class='col-md-3'>";
            print"</div>";
                print"<div class='col-md-6'>";
                    $kysely = $tietokanta->query($sql);
                    $tietue = $kysely->fetch();
                        
                        print "<h3>Tietosi</h3>";
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
    print"</div>";
print "</div>";

print "<div class='row'>";
//Haetaan tilaustiedot tälle käyttäjälle
    $tunnus=$_SESSION["tunnus"];
    $tyyppi=$_SESSION["tyyppi"];
                $sql = "SELECT * FROM TILAUS WHERE astunnus='$tunnus'";
    print"<div class='col-md-12'>";
        print"<div class='col-md-3'>";
        print"</div>";
            print"<div class='col-md-6'>";
                    print "<h3>Tilauksesi</h3>";
                    print "<table class='intra'>";
                    $kysely = $tietokanta->query($sql);
                    while($tietue = $kysely->fetch()){
                      
                       print "<tr>";
                       print    "<th class='intra'>" . "Tilaus_Numero" . "</th>" . "<th class='intra'>" . "Asiakas_tunnus" . "</th>" .
                                "<th class='intra'>" . "Tilaus_Päivämäärä" . "</th>" . "<th class='intra'>" . "Tilauksen_tila" . "</th>";
                       print "</tr>";
                       print "<tr>";
                       print    "<td class='intra'>" . $tietue['tilaus_id'] . "</td>" . "<td class='intra'>" . $tietue['astunnus'] . "</td>" .
                                "<td class='intra'>" . $tietue['tilauspvm'] . "</td>" . "<td class='intra'>" . $tietue['tila'] . "</td>";
                       print "</tr>";
                    }
                    $sql = "SELECT * FROM TILAUSRIVI";
                    $kysely = $tietokanta->query($sql);
                    while($tietue = $kysely->fetch()){
                      
                       print "<tr>";
                       print    "<th class='intra'>" . "Tilausrivi" . "</th>" . "<th class='intra'>" . "Tuote" . "</th>" .
                                "<th class='intra'>" . "Tilaus_id" . "</th>" . "<th class='intra'>" . "Kilomaara" . "</th>";
                       print "</tr>";
                       print "<tr>";
                       print    "<td class='intra'>" . $tietue['tilausrivi'] . "</td>" . "<td class='intra'>" . $tietue['tuote'] . "</td>" .
                                "<td class='intra'>" . $tietue['tilaus_id'] . "</td>" . "<td class='intra'>" . $tietue['kilomaara'] . "</td>";
                       print "</tr>";
                    }
                    print "</table>";
            print"</div>";
        print"<div class='col-md-3'>";
        print"</div>";
    print"</div>";
print "</div>";       

//Tilaa lisää

$sql = "SELECT * FROM TUOTE";
print "<div class='row'>";
    print"<div class='col-md-12'>";
        print"<div class='col-md-3'>";
        print"</div>";
                print"<div class='col-md-6'>";
                    print "<h3>Tilaa lisää </h3>";
                    print "<form action='ostaja.php' method='post'";
                        print "<div class='form-group'>
                            <label for='sel1'>Valitse tuote</label>
                            <select class='form-control' id='sel1' name='tuote'>";
                                $kysely = $tietokanta->query($sql);
                                while($tietue = $kysely->fetch()){
                                print "<option value='" . $tietue['id'] . "' name='id'>" . $tietue['nimi'] . " Hinta per kilo: ". $tietue['hinta'] ."</option>";
                                }
                            print   "</select>";
                            print   "<input name='maara' maxlength='10' placeholder='Kilomäärä'>";
                            print   "<button>Tilaa</button>";
                    print   "</form>";
                        print "</div>";
                print "</div>";
            print"<div class='col-md-3'>";
            print"</div>";
    print "</div>";
print "</div>";

?>

<?php include_once "inc/bottom.php";?>